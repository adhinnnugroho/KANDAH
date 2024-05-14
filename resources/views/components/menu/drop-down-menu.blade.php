@props(['show_id' => $id])

<template x-if="{{ $show_id }}">
    <ul
        {{ $attributes->merge([
            'class' => 'absolute shadow w-44 border rounded-lg text-black overflow-hidden dark:bg-gray-700 bg-white
                                border-gray-300 dark:border-gray-600 dark:text-white text-black p-2 ',
        ]) }}">
        {{ $slot }}
    </ul>
</template>
