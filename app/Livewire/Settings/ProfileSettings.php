<?php

namespace App\Livewire\Settings;

use App\Models\User;
use App\Models\UserDetails;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProfileSettings extends Component
{
    public $current_user;
    public $name, $info_account;
    public $listeners = [
        'refreshAllComponents' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.settings.profile-settings');
    }

    public function mount()
    {
        $fetchingCurrentUserLogin = Auth::user();
        $this->current_user = User::find($fetchingCurrentUserLogin->id);
        $this->initFillData();
    }

    private function initFillData()
    {
        $this->fill([
            'name' => $this->current_user->name,
            'info_account' => $this->current_user->info_account
        ]);
    }

    public function updateName()
    {
        User::where([
            'id' => Auth::user()->id
        ])->update([
            'name' => $this->name
        ]);

        $this->dispatch('refreshAllComponents');
    }

    public function updateInfo()
    {
        User::where([
            'id' => Auth::user()->id
        ])->update([
            'info_account' => $this->info_account
        ]);

        $this->dispatch('refreshAllComponents');
    }
}
