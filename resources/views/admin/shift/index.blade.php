<x-dashboard-layout>
    @section('title')
        Shift
    @endsection


    <!----- Aleart------>
    @include('alerts.alert')

    <div class="flex flex-col rounded-lg overflow-hidden">
        <div class=" bg-gray-100">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow w-full ">
                    <table class=" dark:divide-gray-600 " style="">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Shift Title
                                </th>
                                <th scope="col"
                                    class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach ($shifts as $item)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4 flex items-center uppercase ">
                                        {{ $item->name }}
                                    </td>
                                    <td class="p-4  space-x-2 whitespace-nowrap">
                                        <div class="flex gap-4">
                                            <a href="{{ route('admin.shifts.edit', ['shift' => $item->id]) }}">
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
                <div class="w-full p-4 bg-white"> {{ $shifts->links() }}</div>
            </div>
        </div>
    </div>

    @push('datatablejs')
        @include('partials.jquery-datatable-init')
    @endpush
</x-dashboard-layout>
