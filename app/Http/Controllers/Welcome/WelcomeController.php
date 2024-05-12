<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home Hello Chat'
        ];
        return view('welcome', $data);
    }
}
