<x-dashboard-layout>
    @section('title')
        Create Staff
    @endsection

    <div class="w-full mt-4 mb-8 flex justify-between">
        <a href="{{ route('admin.turf-owners.index') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none">All
            Staffs</a>
    </div>
    @include('alerts.alert')

    <form action="{{ route('turf-owner.staffs.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-card>
            <h4 class="text-lg font-semibold mb-4">
                Create New Staff
            </h4>
            <div class="grid gird-cols-1 lg:grid-cols-2 gap-6">
                <!--  Select Turf -->
                <div>
                    <x-input-label for="name" :value="__(' Select Branch')" />
                    <select id="branch" name="branch_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">
                        <option selected>Choose a Branch</option>
                        @foreach ($branches as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>


                <!-- Full Name -->
                <div>
                    <x-input-label for="name" :value="__('Full Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" autofocus />
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
                    <input type="hidden" name="status" class="sr-only peer" value="Inactive">
                    <input type="checkbox" name="status" class="sr-only peer" value="Active" checked>
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Status</span>
                </label>
            </div>
            <div class="my-4 text-right">
                <x-primary-button class="">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </x-card>
    </form>

</x-dashboard-layout>
