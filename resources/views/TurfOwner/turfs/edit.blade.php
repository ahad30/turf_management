<x-dashboard-layout>
    @push('steppercss')
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.6.0/flatly/bootstrap.min.css">
    @endpush
    @section('title')
        Edit Turf
    @endsection

    <div class="w-full mt-4 mb-8 flex justify-between">
        <a href="{{ route('turf-owner.my-turfs.index') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none">My
            Turfs
        </a>
    </div>
    <!-- Session Status -->
    @include('alerts.alert')

    <form action="{{ route('turf-owner.my-turfs.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h4 class="text-lg font-semibold mb-4">
            Edit Turf Detail
        </h4>

        @if ($errors->any())
            <p class="text-center text-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </p>
        @endif
        <div id="navWizard">
            <ul id="navWizardSteps" class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#one" role="tab"
                        aria-controls="home" aria-selected="true">Step One</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#two" role="tab"
                        aria-controls="profile" aria-selected="false">Step Two</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#three" role="tab"
                        aria-controls="contact" aria-selected="false">Step Three</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#four" role="tab"
                        aria-controls="contact" aria-selected="false">Step Four</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade  active show" id="one" role="tabpanel" aria-labelledby="home-tab">
                    <!-- page 1  -->
                    <h2 class="text-lg">Basic Informations</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        <div class="">
                            <!--  Name -->
                            <div>
                                <x-input-label for="turf_name" :value="__('Turf Name')" />
                                <input type="text" id="turf_name" name="turf_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                    placeholder="ex: Akram Internation" value="{{ $turf->turf_name }}">
                                <x-input-error :messages="$errors->get('turf_name')" class="mt-2" />
                            </div>
                        </div>
                        <div class="">
                            <!--  Name -->
                            <div>
                                <x-input-label for="city_id" :value="__(' Select City')" />
                                <select id="city" name="city_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">
                                    <option selected value="">Choose a City</option>
                                    @foreach ($cities as $city)
                                        <option @if ($turf->city_id == $city->id) selected @endif
                                            value="{{ $city->id }}">
                                            {{ $city->name }}</option>
                                    @endforeach

                                </select>
                                <x-input-error :messages="$errors->get('city_id')" class="mt-2" />
                            </div>
                        </div>
                        <div class="">
                            <!--  Name -->
                            <div>
                                <x-input-label for="branch" :value="__(' Select Branch')" />
                                <select id="city" name="branch_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">
                                    <option selected value="">Choose a Branch</option>
                                    @foreach ($branches as $branch)
                                        <option @if ($turf->branch_id == $branch->id) selected @endif
                                            value="{{ $branch->id }}">
                                            {{ $branch->name }}</option>
                                    @endforeach

                                </select>
                                <x-input-error :messages="$errors->get('branch_id')" class="mt-2" />
                            </div>
                        </div>
                        <div class="">
                            <!--  Name -->
                            <div>
                                <x-input-label for="turf_type" :value="__(' Select Turf Type')" />
                                <select id="turf_type" name="turf_type"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">
                                    <option selected value="">Choose a Type</option>
                                    <option @if ($turf->turf_type == 'Football') selected @endif value="Football">
                                        Football
                                    </option>
                                    <option @if ($turf->turf_type == 'Cricket') selected @endif value="Cricket">
                                        Cricket
                                    </option>
                                    <option @if ($turf->turf_type == 'Golf') selected @endif value="Golf">Golf
                                    </option>
                                    <option @if ($turf->turf_type == 'Hokey') selected @endif value="Hokey">Hokey
                                    </option>
                                    <option @if ($turf->turf_type == 'Batminton') selected @endif value="Batminton">
                                        Batminton</option>

                                    Batminton</option>
                                    <option @if ($turf->turf_type == 'Tennis') selected @endif value="Tennis">Tennis
                                    </option>
                                    <option @if ($turf->turf_type == 'Volleyball') selected @endif value="Volleyball">
                                        Volleyball</option>
                                </select>
                                <x-input-error :messages="$errors->get('turf_type')" class="mt-2" />
                            </div>
                        </div>
                        <div class="">
                            <!--  Name -->
                            <div>
                                <x-input-label for="size" :value="__(' Select Size')" />
                                <select id="size" name="size"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">
                                    <option selected value="">Choose a Size</option>
                                    <option @if ($turf->size == '9v9: 45m x 60m') selected @endif value="9v9: 45m x 60m">9
                                        v 9: 45m x 60m</option>
                                    <option @if ($turf->size == '7v7: 30m x 50m') selected @endif value="7v7: 30m x 50m">
                                        7 v 7: 30m x 50m</option>
                                    <option @if ($turf->size == '6v6: 25m x 40m') selected @endif value="6v6: 25m x 40m">
                                        6 v 6: 25m x 40m</option>
                                    <option @if ($turf->size == '5v5: 20m x 30m') selected @endif value="5v5: 20m x 30m">
                                        5 v 5: 20m x 30m</option>
                                    <option @if ($turf->size == '4v4: 12m x 20m') selected @endif value="4v4: 12m x 20m">
                                        4 v 4: 12m x 20m</option>
                                </select>
                                <x-input-error :messages="$errors->get('size')" class="mt-2" />
                            </div>
                        </div>
                        <div>
                            <x-input-label for="map_url" :value="__('Map Url')" />
                            <input type="url" id="map_url"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="ex: https://maps.app.goo.gl/xcA41rfmp1BUWN7Q7"
                                value="{{ $turf->map_url }}" name="map_url">
                            <x-input-error :messages="$errors->get('map_url')" class="mt-2" />
                        </div>
                        <div class="col-span-2">
                            <x-input-label for="map_iframe" :value="__('Map iframe')" />
                            <input type="url" id="map_iframe"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder='ex: https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.7897119668205!2d91.8013895127549!3d22.361567739244002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd92499fd86fd%3A0xaeeb1779a476133d!2sONE%20SANMAR!5e0!3m2!1sen!2sbd!4v1705904747493!5m2!1sen!2sbd'
                                name="map_iframe" value="{{ $turf->map_iframe }}">
                            <x-input-error :messages="$errors->get('map_iframe')" class="mt-2" />
                        </div>
                        <br>
                        <div class="col-span-2">
                            <!--  Name -->
                            <div>
                                <x-input-label for="location" :value="__('Location')" />
                                <textarea id="location" rows="6"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                    placeholder="Write your thoughts here..." style="resize: none;" name="location">{{ $turf->location }}</textarea>
                                <x-input-error :messages="$errors->get('location')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-span-2">
                            <!--  Name -->
                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea id="description" rows="6" name="description"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                    placeholder="Write your thoughts here..." style="resize: none;">{{ $turf->description }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade " id="two" role="tabpanel" aria-labelledby="profile-tab">
                    <!-- page 2  -->
                    <h2 class="text-lg">Media</h2>
                    <!--  Name -->
                    <div>
                        <x-input-label for="title" :value="__('Choose a thumbnail')" />
                        <input name="thumbnail"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input" type="file">
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="title" :value="__('Choose a Other Images')" />
                        <input name="images[]"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input" type="file" multiple>
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                </div>
                <div class="tab-pane fade " id="three" role="tabpanel" aria-labelledby="contact-tab">
                    <!-- page 3  -->
                    <h2 class="text-lg mb-3">Timing & Pricing</h2>
                    <b class="text-success mb-1">For Day</b>
                    <!-- Package 1  -->
                    <div class="ring-1 ring-gray-100 p-1  grid lg:grid-cols-2 gap-x-4 mb-3">
                        <div>
                            <x-input-label for="price_for_60_minutes_at_day" :value="__('Package: 1')" />
                            <select disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">

                                <option value="60" selected>60 Minutes (1 Hour)</option>
                            </select>

                        </div>
                        <div>
                            <x-input-label for="price_for_60_minutes_at_day" :value="__('Price For 60 Minutes (Day)')" />
                            <input type="number" id="price_for_60_minutes_at_day"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                value="{{ old('price_for_60_minutes_at_day') }}" placeholder="ex: 1000"
                                min="0" name="price_for_60_minutes_at_day">
                            <x-input-error :messages="$errors->get('price_for_60_minutes_at_day')" class="mt-2" />
                        </div>
                    </div>
                    <!-- Package 2  -->
                    <div class="ring-1 ring-gray-100 p-1  grid lg:grid-cols-2 gap-x-4 mb-3">
                        <div>
                            <x-input-label for="price_for_90_minutes_at_day" :value="__('Package: 2')" />
                            <select disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">

                                <option value="90" selected>90 Minutes (1 Hour 30 minutes)</option>
                            </select>

                        </div>
                        <div>
                            <x-input-label for="price_for_90_minutes_at_day" :value="__('Price For 120 Minutes (Day)')" />
                            <input type="number" id="price_for_90_minutes_at_day"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="ex: 1000" min="0" name="price_for_90_minutes_at_day"
                                value="{{ old('price_for_90_minutes_at_day') }}">
                            <x-input-error :messages="$errors->get('price_for_90_minutes_at_day')" class="mt-2" />
                        </div>
                    </div>
                    <!-- Package 3  -->
                    <div class="ring-1 ring-gray-100 p-1  grid lg:grid-cols-2 gap-x-4 mb-3">
                        <div>
                            <x-input-label for="price_for_120_minutes_at_day" :value="__('Package: 3')" />
                            <select disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">

                                <option value="90" selected>120 Minutes (2 Hours)</option>
                            </select>

                        </div>
                        <div>
                            <x-input-label for="price_for_120_minutes_at_day" :value="__('Price For 90 Minutes (Day)')" />
                            <input type="number" id="price_for_90_minutes_at_day"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="ex: 1000" min="0" name="price_for_120_minutes_at_day"
                                value="{{ old('price_for_120_minutes_at_day') }}">
                            <x-input-error :messages="$errors->get('price_for_120_minutes_at_day')" class="mt-2" />
                        </div>
                    </div>
                    <b class="text-success mb-1">For Night</b>
                    <!-- Package 4  -->
                    <div class="ring-1 ring-gray-100 p-1  grid lg:grid-cols-2 gap-x-4 mb-3">
                        <div>
                            <x-input-label for="price_for_60_minutes_at_night" :value="__('Package: 4')" />
                            <select disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">

                                <option value="60" selected>60 Minutes (1 Hour)</option>
                            </select>

                        </div>
                        <div>
                            <x-input-label for="price_for_60_minutes_at_night" :value="__('Price For 60 Minutes (Night)')" />
                            <input type="number" id="price_for_60_minutes_at_day"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="ex: 1000" min="0" name="price_for_60_minutes_at_night"
                                value="{{ old('price_for_60_minutes_at_night') }}">
                            <x-input-error :messages="$errors->get('price_for_60_minutes_at_night')" class="mt-2" />
                        </div>
                    </div>
                    <!-- Package 5  -->
                    <div class="ring-1 ring-gray-100 p-1  grid lg:grid-cols-2 gap-x-4 mb-3">
                        <div>
                            <x-input-label for="price_for_90_minutes_at_night" :value="__('Package: 5')" />
                            <select disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">

                                <option value="90" selected>90 Minutes (1 Hour 30 minutes)</option>
                            </select>

                        </div>
                        <div>
                            <x-input-label for="price_for_90_minutes_at_night" :value="__('Price For 90 Minutes (Night)')" />
                            <input type="number" id="price_for_90_minutes_at_day"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="ex: 1000" min="0" name="price_for_90_minutes_at_night"
                                value="{{ old('price_for_90_minutes_at_night') }}">
                            <x-input-error :messages="$errors->get('price_for_90_minutes_at_night')" class="mt-2" />
                        </div>
                    </div>
                    <!-- Package 6  -->
                    <div class="ring-1 ring-gray-100 p-1  grid lg:grid-cols-2 gap-x-4 mb-3">
                        <div>
                            <x-input-label for="price_for_120_minutes_at_night" :value="__('Package: 6')" />
                            <select disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">

                                <option value="90" selected>120 Minutes (2 Hours)</option>
                            </select>

                        </div>
                        <div>
                            <x-input-label for="price_for_120_minutes_at_night" :value="__('Price For 120 Minutes  (Night)')" />
                            <input type="number" id="price_for_90_minutes_at_day"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="ex: 1000" min="0" name="price_for_120_minutes_at_night"
                                value="{{ old('price_for_120_minutes_at_night') }}">
                            <x-input-error :messages="$errors->get('price_for_120_minutes_at_night')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade " id="four" role="tabpanel" aria-labelledby="contact-tab">
                    <!-- Package 7  -->
                    <h2 class="text-lg">Account Informations </h2>
                    <div class="grid lg:grid-cols-2 gap-4 mb-2">
                        <div>
                            <x-input-label for="brank_name" :value="__('Bank Name')" />
                            <select id="brank_name" name="bank_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">
                                <option selected value="">Choose a Bank</option>
                                <option @if ($turf->bank_name == 'Bikash') selected @endif value="Bkash">Bkash
                                </option>
                                <option @if ($turf->bank_name == 'Nogod') selected @endif value="Nogod">Nogod
                                </option>
                                <option @if ($turf->bank_name == 'Rocket') selected @endif value="Rocket">Rocket
                                </option>
                            </select>
                            <x-input-error :messages="$errors->get('brank_name')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="account_type" :value="__('Choose Type')" />
                            <select id="brank_name" name="account_type"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mt-1">
                                <option selected value="">Choose a Bank</option>
                                <option @if ($turf->account_type == 'Personal') selected @endif value="Personal">Personal
                                </option>
                                <option @if ($turf->account_type == 'Agent') selected @endif value="Agent">Agent
                                </option>
                            </select>
                            <x-input-error :messages="$errors->get('account_type')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="account_holder_name" :value="__('Account Holder Name')" />
                            <input type="text" id="account_holder_name" value="{{ $turf->account_holder_name }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                name="account_holder_name" placeholder="Jhon Doe">
                            <x-input-error :messages="$errors->get('account_holder_name')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="account_number" :value="__('Account Number')" />
                            <input type="number" id="account_number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="01245789654" name="account_number" value="{{ $turf->account_number }}">
                            <x-input-error :messages="$errors->get('account_number')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="qr_code" :value="__('Qr Code For Pay')" />
                            <input type="file" id="qr_code"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="ex: BAI895XKGC" name="qr_code">
                            <x-input-error :messages="$errors->get('qr_code')" class="mt-2" />
                        </div>
                    </div>

                    <h2 class="text-lg">Personal Informations </h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2">
                        <div>
                            <x-input-label for="phone" :value="__('Phone Number')" />
                            <input type="number" id="phone"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="ex: 01245789564" name="phone" value="{{ $turf->phone }}">
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
    @push('stepperjs')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
        </script>

        <script src="{{ asset('assets/js/stepper.js') }}"></script>
    @endpush
    @push('ajaxjs')
        <script>
            $(document).ready(function() {
                $('#navWizard').jqueryBootstrapWizard({
                    onFinish: function() {
                        //
                    },
                    cancel_url: '/turf-owner/my-turfs',
                });
            });
        </script>
    @endpush
</x-dashboard-layout>
