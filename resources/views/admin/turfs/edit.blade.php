<x-dashboard-layout>
    @section('title')
        Edit Turf Info
    @endsection

    <!------ Alert ------->
    @include('alerts.alert')

    <x-card>
        <div class=" rounded-lg overflow-hidden">
            <div class="">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Transactions List</h2>
                <div class="overflow-hidden shadow w-full">
                    <table class=" dark:divide-gray-600 w-full p-3 mb-5 mt-3 " style="">
                        <thead class="bg-gray-100 dark:bg-gray-700 ">
                            <tr>
                                <th scope="col"
                                    class=" text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                    Date
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                    Turf Name
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                    Pay With
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                    Transection Number
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                    Transection Code
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                    Amount
                                </th>
                                <th width='25%' scope="col"
                                    class=" text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                    Pyment For
                                </th>
                                <th width="25%" scope="col"
                                    class="text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach ($payments as $item)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4 text-base font-normal text-gray-500   dark:text-gray-400 max-w-md">
                                        {{ $item->payment_date }}
                                    </td>
                                    <td class="p-4 text-base font-normal text-gray-500   dark:text-gray-400 max-w-md">
                                        {{ $item->turf_id }}
                                    </td>
                                    <td class="p-4 text-base font-normal text-gray-500   dark:text-gray-400 max-w-md">
                                        {{ $item->payment_with }}
                                    </td>
                                    <td class="p-4 text-base font-normal text-gray-500   dark:text-gray-400 max-w-md">
                                        {{ $item->transaction_number }}
                                    </td>
                                    <td class="p-4 text-base font-normal text-gray-500   dark:text-gray-400 max-w-md">
                                        {{ $item->transaction_code }}
                                    </td>
                                    <td class="p-4 text-base font-normal text-gray-500   dark:text-gray-400 max-w-md">
                                        {{ $item->amount }}
                                    </td>
                                    <td class="p-4 text-base font-normal text-gray-500   dark:text-gray-400 max-w-md">
                                        @if ($item->payment_for == '1')
                                            <div
                                                class="bg-blue-500 text-center text-white px-2 py-1 text-xs rounded-full font-semibold mr-2">
                                                Re-Activation</div>
                                        @else
                                            <div
                                                class="bg-green-500 text-center text-white px-2 py-1 text-xs rounded-full font-semibold mr-2">
                                                Registration</div>
                                        @endif
                                    </td>
                                    <td class=" text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        @if ($item->payment_status == '0')
                                            <form action="{{ route('admin.turfPaymentStatus', ['id' => $item->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="flex">
                                                    <select name="payment_status"
                                                        class="bg-gray-50 ring-1 px-3 text-gray-900 text-sm rounded-lg ring-green-500 focus:ring-green-500 focus:border-green-600 block w-10/12">
                                                        <option value="0"
                                                            @if ($item->payment_status == '0') selected @endif>
                                                            Processing
                                                        </option>
                                                        <option value="1"
                                                            @if ($item->payment_status == '1') selected @endif>
                                                            Accepted
                                                        </option>
                                                        <option value="2"
                                                            @if ($item->payment_status == '2') selected @endif>
                                                            Rejected
                                                        </option>
                                                    </select>

                                                    <button type="submit"
                                                        class="ms-3 ring-2 px-3 text-xl rounded hover:bg-green-500 hover:text-white duration-300 "><ion-icon
                                                            name="checkmark-done-outline"></ion-icon></button>
                                                </div>
                                            </form>
                                        @else
                                            <div class="flex items-center">
                                                @if ($item->payment_status == '0')
                                                    <div class="text-red-400 mr-2">
                                                        Processing</div>
                                                @elseif ($item->payment_status == '1')
                                                    <div
                                                        class="bg-green-600 text-white px-2 py-1 text-xs rounded-full font-semibold mr-2">
                                                        Accepted</div>
                                                @else
                                                    <div
                                                        class="bg-red-600 mr-2 text-white px-2 py-1 text-xs rounded-full font-semibold">
                                                        Rejected</div>
                                                @endif
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Update Turf Details</h2>
            <form action="{{ route('admin.turfStatus', ['id' => $turf->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <h1 class="mb-3 text-center p-3">Turf Info</h1>
                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="w-full">
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Turf
                            Name</label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $turf->turf_name }}" readonly>
                    </div>
                    <div class="w-full">
                        <label for="brand"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unique ID
                        </label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $turf->unique_code }}" readonly>
                    </div>
                    <div class="w-full">
                        <label for="brand"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Branch
                        </label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $turf->branch->name }}" readonly>
                    </div>
                    <div class="w-full">
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City
                        </label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $turf->city->name }}" readonly>
                    </div>
                    <div class="w-full">
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type
                        </label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $turf->turf_type }}" readonly>
                    </div>
                    <div class="w-full">
                        <label for="brand"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location
                        </label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $turf->location }}" readonly>
                    </div>
                    <div class="w-full">
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size
                        </label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $turf->size }}" readonly>
                    </div>
                    <div class="w-full">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact</label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $turf->phone }}" readonly>
                    </div>
                </div>
                <h1 class="text-center mb-3 p-2">Payment Info</h1>
                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="w-full">
                        <label for="brand"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner
                        </label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $turf->turfOwner->name }}" readonly>
                    </div>
                    <div class="w-full">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bank
                            Name</label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $turf->bank_name }}" readonly>
                    </div>
                    <div class="w-full">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Account
                            Holder
                            Name</label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $turf->account_holder_name }}" readonly>
                    </div>
                    <div class="w-full">
                        <label for="brand"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Account
                            Type</label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $turf->account_type }}" readonly>
                    </div>
                    <div class="w-full">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Account
                            Number</label>
                        <input type="text" name="amount"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $turf->account_number }}">
                        @error('amount')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grid gap-4 mb-4 sm:grid-cols-1 sm:gap-6 sm:mb-5">
                        <div class="mb-2">
                            <label for="status"
                                class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Turf
                                Status</label>
                            <select id="status" name="status"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="2" @if ($turf->status == '2') Selected @endif>On Hold
                                </option>
                                <option value="1" @if ($turf->status == '1') Selected @endif>Active
                                </option>
                                <option value="0" @if ($turf->status == '0') Selected @endif>Inactive
                                </option>
                            </select>
                            @error('status')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="px-5 py-3 rounded bg-green-500 text-white text-base font-medium hover:shadow-lg hover:shadow-gray-500 duration-300">Submit</button>
            </form>

    </x-card>

</x-dashboard-layout>
