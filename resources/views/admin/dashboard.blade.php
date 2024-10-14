<x-dashboard-layout>
    @section('title')
        Admin Dashboard
    @endsection

    <!----- Aleart------>
    @include('alerts.alert')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 text-slate-800 ">
                    <div
                        class="bg-primary hover:bg-green-600 shadow-md shadow-slate-50 p-7 rounded-lg min-h-28 text-white">
                        <h1 class="text-3xl font-md mb-4 px-3">Total Turfs</h1>
                        <p class="text-lg px-3">&nbsp;{{ $totalTurf }}</p>
                    </div>
                    <div
                        class="bg-primary hover:bg-green-600 shadow-md shadow-slate-50 p-7 rounded-lg min-h-28 text-white">
                        <h1 class="text-3xl font-md mb-4 px-3">Total Turf-owner</h1>
                        <p class="text-lg px-3"> &nbsp; {{ $turfOwner }}</p>
                    </div>
                    <div
                        class="bg-primary hover:bg-green-600 shadow-md shadow-slate-50 p-7 rounded-lg min-h-28 text-white ">
                        <h1 class="text-3xl px-3 font-md mb-4">Total Payment</h1>
                        <p class="text-lg px-3">&nbsp; {{ $totalPayment }}</p>
                    </div>
                    <div
                        class="bg-primary hover:bg-green-600 shadow-md shadow-slate-50 p-7 rounded-lg min-h-28 text-white ">
                        <h1 class="text-3xl px-3 font-md mb-4">New Turfs</h1>
                        <p class="text-lg px-3">&nbsp; {{ $newTurf }}</p>
                    </div>
                    <div
                        class="bg-primary hover:bg-green-600 shadow-md shadow-slate-50 p-7 rounded-lg min-h-28 text-white ">
                        <h1 class="text-3xl px-3 font-md mb-4">Active Turfs</h1>
                        <p class="text-lg px-3"> &nbsp; {{ $activeTurf }}</p>
                    </div>
                    <div
                        class="bg-primary hover:bg-green-600 shadow-md shadow-slate-50 p-7 rounded-lg min-h-28 text-white ">
                        <h1 class="text-3xl px-3 font-md mb-4">Inactive Turfs</h1>
                        <p class="text-lg px-3">&nbsp; {{ $inactiveTurf }}</p>
                    </div>


                </div>
            </div>
        </div>
    </div>


</x-dashboard-layout>
