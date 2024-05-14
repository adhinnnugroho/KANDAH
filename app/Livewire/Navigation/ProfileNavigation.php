<?php

namespace App\Livewire\Navigation;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileNavigation extends Component
{

    public $current_user;

    public $listeners = [
        'refreshAllComponents' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.navigation.profile-navigation');
    }

    public function mount()
    {
        $this->current_user = Auth::user();
    }
}
