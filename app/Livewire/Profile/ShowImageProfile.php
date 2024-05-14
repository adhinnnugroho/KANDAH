<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class ShowImageProfile extends Component
{
    public $image;
    public $listeners = [
        'refreshAllComponents' => '$refresh',
    ];
    public function render()
    {
        return view('livewire.profile.show-image-profile');
    }
}
