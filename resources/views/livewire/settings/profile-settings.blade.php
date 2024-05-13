<div>
    <x-navigations.navigation-back title="Profile" icons="fa-arrow-left"
        x-on:click="ProfileSettingScreen = !ProfileSettingScreen" />

    <div class="relative mt-5" x-data="{ isOpen: false }">
        <div class="relative w-44 h-44 mx-auto rounded-full overflow-hidden cursor-pointer group"
            x-on:click="isOpen = !isOpen">
            <x-image.show-image :image="$current_user->UserDetails->avatar" class="group-hover:opacity-50 object-cover w-full h-full" />
            <div class="absolute inset-0 flex items-center justify-center"
                x-bind:class="{
                    'bg-black bg-opacity-50 opacity-100 transition-opacity': isOpen,
                    'opacity-0 group-hover:opacity-100 bg-black bg-opacity-50 transition-opacity':
                        !isOpen
                }">
                <div class="block text-white content-center text-center">
                    <i class="fa fa-camera text-xl"></i>
                    <p class="text-white text-xl font-bold">Ganti Foto</p>
                </div>
            </div>
        </div>

        <x-menu.drop-down-menu id="show-profile-setting" show_id="isOpen" class="right-6 -mt-24"
            wire:key="profile-{{ $current_user->id }}" wire:ignore>
        </x-menu.drop-down-menu>
    </div>
</div>
