<?php

namespace App\View\Components;

use App\Models\admin\Setting;
use Illuminate\View\Component;

class sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $name = Setting::first()->site_name;
        $logo = Setting::first()->site_logo;
        return view('components.sidebar',compact('name', 'logo'));
    }
}
