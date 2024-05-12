<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;


class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function Handlecallback()
    {
        $user = Socialite::driver('google')->user();
        $find = User::where(['google_id' => $user->getId()])->first();

        if (!is_null($find)) {
            $findUser = UserDetails::where(['id' => $find->id_user_details])->first();
        } else {
            $findUser = null;
        }


        if (!is_null($findUser)) {
            Auth::login($find, true);
            return redirect()->intended('dashboard');
        } else {
            $uuid = Str::uuid();
            $email = $user->getEmail();
            $name = $user->getName();
            $avatar = $user->getAvatar();
            $username = $this->generateRandomUsername($name);
            $token_user = $this->generateTokenUser($name);
            $password = Hash::make($email);
            $google_id = $user->getId();

            $details_user = UserDetails::create([
                'uuid' => $uuid,
                'avatar' => $avatar
            ]);

            $user = User::create([
                'uuid' => $uuid,
                'name' => $name,
                'username' => $username,
                'email'    => $email,
                'password' => $password,
                'user_level' => 1,
                'id_user_details' => $details_user->id,
                'google_id' => $google_id,
                'user_token' => $token_user
            ]);

            Auth::login($user, true);
            return redirect()->intended('dashboard');
        }
    }

    private function generateRandomUsername($name)
    {
        $namaDepan = explode(' ', $name)[0];
        $username_hello = $namaDepan . "@hello-chat";
        return $username_hello;
    }

    function generateTokenUser($fullName)
    {
        $namaDepan = explode(' ', $fullName)[0];
        $randomCode = substr(str_shuffle("hellochat"), 0, 4);
        $token = $namaDepan . "_" . $randomCode;
        return $token;
    }
}
