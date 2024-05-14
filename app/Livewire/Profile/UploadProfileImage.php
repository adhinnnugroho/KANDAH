<?php

namespace App\Livewire\Profile;

use App\Helpers\Upload;
use App\Models\UserDetails;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UploadProfileImage extends Component
{
    use LivewireAlert, WithFileUploads;
    public $user, $account;
    public $image;
    public $showModalImage = 0;

    public $listeners = [
        'refreshAllComponents' => '$refresh',
        'imageSelectedProfile' => 'uploadfiletoServer',
    ];

    public function render()
    {
        return view('livewire.profile.upload-profile-image');
    }

    public function shouldRender()
    {
        // Periksa state komponen Anda dan tentukan apakah perlu dirender ulang.
        return $this->stateHasChanged();
    }

    public function updatedImage()
    {
        $image = $this->image;
        $file_extension = $image->getClientOriginalExtension();
        if (in_array($file_extension, ['jpg', 'jpeg', 'png'])) {
            $this->showModalImage = 1;
            $this->dispatch('imageSelected', $this->image->getRealPath());
        }
    }

    public function closeModal()
    {
        $this->showModalImage = 0;
    }

    public function uploadfiletoServer($image)
    {
        $user = Auth::user();
        $Upload = Upload::toUpload($image, 'profile_user');
        $filelocation = $Upload['filelocation'];

        UserDetails::where([
            'id' => $user->id_user_details
        ])->update([
            'avatar' => $filelocation
        ]);

        $alert = [
            'status' => 'success',
            'title' => '',
            'message' => 'Success update profile image!',
        ];

        $this->setToast($alert['status'], $alert['title'], $alert['message']);
        $this->reset();
        $this->dispatch('refreshAllComponents');
    }

    public function setToast($status, $title, $message)
    {
        return $this->alert($status, $title, [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => $message,
        ]);
    }
}
