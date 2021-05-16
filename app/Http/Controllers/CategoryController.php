<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function allcategory()
    {
        $Category=Category::get();
        return view('ticket.allcategory' , compact('Category'));
    }


    public function indexcat($id)
    {
        $Category=Category::findOrFail($id);
        $Setting = Setting::where('id' , '=' , 1)->get();

        return view('ticket.category' , compact('Category', 'Setting'));
    }


}
