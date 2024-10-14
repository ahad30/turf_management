<x-dashboard-layout>

    @section('title')
        Edit Owner Info
    @endsection

    <!----- Aleart------>
    @include('alerts.alert')

    <form action="{{ route('admin.turf-owners.update', ['turf_owner' => $turf_owner->id]) }}" method="post">
        @csrf
        @method('put')
        <x-card>
            <h4 class="text-lg font-semibold mb-4">
                Edit Owner Info
            </h4>
            <div class="grid gird-cols-1 lg:grid-cols-2 gap-6">
                <!-- Full Name -->
                <div>
                    <x-input-label for="name" :value="__('Full Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" :value="$turf_owner->name" autofocus
                        readonly />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" :value="$turf_owner->email" autofocus
                        readonly />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="phone" :value="__('Phone')" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="text" :value="$turf_owner->phone" autofocus
                        readonly />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="nid" :value="__('Nid')" />
                    <x-text-input id="nid" class="block mt-1 w-full" type="file" autofocus />
                    <x-input-error :messages="$errors->get('nid')" class="mt-2" />
                </div>

                <label class="relative inline-flex items-center mb-5 cursor-pointer">
                    <input type="hidden" name="status" value="Inactive">
                    <input type="checkbox" name="status" class="sr-only peer" value="Active"
                        @if ($turf_owner->status === 'Active') checked @endif>
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                        @if ($turf_owner->status === 'Active')
                            Active
                        @else
                            Inactive
                        @endif
                    </span>
                </label>
            </div>
            <div class="my-4 text-right">
                <x-primary-button class="">
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </x-card>
    </form>

</x-dashboard-layout>
