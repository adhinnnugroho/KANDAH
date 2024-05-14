<?php

namespace App\Livewire\Profile;

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class RemoveProfileImage extends Component
{
    use LivewireAlert;
    public $profileImageUpdated = false;

    public $listeners = [
        'refreshAllComponents' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.profile.remove-profile-image');
    }

    public function removeProfileImage()
    {

        $account =  Auth::user();


        UserDetails::where([
            'id' => $account->id_user_details
        ])->update([
            'avatar' => "https://ui-avatars.com/api/?background=9AB2E2&color=185ADB&name=" . Auth::user()->name,
        ]);

        $alert = [
            'status' => 'success',
            'title' => '',
            'message' => 'Profile berhasil di hapus',
        ];

        $this->setToast($alert['status'], $alert['title'], $alert['message']);
        $this->dispatch('refreshAllComponents');
    }

    public function setToast($status, $title, $message)
    {
        return $this->alert($status, $title, [
            'position' => 'center',
            'timer' => 3000,
            'text' => $message,
        ]);
    }
}
