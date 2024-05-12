@if (stripos($image, 'images/') !== false)
    <img src="{{ asset('/storage/' . $image) }}" {{ $attributes }}>
@else
    <img src="{{ $image }}" {{ $attributes }}>
@endif
