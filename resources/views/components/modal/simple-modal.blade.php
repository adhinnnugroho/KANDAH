@props(['show_id' => $id])
<div x-show="{{ $show_id }}" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true" x-cloak>
    <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
        <div x-cloak x-on:click="{{ $show_id }} = false" x-show="{{ $show_id }}"
            x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

        <div x-cloak x-show="{{ $show_id }}" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform
            rounded-lg shadow-xl 2xl:max-w-2xl"
            x-bind:class="{
                'bg-black text-white border-b-gray-500': $store.darkMode.on,
                'bg-white text-black border-b-gray-400': !$store.darkMode.on
            }">
            <div class="flex items-center justify-between space-x-4">
                <h1 class="text-xl font-medium text-gray-800 " x-bind:class="{ ' text-white ': $store.darkMode.on }">
                    {{ $title }}
                </h1>

                {{ $icon }}
            </div>

            <p class="mt-2 text-sm text-gray-500 ">
                {{ $subtitle }}
            </p>

            <div class="mt-4 text-justify text-sm font-normal min-w-full"
                x-bind:class="{ 'bg-black text-white border-b-gray-500 ': $store.darkMode.on }">
                {{ $slot }}
            </div>

            <div class=" bg-opacity-50 px-4 py-3 flex flex-row-reverse flex-wrap gap-2"
                x-bind:class="{ 'bg-black text-white border-b-gray-500 ': $store.darkMode.on }">
                @isset($footer)
                    {{ $footer }}
                @endisset
                </d>
            </div>
        </div>
    </div>
