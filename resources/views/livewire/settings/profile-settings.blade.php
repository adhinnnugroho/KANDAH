<div>
    <x-navigations.navigation-back title="Profile" icons="fa-arrow-left"
        x-on:click="ProfileSettingScreen = !ProfileSettingScreen" />

    <div class="relative mt-5" x-data="{ openImageProfileSetting: false }">
        <div class="relative w-44 h-44 mx-auto rounded-full overflow-hidden cursor-pointer group"
            x-on:click="openImageProfileSetting = !openImageProfileSetting">
            <x-image.show-image :image="$current_user->UserDetails->avatar" class="group-hover:opacity-50 object-cover w-full h-full" />
            <div class="absolute inset-0 flex items-center justify-center"
                x-bind:class="{
                    'bg-black bg-opacity-50 opacity-100 transition-opacity': openImageProfileSetting,
                    'opacity-0 group-hover:opacity-100 bg-black bg-opacity-50 transition-opacity':
                        !openImageProfileSetting
                }">
                <div class="block text-white content-center text-center">
                    <i class="fa fa-camera text-xl"></i>
                    <p class="text-white text-xl font-bold">Ganti Foto</p>
                </div>
            </div>
        </div>

        <x-menu.drop-down-menu id="show-profile-setting" show_id="openImageProfileSetting" class="right-6 -mt-24"
            wire:key="profile-{{ $current_user->id }}" wire:ignore>
        </x-menu.drop-down-menu>
    </div>

    <div class="ml-5 mt-5 mr-5" x-data="{ isEditingName: false, isEditingInfo: false }">
        <div class="name-profile">
            <h5 class="text-xl font-bold mb-4 dark:text-white text-black">
                Nama Anda
            </h5>
            <div>
                <x-input.border-bottom-input>
                    <span x-show="!isEditingName" class="dark:text-white text-black text-xl">
                        {{ $current_user->name }}
                    </span>
                    <x-input.profile-input x-show="isEditingName"
                        @keydown.enter="isEditingName = false; isEditingInfo = true" value="{{ $current_user->name }}"
                        autofocus wire:model.defer="name" />

                    <x-button.rounded-button x-show="isEditingName" class="float-right mt-3 bg-green-700"
                        wire:click="updateName" x-on:click="isEditingName = !isEditingName">
                        <div wire:loading.remove wire:target="updateName">
                            {{ __('Done') }}
                        </div>
                        <div wire:loading wire:target="updateName">
                            <i class="fa fa-circle-notch fa-spin mr-2"></i>
                        </div>
                    </x-button.rounded-button>
                    <i class="fas fa-edit float-right lg:mr-2 lg:mt-1 cursor-pointer dark:text-white text-black"
                        x-on:click="isEditingName = !isEditingName; isEditingInfo = false" x-show="!isEditingName"></i>
                </x-input.border-bottom-input>
            </div>
        </div>

        <div class="info-profile mt-10">
            <h5 class="text-xl font-bold mb-4 dark:text-white text-black">
                Info Akun
            </h5>

            <x-input.border-bottom-input>
                <span x-show="!isEditingInfo" class="dark:text-white text-black text-xl">
                    {{ $current_user->info_account ?? '...' }}
                </span>
                <x-input.profile-input x-show="isEditingInfo"
                    @keydown.enter="isEditingInfo = false; isEditingName = true" wire:model.defer="info_account"
                    autofocus />

                <x-button.rounded-button x-show="isEditingInfo" class="float-right mt-3 bg-green-700"
                    wire:click="updateInfo" x-on:click="isEditingInfo = !isEditingInfo">
                    <div wire:loading.remove wire:target="updateInfo">
                        {{ __('Done') }}
                    </div>
                    <div wire:loading wire:target="updateInfo">
                        <i class="fa fa-circle-notch fa-spin mr-2"></i>
                    </div>
                </x-button.rounded-button>
                <i class="fas fa-edit float-right lg:mr-2 lg:mt-1 cursor-pointer dark:text-white text-black"
                    x-on:click="isEditingInfo = !isEditingInfo; isEditingName = false" x-show="!isEditingInfo"></i>
            </x-input.border-bottom-input>
        </div>
    </div>
</div>
