<?php

namespace App\Livewire\Settings;

use Livewire\Component;

class ProfileSettings extends Component
{
    public $current_user;

    public function render()
    {
        return view('livewire.settings.profile-settings');
    }

    public function mount()
    {
        $this->current_user = auth()->user();
    }
}
