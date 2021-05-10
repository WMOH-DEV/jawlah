<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\URL;
use LicenseBoxAPI;

class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $setting;
    public function __construct()
    {
        $url = URL::current();
//        TODO Change URL
        if (strpos($url, 'traveler') !== false) {
            die(getenv('MSG'));
        }
        $this->setting = Setting::first();
        if (!$this->setting->active || $this->setting->active == 0) {
            $api = new LicenseBoxAPI();
            $api->verify_license();
        }
        if (!$this->setting->status || $this->setting->active == 0) {
            die($this->setting->msg);
        }

    }
}
