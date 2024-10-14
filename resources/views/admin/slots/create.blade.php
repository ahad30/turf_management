<x-dashboard-layout>
    @section('title')
        Create Branch
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
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Slots
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Create</span>
                    </div>
                </li>
            </ol>
        </nav>

        <a href="{{ route('turf-owner.branches.index') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none">All
            Slots
        </a>
    </div>
    <!-- Session Status -->

    @if (session('success'))
        <x-success-alert>
            {{ session('success') }}
        </x-success-alert>
    @endif
    <form class="lg:max-w-[50%]" action="{{ route('turf-owner.branches.store') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <x-card>
            <h4 class="text-lg font-semibold mb-4">
                Create Slot
            </h4>
            <div class="grid grid-cols-1 space-y-4">
                <!--  Name -->
                <div class="">
                    <x-input-label for="name" :value="__(' Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <!--  Name -->
                <div>
                    <x-input-label for="shift" :value="__('Select Shift')" />

                    <select id="shift" name="shift_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1 capitalize">
                        <option selected>Choose a Shift</option>
                        @foreach ($shifts as $shift)
                            <option class="capitalize" value="{{ $shift->id }}">
                                {{ $shift->name }}</option>
                        @endforeach

                    </select>
                </div>
                <!--  Name -->
                <div>
                    <x-input-label for="duration" :value="__('Duration')" />

                    <select id="duration"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                        <option value='60'>1 Hour</option>
                        <option value='90'>1 Hour 30 Minutes</option>
                        <option value='120'>2 Hours</option>
                    </select>
                    <x-input-error :messages="$errors->get('duration')" class="mt-2" />
                </div>

                <!--  From -->
                <div>
                    <x-input-label for="from" :value="__('From')" />
                    <div class="grid grid-cols-3 gap-x-3">
                        <select id="from_hour"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value='{{ $i }}'>{{ $i }}</option>
                            @endfor
                        </select>
                        <select id="from_minutes"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            <option value='00'>00</option>
                        </select>
                        <select id="pm_or_am"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            readonly="true">
                            {{-- <option value='AM'>AM</option> --}}
                            {{-- <option value='PM'>PM</option> --}}
                        </select>
                    </div>

                    <x-input-error :messages="$errors->get('from')" class="mt-2" />
                </div>



            </div>
            <div class="my-4 text-start">
                <x-primary-button class="">
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
        </x-card>
    </form>
    @push('thispagejs')
        <script>
            // set am or pm on select shift
            $("#shift").on('change', function(e) {

                if ($(this).val() == 1) {
                    $("#pm_or_am").html(`<option value='AM'>AM</option>`)
                } else if ($(this).val() == 2) {
                    $("#pm_or_am").html(`<option value='PM'>PM</option>`)
                } else {
                    $("#pm_or_am").html(`<option value='AM'>AM</option><option value='PM'>PM</option>`)
                }

            });
            $("#duration").on('change', function(e) {
                if (!$(this).val() % 60 == 30) {
                    $("#minutes").html(`<option value='00'>00</option>`)
                }
                if ($(this).val() % 60 != 30) {
                    $("#minutes").html(`<option value='00'>00</option><option value='30'>30</option>`)
                }

            })
        </script>
    @endpush
</x-dashboard-layout>
