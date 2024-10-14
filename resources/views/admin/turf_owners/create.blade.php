<x-dashboard-layout>
    @section('title')
        Create Turf owner
    @endsection

    <!----- Aleart------>
    @include('alerts.alert')

    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-card>
            <h4 class="text-lg font-semibold mb-4">
                Create New Owner
            </h4>
            <div class="grid gird-cols-1 lg:grid-cols-2 gap-6">
                <!-- Full Name -->
                <div>
                    <x-input-label for="name" :value="__('Full Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Phone Number  -->
                <div>
                    <x-input-label for="phone" :value="__('Phone')" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                        :value="old('phone')" autofocus />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>
                <!-- Phone Number  -->
                <div>
                    <x-input-label for="nid" :value="__('NID')" />
                    <x-text-input id="nid" class="block mt-1 w-full" type="file" name="nid"
                        :value="old('nid')" autofocus />
                    <x-input-error :messages="$errors->get('nid')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <label class="relative inline-flex items-center mb-5 cursor-pointer">
                    <input type="checkbox" name="status" class="sr-only peer" checked>
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Status</span>
                </label>
            </div>
            <div class="my-4 text-right">
                <x-primary-button class="">
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
        </x-card>
    </form>

</x-dashboard-layout>
