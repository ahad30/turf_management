<?php
use Illuminate\Http\Request;

?>

<style>
    .turf p::after {
        content: ""
    }

    .card {
        position: relative;
        overflow: hidden;
    }

    .card img {
        transition: transform 0.3s ease-in-out;
        display: block;
        width: 100%;
        height: auto;
    }

    .card:hover img {
        transform: scale(1.1);
        /* Adjust the scale factor as needed */
    }

    .bg-white {
        transition: box-shadow 0.3s ease-in-out;
    }

    .card:hover .bg-white {
        box-shadow: 0 12px 24px -6px rgba(0, 0, 0, 0.2), 0 16px 70px -4px rgba(0, 0, 0, 0.15);
    }
</style>
<div class="mx-auto max-w-screen-xl px-4 sm:px-6 sm:py-2 md:py-4 lg:px-8 lg:py-9">
    {{-- Filter --}}
    <div class="mt-5">
        <form class="grid grid-cols-1 lg:grid-cols-4  gap-3 items-center" action="{{ route('home') }}">
            @csrf
            <select id="countries" name="city_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary md:max-w-72  w-full">
                <option value="">Choose a city</option>
                @foreach ($cities as $city)
                    <option {{ old('city_id') == $city->id ? 'selected' : '' }} value="{{ $city->id }}">
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>
            <select id="turf_type" name="turf_type"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary md:max-w-72 lg:col-span-4">
                <option value="">Choose a Type</option>
                <option {{ old('turf_type') == 'Football' ? 'selected' : '' }} value="Football">Football</option>
                <option {{ old('turf_type') == 'Cricket' ? 'selected' : '' }} value="Cricket">Cricket</option>
                <option {{ old('turf_type') == 'Golf' ? 'selected' : '' }} value="Golf">Golf</option>
                <option {{ old('turf_type') == 'Hockey' ? 'selected' : '' }} value="Hockey">Hockey</option>
                <option {{ old('turf_type') == 'Badminton' ? 'selected' : '' }} value="Badminton">Badminton</option>
                <option {{ old('turf_type') == 'Tennis' ? 'selected' : '' }} value="Tennis">Tennis</option>
                <option {{ old('turf_type') == 'Volleyball' ? 'selected' : '' }} value="Volleyball">Volleyball</option>
            </select>
            <div class="">
            <button type="submit"
            class="bg-primary align-middle select-none font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-4 rounded-lg text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none me-2 ">Submit</button>
            <a href="{{ url()->current() }}"
                class="bg-gray-700 align-middle select-none font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-4 rounded-lg text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none">Clear</a>
            </div>

        </form>
    </div>

    {{-- all locations --}}
    <div class="location">
        @foreach ($cities as $city)
            @php
                $turfs = App\Models\Turf::where('city_id', $city->id)->where('status', 1);

                if (request()->turf_type) {
                    $turfs = $turfs->where('turf_type', request()->turf_type);
                }
                if (request()->city_id) {
                    $turfs = $turfs->where('city_id', request()->city_id);
                }
                $turfs = $turfs->get();
            @endphp
            @if ($turfs->count() > 0)
                <div class="mt-5 mb-5 w-full flex">
                    <p
                        class="text-slate-900 font-medium text-2xl border-b-2 border-slate-500 inline-block mx-auto py-1 fw-bold">
                        {{ $city->name }}</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                    @foreach ($turfs as $turf)
                        <a href="{{ route('turfDetails', ['id' => $turf->id]) }}"
                            class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 card">
                            <img class="rounded-t-lg" src="{{ asset($turf->thumbnail) }}" alt="product image"
                                style="height: 200px" />
                            <div class="p-4">
                                <div class="flex justify-between items-center">
                                    <h5 class="mb-2 text-xl font-medium text-gray-900 dark:text-white">
                                        {{ $turf->turf_name }}</h5>
                                    <span class="text-xs text-gray-500 dark:text-white">{{ $turf->turf_type }}</span>
                                </div>
                                <div class="flex justify-between items-center pt-2">
                                    <div>
                                        <form action="/book" method="GET">
                                            <input type="hidden" name="turf" value="{{ $turf->id }}">
                                            <button type="submit"
                                                class="bg-primary align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 px-4 rounded-lg text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none">Book
                                                now</button>
                                        </form>
                                    </div>

                                    <div>
                                        <p class="text-sm">1 hr $800</p>
                                        <p class="text-sm">1.5 hour $800</p>

                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div>
                </div>
            @endif
            {{-- @endif --}}
            {{-- {{ $turfs->links() }} --}}
        @endforeach
    </div>
</div>
