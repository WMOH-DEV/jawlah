<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{

    protected function system(){
        return Setting::first();
    }

    public function index()
    {
        $setting = $this->system();
        return view('admin.settings.index', compact('setting'));
    } // End index

    public function update(Request $request)
    {
        $data = $request->validate([
            'site_name'     => ['bail', 'required','string', 'max:100'],
            'site_logo'     => ['bail', 'image', 'max:1024'],
            'site_web'      => ['bail', 'nullable', 'string', 'url'],
            'site_email'    => ['bail', 'nullable', 'email'],
            'site_phone'    => ['bail', 'nullable', 'max:20'],
            'vat_rate'      => ['bail', 'required', 'numeric','gt:0'],
            'vat_id'        => ['bail', 'nullable', 'numeric'],
            'facebook'      => ['bail', 'nullable', 'url'],
            'twitter'       => ['bail', 'nullable', 'url'],
            'instagram'     => ['bail', 'nullable', 'url'],
            'whatsapp'      => ['bail', 'nullable', 'max:50'],
        ]);

        $setting = $this->system();

        if ($request->hasFile('site_logo')) {
            if ($setting->site_logo !== 'settings/site_logo.png'){Storage::delete($setting->image);}
            $data['site_logo'] = Storage::put("settings",$request->file('image'));
        }

        $setting->update($data);
        notify()->info('تم التعديل وحفظ البيانات', 'تم بنجاح');

        return back();

    } // End update
}
