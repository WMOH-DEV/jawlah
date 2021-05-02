<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Order;
use App\Models\admin\Ticket;
use App\Models\admin\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function HomeView()
    {
        $clientsCount = User::where('role_id','1')->count();
        $merchantsCount = User::where('role_id','2')->count();
        $ticketsCount = Ticket::count();
        $ordersCount = Order::count();
        $lastRegisteredClients = User::where('role_id','1')->latest('id')->take(5)->get();
        $lastOrders = Order::latest('id')->take(5)->get();

        return view('admin.index', compact('clientsCount',
            'merchantsCount',
            'lastRegisteredClients',
            'ticketsCount',
            'ordersCount',
            'lastOrders'));
    }
}
