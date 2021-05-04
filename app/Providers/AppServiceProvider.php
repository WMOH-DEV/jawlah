<?php

namespace App\Providers;

use App\Models\admin\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Order::created(function ($order) {
            $order->update(['order_number' => Carbon::now()->format('Ymdhis') . $order->id]);
        });
    }
}
