<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TicketController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('ticket.index');
});



Route::get('/' , [TicketController::class , 'index']);
Route::post('search', [TicketController::class, 'search']); ///search
Route::get('order',[OrderController::class,'rand']);

// Route::middleware('auth')->group(function(){

//كل مدينة مع منتجة
Route::get('City/{id}', [CityController::class , 'indexcity']);
//كل تصنيم مع منتجة
Route::get('Category/{id}', [CategoryController::class , 'indexcat']);

// onlyproduct
Route::get('Ticket/show/{id}',[TicketController::class,'show'])->Middleware('auth');

// to create anew Order
Route::post('requestTicket',[OrderController::class,'createOrder']);


Route::get('user' , [Authcontroller::class , 'useronly']);

// to show orders of one user who do login
Route::get('user', [OrderController::class, 'showOrders'])->name('user');



// to create anew ticket
Route::get('storeticket', [TicketController::class, 'storeTicket'])->name('user');
Route::post('createticket', [TicketController::class, 'createTicket']);


// to edit anew ticket
Route::get('edit/{id}', [TicketController::class, 'edit']);
Route::post('update/{id}', [TicketController::class, 'update']);

// to create anew comment
Route::post('comment', [TicketController::class, 'comment']);


//all city
Route::get("allcity" , [CityController::class , 'allcity']);

//all city
Route::get("allcategory" , [CategoryController::class , 'allcategory']);


//all city
Route::get("allticket" , [TicketController::class , 'allticket']);

// });
