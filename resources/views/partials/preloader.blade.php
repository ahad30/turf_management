<div class="fixed top-0 left-0 w-full min-h-screen bg-[#62B849] z-[999] grid place-content-center" style="z-index: 999"
    id="preloader">
    <img src="https://i.pinimg.com/originals/72/19/90/721990480d1f30f45c862cecad967e2d.gif" class="w-full h-full"
        alt="">
</div>
@push('preloaderjs')
    <script>
        $(document).ready(function() {
            $("#preloader").fadeOut(1000)
        });
    </script>
@endpush
