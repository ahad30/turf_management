<x-dashboard-layout>
    @section('title')
        Create Branch
    @endsection

    <div class="w-full mt-4 mb-8 flex justify-between">
        <a href="{{ route('turf-owner.branches.index') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none">All
            Branches
        </a>
    </div>
    <!-- Session Status -->

    @include('alerts.alert')
    <form class="md:max-w-[50%] mx-auto" action="{{ route('turf-owner.branches.store') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <x-card>
            <h4 class="text-lg font-semibold mb-4">
                Create Branch
            </h4>
            <div class="">
                <!--  Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__(' Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <!--  Name -->
                <div>
                    <x-input-label for="city" :value="__('Select City')" />
                    <select id="city" name="city_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">
                        <option selected>Choose a City</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach

                    </select>
                </div>

            </div>
            <div class="my-4 text-end">
                <x-primary-button class="">
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
        </x-card>
    </form>

</x-dashboard-layout>
