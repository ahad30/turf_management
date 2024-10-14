<x-dashboard-layout>
    @section('title')
        My Turfs
    @endsection

    @include('alerts.alert')

    <div class="flex flex-col rounded-lg overflow-hidden">
        <div class=" bg-gray-100">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow w-full ">
                    <table class=" dark:divide-gray-600 w-full " style="">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="">
                                    <div class="flex items-center">
                                        <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Turf Title
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Turf Owner
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Contact
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Email
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Location
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Status
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Payment Status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach ($my_turfs as $item)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-{{ $item->id }}" aria-describedby="checkbox-1"
                                                type="checkbox"
                                                class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-{{ $item->id }}" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="p-4 ">
                                        {{ $item->turf_name }}
                                    </td>
                                    <td class="p-4 ">
                                        {{ $item->turfOwner->name }}
                                    </td>
                                    <td class="p-4 ">
                                        {{ $item->phone }}
                                    </td>
                                    <td class="p-4 ">
                                        {{ Str::limit($item->turfOwner->email, 40, '...') }}
                                    </td>
                                    <td class="p-4 ">
                                        {{ Str::limit($item->location, 40, '...') }}
                                    </td>
                                    <td class="p-4 ">
                                        @if ($item->status == '1')
                                            <p class="px-2 py-1 bg-primary text-center rounded text-white">Active</p>
                                        @elseif ($item->status == '2')
                                            <p class="px-2 py-1 bg-yellow-300 text-center rounded ">On Hold</p>
                                        @else
                                            <p class="px-2 py-1 bg-red-500 text-center rounded text-white">Inactive
                                            </p>
                                        @endif
                                    </td>
                                    @php
                                        $payment = \App\Models\PaymentForTurfActivation::where('turf_id', $item->id)
                                            ->orderBy('id', 'desc')
                                            ->first();
                                    @endphp
                                    <td class="p-4 text-center">
                                        @if ($item->activated_at)
                                            @if ($payment)
                                                @if ($payment->payment_status == 0)
                                                    Proccessing
                                                @elseif ($payment->payment_status == 1)
                                                    Accepted
                                                @else
                                                    @if ($payment->payment_status == 2)
                                                        Not Paid
                                                    @endif
                                                @endif
                                            @else
                                                Not Paid
                                            @endif
                                        @else
                                            @if ($payment)
                                                @if ($payment->payment_status == 0)
                                                    Proccessing
                                                @elseif ($payment->payment_status == 1)
                                                    Accepted
                                                @else
                                                    @if ($payment->payment_status == 2)
                                                        Not Paid
                                                    @endif
                                                @endif
                                            @else
                                                Not Paid
                                            @endif
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

    @push('datatablejs')
        @include('partials.jquery-datatable-init')
    @endpush
</x-dashboard-layout>
