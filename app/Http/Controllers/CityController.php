<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Setting;
use Illuminate\Http\Request;

class CityController extends Controller
{


    public function allcity()
    {
        $City=City::get();
        return view('ticket.allcity' , compact('City'));
    }

    public function indexcity($id)
    {
        $City=City::findOrFail($id);
        $Setting = Setting::where('id' , '=' , 1)->get();

        return view('ticket.city' , compact('City', 'Setting'));
    }
}
