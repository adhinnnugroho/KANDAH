@if (!is_null($label))
    <label class="text-base block mb-2 dark:text-white text-black font-semibold">
        {{ $label }}
    </label>
@endif

@php
    $border = 'border-gray-500';
@endphp
@error($error)
    @php
        $border = 'border-4 border-red-600';
    @endphp
@enderror

<input
    {{ $attributes->merge([
        'class' =>
            'rounded-lg bg-form-bg py-[10px] px-7 w-full focus:outline-alerange focus:outline-none dark:bg-gray-800 dark:text-white ' .
            $border,
    ]) }}
    type="{{ $type }}" />


@error($error)
    <span class="error text-red-500 mt-5 text-xl">{{ $message }}</span>
@enderror
