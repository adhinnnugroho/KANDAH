@props(['show_id' => $id])


<ul x-show="{{ $show_id }}"
    {{ $attributes->merge(['class' => 'absolute shadow w-44 border rounded-lg text-black overflow-hidden']) }}
    x-bind:class="{
        'bg-black text-white border-gray-600 border-b-gray-600': $store.darkMode.on,
        'bg-white text-black border-b-gray-400':
            !$store.darkMode.on
    }">

    {{ $slot }}

</ul>
