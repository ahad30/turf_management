<x-dashboard-layout>
    @section('title')
        Settings
    @endsection

    <!----- Aleart------>
    @include('alerts.alert')

    <form action="{{ route('admin.settings.update', ['setting' => $settings->id]) }}" method="post">
        @csrf
        @method('PUT')
        <x-card>
            <h4 class="text-lg font-semibold mb-4">
                Settings
            </h4>
            <div class="grid gird-cols-1 lg:grid-cols-2 gap-6 pb-4">
                <!-- Turf Registration and Activation Fee -->
                <div>
                    <x-input-label for="turf_activation_fee" :value="__('Turf Registration and Activation Fee')" />
                    <x-text-input id="turf_activation_fee" class="block mt-1 w-full" type="number"
                        name="turf_activation_fee" :value="$settings->turf_activation_fee" autofocus />
                    <x-input-error :messages="$errors->get('turf_activation_fee')" class="mt-2" />
                </div>

                <!-- Turf Registration Link -->
                <div>
                    <x-input-label for="turf_activation_fee" :value="__('Facebook link')" />
                    <x-text-input id="facebook_link" class="block mt-1 w-full" type="text" name="facebook_link"
                        :value="$settings->facebook_link" autofocus />
                    <x-input-error :messages="$errors->get('facebook_link')" class="mt-2" />
                </div>
            </div>
            <div class="my-4 text-right">
                <x-primary-button class="">
                    {{ __('Save Changes') }}
                </x-primary-button>
            </div>
        </x-card>
    </form>

</x-dashboard-layout>
