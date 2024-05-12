<div
    {{ $attributes->merge([
        'class' => 'border dark:border-white border-black rounded-lg p-3 flex justify-center dark:text-white text-black',
    ]) }}>

    {{ $slot }}
</div>
