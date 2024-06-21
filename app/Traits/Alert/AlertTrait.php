<?php

namespace App\Traits\Alert;

use Jantinnerezo\LivewireAlert\LivewireAlert;

trait AlertTrait
{
    use LivewireAlert;

    public function alertSuccess($message)
    {
        $this->alert('success', $message);
    }

    public function alertError($message)
    {
        $this->alert('error', $message);
    }

    public function alertInfo($message)
    {
        $this->alert('info', $message);
    }

    public function alertWarning($message)
    {
        $this->alert('warning', $message, [
            'position' => 'center',
        ]);
    }
}
