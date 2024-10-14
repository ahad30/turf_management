<header class="bg-transparent fixed top-0 z-[99] w-full transition-all duration-300  " id="navbar-main">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8 ">
        <div class="flex h-16 items-center justify-between">
            <div class="flex-1 md:flex md:items-center md:gap-12">
                <a class="block text-teal-600" href="/">
                    <span class="sr-only">Home</span>
                    <x-application-logo />
                </a>
            </div>

            <div class="md:flex md:items-center md:gap-12">
                <nav aria-label="Global" class="hidden md:block">
                    <ul class="flex items-center gap-6 text-sm" id="menu-items">
                        <li>
                            <a class="font-semibold transition hover:underline" href="/"> Home </a>
                        </li>

                        <li>
                            <a class="font-semibold transition hover:underline" href="/about"> About </a>
                        </li>

                        <li>
                            <a class="font-semibold transition hover:underline" href="/contact"> Contact
                            </a>
                        </li>
                        <li>
                            <a class="font-semibold transition hover:underline" href="{{ route('match.making') }}">
                                Match Making
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="flex items-center gap-4">
                    <div class="sm:flex sm:gap-4">
                        <a href="{{ route('newturfregister') }}"> <x-hyper-button label="Turf Register" type="button"
                                class="bg-transparent"></x-hyper-button></a>
                    </div>


                    <div class="block md:hidden">
                        <button id="mobile-menu-toggle"
                            class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-white">
        <ul class="flex flex-col items-center gap-6 text-sm">
            <li>
                <a class=" transition text-teal-600 hover:text-primary" href="/"> Home </a>
            </li>
            <li>
                <a class=" transition text-teal-600 hover:text-primary" href="/about"> About </a>
            </li>
            <li>
                <a class=" transition text-teal-600 hover:text-primary" href="/contact"> Contact </a>
            </li>
        </ul>
    </div>
</header>


<script>
    document.getElementById('mobile-menu-toggle').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>

{{-- menu-items --}}
@push('navbar-main')
    <script type="module">
        const setActiveClass = () => {

            if ($(window).scrollTop()) {
                /**
                 * adding white background
                 */
                $("#navbar-main").addClass("bg-white ")
                /**
                 * adding text primary
                 */
                $("#menu-items li a").addClass(
                    "text-primary hover:text-gray-700                                                                                   "
                );
                /**
                 * removing white text
                 */
                $("#menu-items li a").removeClass("text-white hover:text-primary");
            } else {
                /**
                 * removing white background
                 */
                $("#navbar-main").removeClass(
                    "bg-white")
                /**
                 * adding active class
                 */
                $("#menu-items li a").addClass("text-white hover:text-primary hover:underline");
                /**
                 * remving text primary
                 */
                $("#menu-items li a").removeClass("text-primary hover:text-gray-700");

            }

        }
        $(window).on('scroll', setActiveClass)
        $("#mobile-menu-toggle").on('click', () => {
            $("#navbar-main").addClass("bg-white")
        })
        setActiveClass()
    </script>
@endpush
