<div class="max-h-[80%] overflow-y-scroll scrollbar-none p-1">
    @if ($turf->timing->count() > 0)
        <p class="text-primary font-bold mt-2 mb-3">{{ $turf->turf_name }} > Day (6AM - 5PM)</p>
        <x-package packageId="0" title="1 Hour (60 minutes) day" duration="1 Hour" amount="{{ $turf->timing[0]->amount }}"
            image="1 H" />
        <x-package packageId="1" title="1 Hour 30 Minutes (90 minutes) day" duration="1.5 Hour"
            amount="{{ $turf->timing[1]->amount }}" image="1.5 H" />
        <x-package packageId="2" title="2 Hour (120 minutes) day" duration="2 Hour"
            amount="{{ $turf->timing[2]->amount }}" image="2 H" />

        <p class="text-primary font-bold mt-2 mb-3">{{ $turf->turf_name }} > Night (5PM - 6AM)</p>

        <x-package packageId="3" title="1 Hour (60 minutes) night" duration="1 Hour"
            amount="{{ $turf->timing[4]->amount }}" image="1 H" />
        <x-package packageId="4" title="1 Hour 30 Minutes (90 minutes) night" duration="1.5 Hour"
            amount="{{ $turf->timing[5]->amount }}" image="1.5 H" />
        <x-package packageId="5" title="2 Hour (120 minutes) night" duration="2 Hour"
            amount="{{ $turf->timing[5]->amount }}" image="2 H" />
    @else
        <x-card>
            {{ 'No Item yet!' }}
        </x-card>
    @endif
</div>
