<x-dashboard-layout>
    @section('title')
        My Turfs
    @endsection

    <div class="w-full mt-4 mb-8 text-right">
        <a href="{{ route('turf-owner.my-turfs.create') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none">Create
            New Turf</a>
    </div>
    @include('alerts.alert')

    <div class="flex flex-col rounded-lg overflow-hidden">
        <div class=" bg-gray-100">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow w-full ">
                    <table class=" dark:divide-gray-600 w-full " style="">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
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
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach ($my_turfs as $item)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4">
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
                                                        <a href="{{ route('turf-owner.turfActivationPayment', ['id' => $item->id]) }}"
                                                            target="_blank"
                                                            class="w-full px-2 py-1 bg-primary text-center rounded text-white hover:bg-green-600">Publish
                                                        </a>
                                                    @endif
                                                @endif
                                            @else
                                                <a href="{{ route('turf-owner.turfActivationPayment', ['id' => $item->id]) }}"
                                                    target="_blank"
                                                    class="w-full px-2 py-1 bg-primary text-center rounded text-white hover:bg-green-600">Publish
                                                </a>
                                            @endif
                                        @else
                                            @if ($payment)
                                                @if ($payment->payment_status == 0)
                                                    Proccessing
                                                @elseif ($payment->payment_status == 1)
                                                    Accepted
                                                @else
                                                    @if ($payment->payment_status == 2)
                                                        <a href="{{ route('turf-owner.turfActivationPayment', ['id' => $item->id]) }}"
                                                            target="_blank"
                                                            class="w-full px-2 py-1 bg-primary text-center rounded text-white hover:bg-green-600">Publish
                                                        </a>
                                                    @endif
                                                @endif
                                            @else
                                                <a href="{{ route('turf-owner.turfActivationPayment', ['id' => $item->id]) }}"
                                                    target="_blank"
                                                    class="w-full px-2 py-1 bg-primary text-center rounded text-white hover:bg-green-600">Publish
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="p-4  space-x-2 whitespace-nowrap">
                                        <div class="flex gap-4">
                                            <a
                                                href="{{ route('turf-owner.my-turfs.edit', ['my_turf' => $item->id]) }}">
                                                <button type="button"
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-gray-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                        </path>
                                                        <path fill-rule="evenodd"
                                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="w-full p-4 bg-white"> {{ $my_turfs->links() }}</div>
            </div>
        </div>
    </div>

    @push('datatablejs')
        @include('partials.jquery-datatable-init')
    @endpush
</x-dashboard-layout>
