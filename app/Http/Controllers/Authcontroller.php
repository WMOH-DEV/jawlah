<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Authcontroller extends Controller
{
    public function useronly()
    {
        return view('auth.user');
    }
}
