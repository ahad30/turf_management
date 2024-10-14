<button
    class="group relative inline-block text-sm font-medium text-primary focus:outline-none focus:ring active:text-green-400"
    type="{{ $type }}">
    <span
        class="absolute inset-0 translate-x-0.5 translate-y-0.5 bg-primary transition-transform group-hover:translate-x-0 group-hover:translate-y-0"></span>

    <span class=" relative block border border-current bg-white px-8 py-3 {{ $class }}"> {{ $label }}
    </span>
</button>
