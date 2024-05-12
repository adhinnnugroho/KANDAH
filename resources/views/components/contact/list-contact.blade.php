<div class="flex flex-row py-4 px-2 justify-center items-center  cursor-pointer" {{ $attributes }}>
    <div class="w-1/5 ml-4">
        <x-image.show-image :image="$image" class="rounded-full h-11 w-11 ml-3 cursor-pointer" />
    </div>
    <div class="w-full dark:text-white lg:ml-4 text-black">
        <div class="text-lg font-semibold">{{ $name }}</div>
        <span class="text-gray-500">{{ $info }}</span>
    </div>
</div>
