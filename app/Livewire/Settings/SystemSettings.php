<?php

namespace App\Livewire\Settings;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SystemSettings extends Component
{

    public $current_user;

    public function render()
    {
        return view('livewire.settings.system-settings');
    }

    public function mount()
    {
        $this->current_user = Auth::user();
    }
}
