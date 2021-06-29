<?php


use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MerchantController;
use App\Http\Controllers\admin\ModController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
	return view('admin.index');
});

//Route::view('dashboard', 'dashboard')
//	->name('dashboard')
//	->middleware(['auth', 'verified']);

//Route::prefix('user')->middleware(['auth', 'verified'])->group(function () {
//	Route::view('profile', 'profile.show');
//});

Route::middleware(['auth','isAdmin'])->group(function () {
    Route::get('settings',[SettingController::class,'index'])->name('settings.index');
    Route::put('settings',[SettingController::class,'update'])->name('settings.update');
    Route::resource('pages', PageController::class);
    Route::resource('mods', ModController::class);
    Route::resource('comments', CommentController::class)->except('create','store');
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');

    Route::get('statisticsAjax', [ReportController::class, 'statisticsAjax'])->name('orders.ajax');
    Route::get('usersAjax', [ReportController::class, 'usersAjax'])->name('users.ajax');
    Route::get('SaleAjax', [ReportController::class, 'saleAjax'])->name('sales.ajax');
});

Route::middleware(['auth','isMod'])->group(function (){

    Route::get('/', [DashboardController::class, 'HomeView'])->name('admincp.index');
    Route::resource('clients', ClientController::class);
    Route::resource('merchants', MerchantController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('cities', CityController::class);
    Route::resource('tickets', TicketController::class);
    Route::get('orders/{order}/print', [OrderController::class, 'viewOrder'])->name('orders.print');
    Route::resource('orders', OrderController::class)->except('create', 'store');

    Route::get('profile',[AuthController::class, 'edit'])->name('adminProfile.edit');
    Route::put('profile/info',[AuthController::class, 'update'])->name('adminProfile.info');
    Route::put('profile/password',[AuthController::class, 'changePassword'])->name('adminProfile.password');

});


