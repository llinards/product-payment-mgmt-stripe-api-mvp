<?php

namespace App\Http\Controllers;

use App\Mail\OrderPaid;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class OrdersController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    }

    public function index()
    {
        $orders = Order::all();
        return view('dashboard', compact('orders'));
    }

    public function create(Request $request)
    {
        $lineItems[] = [
            'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                    'name' => $request->product,
                ],
                'unit_amount' => $request->unit_price * 100,
            ],
            'quantity' => $request->quantity,
        ];

        $checkoutSession = Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('payment.success', [], true)."?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('payment.cancel', [], true),
        ]);


        Order::create([
            'product' => $request->product,
            'customer' => $request->customer,
            'customer_email' => $request->customer_email,
            'status' => 'unpaid',
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'total_price' => $request->unit_price * $request->quantity,
            'session_id' => $checkoutSession->id,
            'payment_url' => $checkoutSession->url,
        ]);

        return back()->with('success', 'Order created successfully');
    }

    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');

        try {
            $session = Session::retrieve($sessionId);

            if (!$session) {
                return response()->json(['message' => 'Session not found'], 404);
            }

            $order = Order::where('session_id', $session->id)->where('status', 'unpaid')->first();

            if (!$order) {
                return response()->json(['message' => 'Order not found'], 404);
            }

            $order->update(['status' => 'paid']);

            Mail::to($order->customer_email)->send(new OrderPaid($order));

        } catch (Exception $e) {
            return response()->json(['message' => 'An error occurred'], 500);
        }
        return view('payment.success');
    }
}
