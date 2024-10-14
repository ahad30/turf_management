<!-- Session Status -->
@if (session('warning'))
    <x-warning-alert>
        {{ session('warning') }}
    </x-warning-alert>
@endif
@if (session('success'))
    <x-success-alert>
        {{ session('success') }}
    </x-success-alert>
@endif
