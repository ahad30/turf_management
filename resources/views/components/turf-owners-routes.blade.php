<script src="{{ asset('assets/js/sidebar.js') }}"></script>
@php

    $routes = [
        [
            'text' => 'Dashboard',
            'url' => route('turf-owner.home'),
            'isDropDown' => false,
            'active' => 'text-white bg-primary',
            'icon' => 'apps-outline',
        ],
        [
            'text' => 'Branches',
            'url' => route('turf-owner.branches.index'),
            'isDropDown' => false,
            'active' => 'text-white bg-primary',
            'icon' => 'git-branch-outline',
        ],
        [
            'text' => 'My Turfs',
            'url' => route('turf-owner.my-turfs.index'),
            'isDropDown' => false,
            'active' => 'text-white bg-primary',
            'icon' => 'id-card-outline',
        ],
        [
            'text' => 'My Staffs',
            'url' => route('turf-owner.staffs.index'),
            'isDropDown' => false,
            'active' => 'text-white bg-primary',
            'icon' => 'people-circle-outline',
        ],
        [
            'text' => 'Inventories',
            'url' => route('turf-owner.products.index'),
            'isDropDown' => false,
            'active' => 'text-white bg-primary',
            'icon' => 'bag-handle-outline',
        ],
        [
            'text' => 'Verify Booking',
            'url' => route('turf-owner.verifyBookingHandle'),
            'isDropDown' => false,
            'active' => 'text-white bg-primary',
            'icon' => 'git-branch-outline',
        ],
        [
            'text' => 'Booking',
            'url' => '#',
            'isDropDown' => true,
            'active' => 'text-white bg-primary',
            'icon' => 'people-circle-outline',
            'subItems' => [
                [
                    'text' => 'On Hold',
                    'url' => route('turf-owner.onHoldTurfBooking'),
                    'isDropDown' => false,
                    'icon' => 'add-circle-outline',
                ],
                [
                    'text' => 'Paid',
                    'url' => route('turf-owner.paidTurfBooking'),
                    'isDropDown' => false,
                    'icon' => 'checkmark-done-circle-outline',
                ],
                [
                    'text' => 'completed',
                    'url' => route('turf-owner.completeTurfBooking'),
                    'isDropDown' => false,
                    'icon' => 'add-circle-outline',
                ],
                [
                    'text' => 'Canceled',
                    'url' => route('turf-owner.cancelTurfBooking'),
                    'isDropDown' => false,
                    'icon' => 'close-circle-outline',
                ],
            ],
        ],
    ];

@endphp
@foreach ($routes as $route)
    @if ($route['isDropDown'])
        <li>
            <button type="button"
                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                aria-controls="dropdown-crud" data-collapse-toggle="dropdown-crud">
                <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M.99 5.24A2.25 2.25 0 013.25 3h13.5A2.25 2.25 0 0119 5.25l.01 9.5A2.25 2.25 0 0116.76 17H3.26A2.267 2.267 0 011 14.74l-.01-9.5zm8.26 9.52v-.625a.75.75 0 00-.75-.75H3.25a.75.75 0 00-.75.75v.615c0 .414.336.75.75.75h5.373a.75.75 0 00.627-.74zm1.5 0a.75.75 0 00.627.74h5.373a.75.75 0 00.75-.75v-.615a.75.75 0 00-.75-.75H11.5a.75.75 0 00-.75.75v.625zm6.75-3.63v-.625a.75.75 0 00-.75-.75H11.5a.75.75 0 00-.75.75v.625c0 .414.336.75.75.75h5.25a.75.75 0 00.75-.75zm-8.25 0v-.625a.75.75 0 00-.75-.75H3.25a.75.75 0 00-.75.75v.625c0 .414.336.75.75.75H8.5a.75.75 0 00.75-.75zM17.5 7.5v-.625a.75.75 0 00-.75-.75H11.5a.75.75 0 00-.75.75V7.5c0 .414.336.75.75.75h5.25a.75.75 0 00.75-.75zm-8.25 0v-.625a.75.75 0 00-.75-.75H3.25a.75.75 0 00-.75.75V7.5c0 .414.336.75.75.75H8.5a.75.75 0 00.75-.75z">
                    </path>
                </svg>
                <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>{{ $route['text'] }}</span>
                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <ul id="dropdown-crud" class="space-y-2 py-2 hidden">

                @foreach ($route['subItems'] as $subItem)
                    <li>
                        <a href="{{ $subItem['url'] }}"
                            class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700 @if ($page_slug == 'products') bg-gray-100 dark:bg-gray-700 @endif">{{ $subItem['text'] }}</a>

                    </li>
                @endforeach
            </ul>
        </li>
    @else
        <li class="group @if (request()->url($route['url']) === $route['url']) {{ $route['active'] }} @endif">
            <a href="{{ $route['url'] }}"
                class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700">
                <span class="text-2xl text-gray-500 flex item-center"><ion-icon
                        name="{{ $route['icon'] }}"></ion-icon></span>
                <span class="ml-3" sidebar-toggle-item>{{ $route['text'] }}</span>
            </a>
        </li>
    @endif
@endforeach
