@if (!is_null($label))
    <label class="text-base block mb-2">
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
        'class' => 'rounded-2xl bg-form-bg py-[13px] px-7 w-full focus:outline-alerange focus:outline-none ' . $border,
    ]) }}
    type="{{ $type }}" />


@error($error)
    <span class="error text-red-500 mt-5 text-xl">{{ $message }}</span>
@enderror
