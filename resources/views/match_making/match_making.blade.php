<x-home-layout>
    @section('title')
    Match Making
@endsection
    @include('components.subheader-bg')
    <style>
        .card_bg {
            background-image: radial-gradient(circle farthest-corner at 10% 20%, rgba(14, 174, 87, 1) 0%, rgba(12, 116, 117, 1) 90%);
        }
    </style>
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 sm:py-2 md:py-4 lg:px-8 lg:py-9">
        <p class="text-slate-900 font-bold text-4xl py-6 text-center">Match Making</p>
        @if ($matchMakings->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 ">
                @foreach ($matchMakings as $item)
                    <div class="card_bg text-white p-7 rounded-lg min-h-28">
                        <h1 class="text-3xl font-bold font-md mb-4">{{ $item->turf->turf_name }}</h1>
                        <p class="text-md">Turf owner: {{ $item->turf->turfOwner->phone }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-slate-900 font-semibold text-center text-xl py-40">No booking found !</p>
        @endif
    </div>
</x-home-layout>
