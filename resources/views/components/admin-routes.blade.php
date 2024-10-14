<script src="{{ asset('assets/js/sidebar.js') }}"></script>
<div>
    @php
        $routes = [
            [
                'text' => 'Dashboard',
                'url' => route('admin.home'),
                'isDropDown' => false,
                'active' => 'text-white bg-green-500',
                'icon' => 'apps-outline',
            ],
            [
                'text' => 'Contact',
                'url' => route('admin.contactMessages'),
                'isDropDown' => false,
                'active' => 'text-white bg-green-500',
                'icon' => 'mail-unread-outline',
            ],
            [
                'text' => 'City',
                'url' => route('admin.cities.index'),
                'isDropDown' => false,
                'active' => 'text-white bg-green-500',
                'icon' => 'business-outline',
            ],
            [
                'text' => 'Shifting',
                'url' => route('admin.shifts.index'),
                'isDropDown' => false,
                'active' => 'text-white bg-green-500',
                'icon' => 'hourglass-outline',
            ],
            [
                'text' => 'Slots',
                'url' => route('admin.slots.index'),
                'isDropDown' => false,
                'active' => 'text-white bg-green-500',
                'icon' => 'timer-outline',
            ],
            [
                'text' => 'Owners',
                'url' => route('admin.turf-owners.index'),
                'isDropDown' => false,
                'active' => 'text-white bg-green-500',
                'icon' => 'person-outline',
            ],
            [
                'text' => 'Turfs',
                'url' => '#',
                'isDropDown' => true,
                'active' => 'text-white bg-green-500',
                'icon' => 'game-controller-outline',
                'subItems' => [
                    [
                        'text' => 'On Hold',
                        'url' => route('admin.onHoldTurfs'),
                        'isDropDown' => false,
                        'icon' => 'add-circle-outline',
                    ],
                    [
                        'text' => 'Active',
                        'url' => route('admin.activeTurfs'),
                        'isDropDown' => false,
                        'icon' => 'checkmark-circle-outline',
                    ],
                    [
                        'text' => 'Inactive',
                        'url' => route('admin.newTurfs'),
                        'isDropDown' => false,
                        'icon' => 'add-circle-outline',
                    ],
                ],
            ],
            [
                'text' => 'Turf Reg Request',
                'url' => route('admin.newturfregisters.index'),
                'isDropDown' => false,
                'active' => 'text-white bg-green-500',
                'icon' => 'add-circle-outline',
            ],
            [
                'text' => 'Transactions',
                'url' => route('admin.allAcceptedTransaction'),
                'isDropDown' => false,
                'active' => 'text-white bg-green-500',
                'icon' => 'add-circle-outline',
            ],
            [
                'text' => 'Settings',
                'url' => route('admin.settings.index'),
                'isDropDown' => false,
                'active' => 'text-white bg-green-500',
                'icon' => 'build-outline',
            ],
        ];

    @endphp
    @foreach ($routes as $route)
        @if ($route['isDropDown'])
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-200 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                    aria-controls="dropdown-crud" data-collapse-toggle="dropdown-crud">
                    <ion-icon name="{{ $route['icon'] }}"></ion-icon>
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
                                class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-100 pl-11 dark:text-gray-200 dark:hover:bg-gray-700 @if ($page_slug == 'products') bg-gray-100 dark:bg-gray-700 @endif"><span
                                    class="text-2xl flex item-center pr-2"><ion-icon
                                        name="{{ $subItem['icon'] }}"></ion-icon></span>{{ $subItem['text'] }}</a>

                        </li>
                    @endforeach
                </ul>
            </li>
        @else
            <li class="group @if (request()->url($route['url']) === $route['url']) {{ $route['active'] }} @endif">
                <a href="{{ $route['url'] }}" class="flex items-center p-2 text-base  rounded-lg ">
                    <span class="text-2xl flex item-center "><ion-icon name="{{ $route['icon'] }}"></ion-icon></span>
                    <span class="ml-3" sidebar-toggle-item>{{ $route['text'] }}</span>
                </a>
            </li>
        @endif
    @endforeach
</div>
