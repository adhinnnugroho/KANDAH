<div>
    <div class="mt-5">
        <div class="grid grid-cols-1 gap-5 p-2">
            <div class="">
                <x-input.simple-input label="Nama" type="text" wire:model.defer="contact.name"
                    placeholder="Your name..." />
            </div>
            <div class="">
                <x-input.simple-input label="Kode Hello" type="text" wire:model.defer="contact.name"
                    placeholder="Your name..." />
            </div>
        </div>
        <div class="p-2">
            <x-button.basic-button background="bg-blue-500" wire:click="saveContact">
                <div wire:loading.remove wire:target="saveContact">
                    Simpan
                </div>
                <div wire:loading wire:target="saveContact">
                    <i class="fa fa-circle-notch fa-spin mr-2"></i>
                </div>
            </x-button.basic-button>
        </div>
    </div>
</div>
