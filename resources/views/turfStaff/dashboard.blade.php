<x-dashboard-layout>

    @section('title')
        Staff Dashboard
    @endsection

    @include('alerts.alert')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="mb-5  text-center border border-primary">
                    <!-- Session Status -->
                    @include('alerts.alert')

                    <form class="md:max-w-[50%] text-center mx-auto" action="{{ route('staff.verificationBooking') }}"
                        method="post">
                        @csrf
                        <x-card>
                            <h4 class="text-lg font-semibold mb-4">
                                Verify Booking
                            </h4>
                            <div class="">
                                <!--  Name -->
                                <div class="mb-4">
                                    <x-input-label for="name" :value="__(' Enter a Book UID')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text"
                                        name="book_uid" :value="old('name')" autofocus />
                                    <x-input-error :messages="$errors->get('book_uid')" class="mt-2" />
                                </div>
                                <!--  Name -->
                                <div class="mb-4">
                                    <x-input-label for="name" :value="__(' Enter Transaction Code (Give it as it is!)')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text"
                                        name="transaction_code" :value="old('transaction_code')" autofocus />
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
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 ">
                    <div class="bg-white shadow-md shadow-slate-50 p-7 rounded-lg min-h-28 text">
                        <h1 class="text-3xl  font-md mb-4">Total Turf </h1>
                        <p class="text-lg">{{ $totalTurfs }}</p>
                    </div>
                    <div class="bg-white shadow-md shadow-slate-50 p-7 rounded-lg min-h-28 text">
                        <h1 class="text-3xl  font-md mb-4">Total Pending Booking &nbsp;</h1>
                        <p class="text-lg">{{ $totalPB }}</p>
                    </div>
                    <div class="bg-white shadow-md shadow-slate-50 p-7 rounded-lg min-h-28 text">
                        <h1 class="text-3xl  font-md mb-4">Total Complete Booking &nbsp;</h1>
                        <p class="text-lg">{{ $totalCB }}</p>
                    </div>
                </div>


            </div>
        </div>
    </div>


</x-dashboard-layout>
