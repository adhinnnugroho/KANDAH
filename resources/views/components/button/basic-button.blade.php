@props(['background' => 'bg-black'])

<button class="rounded-lg {{ $background }} text-white py-[13px] text-center mt-10 w-full" {{ $attributes }}>
    {{ $slot }}
</button>
