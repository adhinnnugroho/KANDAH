@props(['background' => 'bg-black'])

<button class="rounded-2xl {{ $background }} text-white py-[13px] text-center mt-10" {{ $attributes }}>
    {{ $slot }}
</button>
