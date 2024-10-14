<x-app-layout>
    @include('partials.navbar-dashboard')

    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
        @include('partials.sidebar')

        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
            <main class="p-4">
                {{ $slot }}
            </main>
            @include('partials.footer-dashboard')
        </div>
    </div>
</x-app-layout>
