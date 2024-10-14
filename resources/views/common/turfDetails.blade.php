<x-home-layout>
    @include('components.subheader-bg')
    @push('owlcarouselcss')
        <style>
            .owl-carousel {
                position: relative;
            }

            .owl-item {
                position: relative;
            }

            .slider-content {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                z-index: 2;
            }

            .slider-item::before,
            .slider-item::after {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: black;
                opacity: 0.4;
                z-index: 1;
            }

            .slider-item::before {
                z-index: 0;
            }

            .owl-nav {
                position: absolute;
                top: -10px;
                left: 0;
                margin: 0;
                height: 80vh;
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;

            }

            .owl-carousel .owl-prev,
            .owl-carousel .owl-next {
                transform: scale(2) !important;
                margin: 20px !important;
                outline: none;
                color: #fff !important;
                opacity: .3 !important;
            }

            .owl-carousel .owl-prev:hover,
            .owl-carousel .owl-next:hover {
                background: none !important;
                color: #57ff4e !important;
                opacity: 1 !important;
            }
        </style>
    @endpush
    


    <div class="mt-10 w-[90%] mx-auto mb-10">
        <p class="text-3xl font-extrabold text-[#131318] mb-10 text-center uppercase">
            <span class="">{{$turf->turf_name}}</span>
        </p>


        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
            <div class="owl-carousel owl-theme col-span-2">
                <div class="item">
                    <div class="slider-item">
                        <img class="h-[80vh] owl-lazy object-cover" data-src="{{ asset($turf->thumbnail) }}"
                            alt="{{ $turf->thubmnail }}">
                        <div class="slider-content">

                        </div>
                    </div>
                </div>
                @if ($turf->images)
                    @foreach ($turf->images as $image)
                        <div class="item">
                            <div class="slider-item">
                                <img class="h-[80vh] owl-lazy object-cover" data-src="{{ asset($image) }}"
                                    alt="">
                                <div class="slider-content">

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="col-span-1">
                <iframe src="{{ $turf->map_iframe }}" class="w-[340px] lg:w-[400px] h-[488px]" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

        </div>

        <div class="mt-10 mb-10">
            <h1 class="text-2xl font-bold text-[#131318] mb-4">
                About Venue
            </h1>
            <p>{{ $turf->description }}</p>
        </div>

        <div class="lg:mx-auto lg:grid lg:grid-cols-4 gap-x-7">

            <div class="mt-10 mb-10">
                <h1 class="text-2xl font-bold text-[#131318] mb-4">
                    Size
                </h1>

                <p>{{ $turf->size }}</p>


            </div>

            <div class="mt-10 mb-10">
                <h1 class="text-2xl font-bold text-[#131318] mb-4">
                    Location
                </h1>
                <p class="text-[#13131899] text-sm lg:text-base font-bold">
                    {{ $turf->location }}
                </p>
            </div>

            <div class="mt-10 mb-10">
                <h1 class="text-2xl font-bold text-[#131318] mb-4">
                    Type
                </h1>
                <p class="text-[#13131899] text-sm lg:text-base font-bold">{{ $turf->turf_type }}</p>
            </div>


            <div class="mt-10 mb-10">
                <h1 class="text-2xl font-bold text-[#131318] mb-4">
                    Phone
                </h1>
                <p class="text-[#13131899] text-sm lg:text-base font-bold">
                    {{ $turf->phone }}
                </p>
            </div>


        </div>



        <div class="mt-10 mb-10">
            <h1 class="text-2xl font-bold text-[#131318] mb-5">
                Packages
            </h1>

            <div class="max-w-2xl">

                <table class="lg:w-[80%] w-full bg-white border border-gray-300 rounded-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-2 px-4 border-b">Shift</th>
                            <th class="py-2 px-4 border-b">Duration</th>
                            <th class="py-2 px-4 border-b ">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($turf->timing as $item)
                            <tr class="text-center">
                                <td class="py-2 px-4 border-r border-b text-[#13131899] text-sm lg:text-base font-bold">
                                    @if ($item->shift_id == 1)
                                        <span>Day</span>
                                    @else
                                        <span>Night</span>
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-r border-b text-[#13131899] text-sm lg:text-base font-bold">
                                    {{ $item->duration }} minute
                                </td>
                                <td class="py-2 px-4 border-b text-[#13131899] text-sm lg:text-base font-bold">
                                    {{ $item->amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    @push('owncarouseljs')
        <script>
            var owl = $('.owl-carousel').owlCarousel({
                loop: true,
                nav: true,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                dots: false,
                // animateOut: 'pulse',
                lazyLoad: true,
                navText: ['<ion-icon name="chevron-back-outline"></ion-icon>',
                    '<ion-icon name="chevron-forward-outline"></ion-icon>'
                ],

                responsive: {
                    0: {
                        items: 1
                    }
                }
            });
        </script>
    @endpush

</x-home-layout>
