<?php


use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\MerchantController;
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

Route::middleware('auth')->group(function (){

   // Route::get('/', [HomeController::class, 'HomeView'])->name('admincp.index');



});

Route::resource('clients', ClientController::class);
Route::resource('merchants', MerchantController::class);
Route::resource('categories', CategoryController::class);
Route::resource('cities', CityController::class);
Route::resource('tickets', TicketController::class);
