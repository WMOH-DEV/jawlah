<?php

namespace App\Providers;

use App\Models\admin\Order;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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

        Paginator::useBootstrap();

        Blade::if('Mod', function (){
            $user = Auth::user();
            return auth()->user() && $user->role_id == 4;
        });

        Blade::if('superAdmin', function (){
            $user = Auth::user();
            return auth()->user() && $user->role_id == 3;
        });

    }
}
