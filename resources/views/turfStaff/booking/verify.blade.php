<x-dashboard-layout>
    @section('title')
        Verify Booking
    @endsection

    <!-- Session Status -->
    @include('alerts.alert')

    <form class="md:max-w-[50%] text-center mx-auto" action="{{ route('turf-owner.verificationBooking') }}" method="post">
        @csrf
        <x-card>
            <h4 class="text-lg font-semibold mb-4">
                Verify Booking
            </h4>
            <div class="">
                <!--  Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__(' Enter a Book UID')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="book_uid" :value="old('name')"
                        autofocus />
                    <x-input-error :messages="$errors->get('book_uid')" class="mt-2" />
                </div>
                <!--  Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__(' Enter Transaction Code (Give it as it is!)')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="transaction_code"
                        :value="old('transaction_code')" autofocus />
                    <x-input-error :messages="$errors->get('transaction_code')" class="mt-2" />
                </div>
            </div>
            <div class="my-4 text-end">
                <x-primary-button class="">
                    {{ __('Search') }}
                </x-primary-button>
            </div>
        </x-card>
    </form>

</x-dashboard-layout>
