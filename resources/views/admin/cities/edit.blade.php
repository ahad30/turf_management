<x-dashboard-layout>
    @section('title')
        Edit City
    @endsection

    <!----- Aleart------>
    @include('alerts.alert')
    <div class="w-full">
        <form class="md:max-w-[50%] mx-auto" action="{{ route('admin.cities.update', ['city' => $city->id]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-card>
                <h4 class="text-lg font-semibold mb-4 text-center">
                    Edit City
                </h4>
                <div class="">
                    <!--  Name -->
                    <div>
                        <x-input-label for="name" :value="__(' Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="$city->name" autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                </div>
                <div class="my-4 text-end">
                    <x-primary-button class="">
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </x-card>
        </form>
    </div>
</x-dashboard-layout>
