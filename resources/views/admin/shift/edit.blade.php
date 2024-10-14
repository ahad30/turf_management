<x-dashboard-layout>
    @section('title')
        Edit Shitf
    @endsection

    <!----- Aleart------>
    @include('alerts.alert')
    <div class="">
        <form action="{{ route('admin.shifts.update', ['shift' => $shift->id]) }}" method="post">
            @csrf
            @method('put')
            <x-card>
                <h4 class="text-lg font-semibold mb-4">
                    Edit Shift
                </h4>
                <div class="grid gird-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Full Name -->
                    <div>
                        <x-input-label for="name" :value="__('Shift Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="$shift->name" autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                </div>
                <div class="my-4">
                    <x-primary-button class="">
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </x-card>
        </form>
    </div>
</x-dashboard-layout>
