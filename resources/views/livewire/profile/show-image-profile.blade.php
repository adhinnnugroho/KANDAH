<div x-data="{ ShowProfileImageModalsOpen: false }" wire:ignore>
    <li class="p-2 hover:bg-gray-300 cursor-pointer dark:text-white dark:hover:text-black text-xl font-semibold"
        x-on:click="ShowProfileImageModalsOpen = !ShowProfileImageModalsOpen">
        <a href="#">Lihat Foto</a>
    </li>
    <x-modal.simple-modal id="show-profile-picture" show_id="ShowProfileImageModalsOpen" title="Foto Profil" subtitle="">
        <div class="max-h-[42rem] min-w-[20rem] overflow-x-hidden">
            <x-slot name="icon">
                <button x-on:click="ShowProfileImageModalsOpen = false"
                    class="text-red-600 focus:outline-none hover:text-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </x-slot>
            <x-image.show-image :image="$image"
                class="group-hover:opacity-50 object-cover w-96 h-96  content-center mx-auto" />
        </div>
    </x-modal.simple-modal>
</div>
