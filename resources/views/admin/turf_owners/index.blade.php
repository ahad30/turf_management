    <x-dashboard-layout>
        @section('title')
            Turf owners
        @endsection

        <div class="w-full mt-4 mb-8 text-right">
            <a href="{{ route('admin.turf-owners.create') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none">Register
                New Onwer</a>
        </div>

        <!----- Aleart------>
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
                                        Name
                                    </th>
                                    <th scope="col"
                                        class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Phone
                                    </th>
                                    <th scope="col"
                                        class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Nid
                                    </th>
                                    <th scope="col"
                                        class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Status
                                    </th>
                                    <th scope="col"
                                        class=" text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach ($turf_owners as $user)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="p-4 flex items-center  mr-12 space-x-6 whitespace-nowrap">
                                            <img class="w-10 h-10 rounded-full"
                                                src="https://ui-avatars.com/api/?name={{ $user->name }}"
                                                alt="{{ $user->name }} avatar">
                                            <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                                <div class="text-base font-semibold text-gray-900 dark:text-white">
                                                    {{ $user->name }}</div>
                                                <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                                    {{ $user->email }}</div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-4 text-base font-normal text-gray-500   dark:text-gray-400 max-w-md">
                                            {{ $user->phone }}
                                        </td>
                                        <td
                                            class="p-4 text-base font-normal text-gray-500   dark:text-gray-400 max-w-md">
                                            <img src="{{ asset($user->nid) }}" alt="" width="100px"
                                                class="h-10">
                                        </td>
                                        <td
                                            class=" text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex items-center">
                                                @if ($user->status == 'Active')
                                                    <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
                                                @else
                                                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                                @endif
                                                {{ $user->status }}
                                            </div>
                                        </td>
                                        <td class="p-4  space-x-2 whitespace-nowrap">
                                            <a
                                                href="{{ route('admin.turf-owners.edit', ['turf_owner' => $user->id]) }}">
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
                                                    Edit
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="w-full p-4 bg-white"> {{ $turf_owners->links() }}</div>
                </div>
            </div>

        </div>


        @push('datatablejs')
            @include('partials.jquery-datatable-init')
        @endpush
    </x-dashboard-layout>
