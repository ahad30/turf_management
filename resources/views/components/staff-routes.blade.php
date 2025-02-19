<script src="{{ asset('assets/js/sidebar.js') }}"></script>
@php
    $routes = [
        [
            'text' => 'Dashboard',
            'url' => route('staff.home'),
            'isDropDown' => false,
            'active' => 'text-white bg-green-500',
            'icon' => 'apps-outline',
        ],
        [
            'text' => 'Verify Booking',
            'url' => route('staff.verifyBookingHandle'),
            'isDropDown' => false,
            'active' => 'text-white bg-green-500',
            'icon' => 'bag-handle-outline',
        ],
        [
            'text' => 'My Turfs',
            'url' => route('staff.myTurf'),
            'isDropDown' => false,
            'active' => 'text-white bg-green-500',
            'icon' => 'id-card-outline',
        ],
        [
            'text' => 'Products',
            'url' => route('staff.products'),
            'isDropDown' => false,
            'active' => 'text-white bg-green-500',
            'icon' => 'bag-handle-outline',
        ],
        [
            'text' => 'Pending Booking',
            'url' => route('staff.pendingBooking'),
            'isDropDown' => false,
            'active' => 'text-white bg-green-500',
            'icon' => 'bag-handle-outline',
        ],
        [
            'text' => 'completed Booking',
            'url' => route('staff.completedBooking'),
            'isDropDown' => false,
            'active' => 'text-white bg-green-500',
            'icon' => 'bag-handle-outline',
        ],
        // [
        //     'text' => 'test',
        //     'url' => '#',
        //     'isDropDown' => true,
        //     'subItems' => [
        //         [
        //             'text' => 'Sub Item 1',
        //             'url' => '/admin',
        //             'isDropDown' => false,
        //         ],
        //         [
        //             'text' => 'Sub Item 2',
        //             'url' => '/admin',
        //             'isDropDown' => false,
        //         ],
        //     ],
        // ],
    ];

@endphp
@foreach ($routes as $route)
    @if ($route['isDropDown'])
        <li>
            <button type="button"
                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-500 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
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
            <ul id="dropdown-crud" class="space-y-2 py-2 @if (!empty($params) && $params['group'] !== 'crud') hidden @endif">

                @foreach ($route['subItems'] as $subItem)
                    <li>
                        <a href="crud/products"
                            class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700 @if ($page_slug == 'products') bg-gray-100 dark:bg-gray-700 @endif">{{ $subItem['text'] }}</a>

                    </li>
                @endforeach
            </ul>
        </li>
    @else
        <li class="group @if (request()->url($route['url']) === $route['url']) {{ $route['active'] }} @endif">
            <a href="{{ $route['url'] }}" class="flex items-center p-2 text-base  rounded-lg ">
                <span class="text-2xl flex item-center "><ion-icon name="{{ $route['icon'] }}"></ion-icon></span>
                <span class="ml-3  " sidebar-toggle-item>{{ $route['text'] }}</span>
            </a>
        </li>
    @endif
@endforeach
