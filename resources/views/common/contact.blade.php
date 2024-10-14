<x-home-layout>
    @section('title')
    Contact
@endsection
    @include('components.subheader-bg')
    <section class="bg-gray-100">
        <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
            @include('alerts.alert')
            <h1 class="text-center text-3xl font-semibold uppercase mb-10">Contact Us</h1>
            <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
                <div class="lg:col-span-2 lg:py-12">
                    <p class="max-w-xl text-lg">
                        At the same time, the fact that we are wholly owned and totally independent from
                        manufacturer and other group control gives you confidence that we will only recommend what
                        is right for you.
                    </p>

                    <div class="mt-8">
                        <a href="" class="text-2xl font-bold text-pink-600"> 0151 475 4450 </a>

                        <address class="mt-2 not-italic">282 Kevin Brook, Imogeneborough, CA 58517</address>
                    </div>
                </div>

                <div class="rounded-lg bg-white p-8 lg:col-span-3 lg:p-12">
                    <form action="{{ route('contact.store') }}" class="space-y-4" method="POST">
                        @csrf
                        <div>
                            <label class="sr-only" for="name">Name</label>
                            <input class="w-full rounded-lg border-gray-200 p-3 text-sm focus:border-primary"
                                placeholder="Name" type="text" name="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label class="sr-only" for="email">Email</label>
                                <input class="w-full rounded-lg border-gray-200 p-3 text-sm focus:border-primary"
                                    placeholder="Email address" type="email" name="email" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div>
                                <label class="sr-only" for="phone">Phone</label>
                                <input class="w-full rounded-lg border-gray-200 p-3 text-sm focus:border-primary"
                                    placeholder="Phone Number" type="tel" name="phone" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                        </div>

                        <div>
                            <label class="sr-only" for="message">Message</label>
                            <textarea class="w-full rounded-lg border-gray-200 p-3 text-sm focus:border-primary" placeholder="Message"
                                rows="8" name="message"></textarea>
                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-primary-button type="submit">Send Message</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-home-layout>
