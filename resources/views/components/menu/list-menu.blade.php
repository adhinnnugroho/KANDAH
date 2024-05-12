@if (!is_null($links))
    <a href="{{ $links }}" {{ $attributes }}>
        <li class="p-2 cursor-pointer">
            {{ $slot }}
        </li>
    </a>
@else
    <li class="p-2 cursor-pointer" {{ $attributes }}>
        <a href="#">
            {{ $slot }}
        </a>
    </li>
@endif
