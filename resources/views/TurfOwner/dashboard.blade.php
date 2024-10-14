<x-dashboard-layout>
    @section('title')
        Owner Dashboard
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 ">
                    <div
                        class="bg-primary hover:bg-green-500 text-white shadow-md shadow-slate-50 p-7 rounded-lg min-h-28">
                        <h1 class="text-xl font-bold mb-4 px-4">Total Branches &nbsp;</h1>
                        <p class="text-lg px-4">{{ $totalBranch }}</p>
                    </div>
                    <div
                        class="bg-primary hover:bg-green-500 text-white shadow-md shadow-slate-50 p-7 rounded-lg min-h-28">
                        <h1 class="text-xl font-bold mb-4 px-4">Total Turfs &nbsp;</h1>
                        <p class="text-lg px-4">{{ $totalTurf }}</p>
                    </div>
                    <div
                        class="bg-primary hover:bg-green-500 text-white shadow-md shadow-slate-50 p-7 rounded-lg min-h-28">
                        <h1 class="text-xl font-bold mb-4 px-4">Total pending booking &nbsp;</h1>
                        <p class="text-lg px-4">{{ $totalPendingBooking }}</p>
                    </div>
                    <div
                        class="bg-primary hover:bg-green-500 text-white shadow-md shadow-slate-50 p-7 rounded-lg min-h-28">
                        <h1 class="text-xl font-bold mb-4 px-4">Total Booking &nbsp;</h1>
                        <p class="text-lg px-4">{{ $totalBooking }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
