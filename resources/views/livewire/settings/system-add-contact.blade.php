<div>
    <div class="mt-5">
        <div class="grid grid-cols-1 gap-5 p-2">
            <div class="">
                <x-input.simple-input label="Nama" type="text" wire:model.defer="listContact.name"
                    placeholder="Your name..." error="listContact.name" />
            </div>
            <div class="">
                <x-input.simple-input label="Kode Hello" type="text" wire:model.defer="listContact.code_contact"
                    placeholder="Your name..." error="listContact.code_contact" />
            </div>
        </div>
        <div class="p-2">
            <x-button.basic-button background="bg-blue-500" wire:click="validationsFrom">
                <div wire:loading.remove wire:target="validationsFrom">
                    Simpan
                </div>
                <div wire:loading wire:target="validationsFrom">
                    <i class="fa fa-circle-notch fa-spin mr-2"></i>
                </div>
            </x-button.basic-button>
        </div>
    </div>
</div>
