<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class LoginPage extends Component
{
    use LivewireAlert;
    public $auth;
    public function render()
    {
        return view('livewire.auth.login-page');
    }

    public function mount()
    {
        $this->initFillData();
    }

    private function initFillData()
    {
        $this->fill([
            'auth' => [
                'email' => null,
                'password' => null,
            ],
        ]);
    }

    public function validationsForm()
    {
        $rules_login = [
            'auth.email' => 'required|email',
            'auth.password' => 'required',
        ];

        $message_login = [
            'auth.email.required' => 'Email harus diisi',
            'auth.email.email' => 'Email tidak valid',
            'auth.password.required' => 'Password harus diisi',
        ];

        $this->validate($rules_login, $message_login);

        return $this->submit();
    }

    public function submit()
    {
        $credentials = [
            'email' => $this->auth['email'],
            'password' => $this->auth['password'],
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return
            $this->alert('error', 'email dan password yang kamu masukan salah nih', [
                'position' => 'center',
                'timer' => 3000,
            ]);;
    }
}
