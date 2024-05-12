<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    public function index()
    {

        $data = [
            'title' => 'Sign In | Hello Chat'
        ];

        return view('auth.login', $data);
    }
}
