<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-bold leading-7">Create new order</h2>
                    @if (Session::has('success'))
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => (show = false), 2000)"
                            class="text-sm text-green-600"
                        >
                            {{ Session::get('success') }}
                        </p>
                    @endif

                    <form action="{{ route('order.create') }}" method="POST">
                        @csrf
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="customer" class="block text-sm font-medium leading-6 text-gray-900">
                                            Customer name
                                        </label>
                                        <div class="mt-2">
                                            <input
                                                type="text"
                                                name="customer"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            />
                                        </div>
                                    </div>
                                    <div class="sm:col-span-3">
                                        <label for="customer_email"
                                               class="block text-sm font-medium leading-6 text-gray-900">
                                            Customer email
                                        </label>
                                        <div class="mt-2">
                                            <input
                                                type="email"
                                                name="customer_email"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            />
                                        </div>
                                    </div>
                                    <div class="sm:col-span-3">
                                        <label for="product" class="block text-sm font-medium leading-6 text-gray-900">
                                            Product
                                        </label>
                                        <div class="mt-2">
                                            <input
                                                type="text"
                                                name="product"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            />
                                        </div>
                                    </div>
                                    <div class="sm:col-span-3">
                                        <label
                                            for="unit_price"
                                            class="block text-sm font-medium leading-6 text-gray-900"
                                        >
                                            Price per unit
                                        </label>
                                        <div class="mt-2">
                                            <input
                                                type="number"
                                                min="0.00"
                                                step="0.01"
                                                name="unit_price"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            />
                                        </div>
                                    </div>
                                    <div class="sm:col-span-3">
                                        <label
                                            for="quantity"
                                            class="block text-sm font-medium leading-6 text-gray-900"
                                        >
                                            Quantity
                                        </label>
                                        <div class="mt-2">
                                            <input
                                                type="number"
                                                name="quantity"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button
                                type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            >
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-bold leading-7">Orders</h2>
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th
                                                scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                            >
                                                Product Name
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                            >
                                                Customer Name
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                            >
                                                Quantity
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                            >
                                                Unit Price
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                            >
                                                Total Price
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                            >
                                                Status
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                            >
                                                Payment link
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    {{ $order->product }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    {{ $order->customer }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    {{ $order->quantity }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    {{ $order->unit_price }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    {{ $order->total_price }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                        <span
                                                            class="{{ $order->status == 'unpaid' ? 'text-red-500' : 'text-green-500' }}"
                                                        >
                                                            {{ $order->status }}
                                                        </span>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    @if($order->status == 'unpaid')
                                                        <a
                                                            href=" {{ $order->payment_url }}"
                                                            target="_blank"
                                                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                                        >
                                                            Payment URL
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
