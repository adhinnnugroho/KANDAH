@props(['show_id' => $id])

<template x-if="{{ $show_id }}">
    <ul {{ $attributes->merge(['class' => 'absolute shadow w-44 border rounded-lg text-black overflow-hidden']) }}">
        {{ $slot }}
    </ul>
</template>
