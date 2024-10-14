<x-dashboard-layout>
    @section('title')
        Edit Branch
    @endsection

    <div class="w-full mt-4 mb-8 flex justify-between">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="#"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Admin
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="#"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Turf
                            Owners</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Edit</span>
                    </div>
                </li>
            </ol>
        </nav>

        <a href="{{ route('turf-owner.branches.index') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none">All
            Branches
        </a>
    </div>
    <!-- Session Status -->

    @if (session('warning'))
        <x-warning-alert>
            {{ session('warning') }}
        </x-warning-alert>
    @endif

    @if (session('success'))
        <x-success-alert>
            {{ session('success') }}
        </x-success-alert>
    @endif
    <form class="md:max-w-[50%]" action="{{ route('turf-owner.branches.update', ['branch' => $branch->id]) }}"
        method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-card>
            <h4 class="text-lg font-semibold mb-4">
                Create Branch
            </h4>
            <div class="">
                <!--  Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__(' Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="$branch->name" autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <!--  Name -->
                <div>
                    <x-input-label for="city" :value="__('Select City')" />
                    {{-- <x-text-input id="city_id" class="block mt-1 w-full" type="text" name="city_id"
                        :value="old('city_id')" autofocus /> --}}
                    <select id="city" name="city_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">
                        <option selected>Choose a City</option>
                        @foreach ($cities as $city)
                            <option @if ($city->id == $branch->city_id) selected @endif value="{{ $city->id }}">
                                {{ $city->name }}</option>
                        @endforeach

                    </select>
                </div>

            </div>
            <div class="my-4 text-end">
                <x-primary-button class="">
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </x-card>
    </form>

</x-dashboard-layout>
