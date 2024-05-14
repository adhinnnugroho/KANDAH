<div>
    <h5 class="text-2xl dark:text-white text-black font-semibold ml-4 mt-5 py-4 px-2 cursor-pointer"
        x-on:click="SystemSettingScreen = !SystemSettingScreen">
        <i class="fa fa-arrow-left mr-4"></i>Pengaturan
    </h5>

    <x-input.search-input type="text" placeholder="Cari di setelan" />

    <div class="border border-b-1 dark:border-b-gray-600 dark:border-gray-800 border-white border-b-gray-300"
        x-on:click="ProfileSettingScreen = !ProfileSettingScreen">
        <x-contact.list-contact :image="$current_user->UserDetails->avatar" :name="$current_user->name" />
    </div>

    <x-card.list-setting-card @click="$store.darkMode.toggle()">
        <div x-show="$store.darkMode.dark" x-cloak>
            <div class="lg:ml-4 dark:text-white ">
                <i class="fas fa-sun text-lg lg:mr-2"></i>
                Light Mode
            </div>
        </div>
        <div x-show="!$store.darkMode.dark" x-cloak>
            <div class="lg:ml-4">
                <i class="fas fa-moon text-lg lg:mr-2"></i>
                Dark Mode
            </div>
        </div>
    </x-card.list-setting-card>
</div>
