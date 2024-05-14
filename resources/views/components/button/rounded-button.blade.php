@props(['color' => 'gray'])

<button
    {{ $attributes->merge([
        'type' => 'button',
        'class' =>
            'items-center justify-between px-4 py-2 text-sm font-medium
        leading-5 text-white transition-colors duration-150 border border-transparent rounded-lg bg-' .
            $color .
            '-500
        enabled:transition enabled:transform enabled:hover:translate-x-1 enabled:hover:' .
            $color .
            '-700 focus:outline-none
        disabled:transform-none disabled:cursor-not-allowed disabled:transform-none disabled:transition-none disabled:opacity-75 transition duration-200 ease-in-out',
    ]) }}>
    {{ $slot }}
</button>
