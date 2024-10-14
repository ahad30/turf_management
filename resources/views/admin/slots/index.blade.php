<x-dashboard-layout>
    @section('title')
        Slots
    @endsection

    <div class="flex flex-col rounded-lg overflow-hidden">
        <div class=" bg-gray-100">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow w-full ">
                    <table class=" dark:divide-gray-600 w-full " style="">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Slot NO
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    From
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    To
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Durations
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Shift
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach ($slots as $slot)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4 ">

                                        {{ $slot->id }}
                                    </td>
                                    <td class="p-4 flex items-center  ">
                                        {{ $slot->from }}
                                    </td>
                                    <td class="p-4 ">
                                        {{ $slot->to }}
                                    <td class="p-4 ">
                                        {{ $slot->duration }} Minutes
                                    </td>
                                    <td class="p-4  space-x-2 whitespace-nowrap capitalize">
                                        {{ $slot->shift->name }}
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
