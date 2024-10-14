<x-home-layout>
    @section('title')
        Turf Owner Registration
    @endsection
    @include('components.subheader-bg')
    <div class="mx-auto w-[50%] px-4 sm:px-6 sm:py-2 md:py-4 lg:px-8 lg:py-9">
        @include('alerts.alert')
        <p class="text-3xl font-semibold text-center">Turf Owner Registration</p>

        <div class="rounded-lg bg-white mt-10">
            <form action="{{ route('newturfregister.store') }}" class="space-y-4" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                    <div>
                        <label class="font-bold ">Name</label>
                        <input class="w-full rounded-lg border-gray-200 p-3 text-sm focus:border-primary mt-2"
                            placeholder="Enter Your Name" type="text" name="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <label class="font-bold">Email</label>
                        <input class="w-full rounded-lg border-gray-200 p-3 text-sm focus:border-primary mt-2"
                            placeholder="Enter Your Email" type="email" name="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label class="font-bold">Phone</label>
                        <input class="w-full rounded-lg border-gray-200 p-3 text-sm focus:border-primary mt-2"
                            placeholder="Enter Your Phone Number" type="tel" name="phone" />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>
                    <div>
                        <label class="font-bold">Turf Size</label>
                        <input class="w-full rounded-lg border-gray-200 p-3 text-sm focus:border-primary mt-2"
                            placeholder="ex: 5vs5, 7vs7, 11vs11" type="text" name="turf_size" />
                        <x-input-error :messages="$errors->get('turf_size')" class="mt-2" />
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label class="font-bold">Turf Type</label>
                        <input class="w-full rounded-lg border-gray-200 p-3 text-sm focus:border-primary mt-2"
                            placeholder="ex: football, cricket, baseball" type="text" name="turf_type" />
                        <x-input-error :messages="$errors->get('turf_type')" class="mt-2" />
                    </div>
                    <div>
                        <label class="font-bold">City</label>
                        <input class="w-full rounded-lg border-gray-200 p-3 text-sm focus:border-primary mt-2"
                            placeholder="City name" type="text" name="city" />
                        <x-input-error :messages="$errors->get('city')" class="mt-2" />
                    </div>
                </div>


                <div>
                    <label class="font-bold">Address</label>
                    <textarea class="w-full rounded-lg border-gray-200 p-3 text-sm focus:border-primary mt-2" placeholder="Address"
                        rows="8" name="address"></textarea>
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <div class="mt-4 text-end">
                    <x-primary-button type="submit">Submit</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-home-layout>
