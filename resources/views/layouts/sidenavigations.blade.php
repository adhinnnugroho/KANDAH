<aside class="fixed lg:w-96 w-screen h-screen">
    <div class="h-full  overflow-y-auto bg-gray-50 dark:bg-gray-800" x-data="{
        SystemSettingScreen: false,
        ProfileSettingScreen: false,
        ListContactScreen: false,
        AddContactScreen: false,
    }">
        <template x-if="!ProfileSettingScreen && !SystemSettingScreen && !ListContactScreen && !AddContactScreen">
            <div class="WelcomeScreen">
                @livewire('navigation.profile-navigation', key(time()))
                <x-input.search-input type="text" placeholder="search chatting" wire:model.live="search_chat" />
                <div class="">
                    <img src="{{ asset('/assets/img/notfound.svg') }}" alt=""
                        class="w-72 lg:mt-32 lg:ml-10 ml-12 mt-20">

                    <p class="text-center text-gray-500 text-xl font-semibold mt-5">Tidak ada yang ngechat nih
                        wkwkw
                    </p>
                </div>
            </div>
        </template>


        <div x-show="SystemSettingScreen && !ProfileSettingScreen " x-cloak x-transition>
            @livewire('settings.system-settings')
        </div>

        <div x-show="ProfileSettingScreen" x-cloak x-transition>
            @livewire('settings.profile-settings')
        </div>

        <div x-show="ListContactScreen & !AddContactScreen" x-cloak x-transition>
            @include('Fragments.Contact.AddContactFragment')
        </div>

        <div x-show="AddContactScreen" x-cloak x-transition>
            @include('Fragments.Contact.SaveContactFragment')
        </div>

        <div class="bg-green-700 text-white rounded-full w-10 h-10 absolute right-5 bottom-5 text-center text-3xl cursor-pointer"
            x-on:click="ListContactScreen = !ListContactScreen" x-show="!ListContactScreen" x-cloak x-transition>
            +
        </div>
    </div>

</aside>
