<?php

namespace App\Console\Commands;

use App\Models\admin\Setting;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use LicenseBoxAPI;

class certification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'activation:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'certification';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $setting = Setting::first();
        $setting->update([
            'active' => 0,
        ]);
        $setting->save();
    }
}
