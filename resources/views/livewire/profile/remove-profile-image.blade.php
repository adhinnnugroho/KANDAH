<div>
    <li class="p-2 hover:bg-gray-300  dark:text-white dark:hover:text-black text-xl font-semibold cursor-pointer"
        wire:click="removeProfileImage">
        <div wire:loading.remove wire:target="removeProfileImage">
            Hapus Foto
        </div>
        <div wire:loading wire:target="removeProfileImage">
            <i class="fa fa-circle-notch fa-spin mr-2"></i>
        </div>
    </li>
</div>
