@push('owlcarouselcss')
    <style>
        .owl-carousel {
            position: relative;
            display: flex;
        }

        .owl-item {
            position: relative;
            width: 100%
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
            /* Ensure the layer is behind the content */
        }

        .slider-item::before {
            /* Adjust the order of the layers based on your design */
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
<div class="owl-carousel owl-theme owl-loaded">
    <div class="owl-stage-outer">
        <div class="owl-stage ">
            @for ($i = 1; $i < 5; $i++)
                <div class="owl-item ">
                    <div class="slider-item ">
                        <img class="h-[80vh]  object-cover" src="{{ asset('assets/images/slider' . $i . '.jpg') }}"
                            alt="">
                        <div class="slider-content">
                            <h2
                                class="animated-title text-white min-[320px]:text-xl sm:text-3xl md:text-4xl lg:text-5xl font-bold  font-lemon ">
                                Your
                                Best Turf
                                Solution
                            </h2>
                            <p
                                class="mt-3 animated-description min-[320px]:text-xs md:text-sm lg:text-base xl:text-lg text-white   min-[320px]:line-clamp-3">
                                Elevate your turf care game with TurfTracker, the go-to system for simplified and
                                efficient turf management. From precise watering schedules to pest control alerts,
                            </p>

                        </div>
                    </div>
                </div>
            @endfor
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
            autoplayHoverPause: false,
            dots: false,
            animateOut: 'fadeOut',
            // lazyLoad: true,
            navText: ['<ion-icon name="chevron-back-outline"></ion-icon>',
                '<ion-icon name="chevron-forward-outline"></ion-icon>'
            ],

            responsive: {
                0: {
                    items: 1
                }
            }
        });

        $('.owl-carousel').on('change.owl.carousel', function(event) {
            var el = event.target;
            $('h2', el).addClass('fadeInDown animated')
                .one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                    $('h2', el).removeClass('fadeInDown animated');
                });
        });

        $('.owl-carousel').on('change.owl.carousel', function(event) {
            var el = event.target;
            $('p', el).addClass('fadeInUp animated')
                .one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                    $('p', el).removeClass('fadeInUp animated');
                });
        });
    </script>
@endpush
