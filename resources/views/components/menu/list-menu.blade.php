@if (!is_null($links))
    <a href="{{ $links }}" {{ $attributes }}>
        <li class="p-2 dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer">
            {{ $slot }}
        </li>
    </a>
@else
    <li class="p-2 dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer" {{ $attributes }}>
        <a href="#">
            {{ $slot }}
        </a>
    </li>
@endif
