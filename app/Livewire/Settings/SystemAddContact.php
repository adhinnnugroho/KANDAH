<?php

namespace App\Livewire\Settings;

use Livewire\Component;

class SystemAddContact extends Component
{
    public $listContact;

    public function render()
    {
        return view('livewire.settings.system-add-contact');
    }

    public function mount()
    {
        $this->fill([
            'listContact' => [
                'name' => null,
                'code_contact' => null,
            ],
        ]);
    }

    public function validationsFrom()
    {
        $rules = [
            'listContact.name' => 'required',
            'listContact.code_contact' => 'required',
        ];

        $message = [
            'listContact.name.required' => 'Nama wajib diisi',
            'listContact.code_contact.required' => 'Kode kontak wajib diisi',
        ];

        $this->validate($rules, $message);

        return $this->submit();
    }

    public function submit()
    {
    }
}
