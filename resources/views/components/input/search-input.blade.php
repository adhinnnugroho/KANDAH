<div class="py-4 px-2">
    @if (!is_null($label))
        <label class="text-base block mb-2 ml-2">{{ $label }}</label>
    @endif
    <input class="py-2 px-2 border-2 border-gray-200 rounded-lg w-full" {{ $attributes }} />
</div>
