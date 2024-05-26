<?php

namespace App\Livewire\Settings;

use App\Models\Chats\ChatRoom;
use App\Models\User;
use App\Models\UserContact;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;


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
        $userToken = User::where([
            'user_token' => $this->listContact['code_contact'],
        ])->first();

        $chatRoom = ChatRoom::create([
            'owner_id' => Auth::user()->id,
            'with_id' => $userToken->id
        ]);

        UserContact::create([
            'uuid' => Str::uuid(),
            'name' => $this->listContact['name'],
            'contact_id' => $userToken->id,
            'user_id' => Auth::user()->id,
            'chat_room_id' => $chatRoom->id
        ]);
    }
}
