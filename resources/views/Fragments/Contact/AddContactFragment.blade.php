<x-navigations.navigation-back title="List Kontak" icons="fa-arrow-left"
    x-on:click="ListContactScreen = !ListContactScreen" />


<div x-on:click="AddContactScreen = !AddContactScreen">
    <x-card.list-setting-card>
        <div class="lg:ml-4 dark:text-white ">
            <i class="fas fa-phone text-lg lg:mr-2"></i>
            Tambah Kontak
        </div>
    </x-card.list-setting-card>
</div>
