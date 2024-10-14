<x-dashboard-layout>
    @section('title')
        Create City
    @endsection

    <!----- Aleart------>
    @include('alerts.alert')

    <form class="md:max-w-[50%]" action="{{ route('admin.cities.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-card>
            <h4 class="text-lg font-semibold mb-4">
                Create City
            </h4>
            <div class="">
                <!--  Name -->
                <div>
                    <x-input-label for="name" :value="__(' Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
            </div>
            <div class="my-4 text-end">
                <x-primary-button class="">
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
        </x-card>
    </form>

</x-dashboard-layout>
