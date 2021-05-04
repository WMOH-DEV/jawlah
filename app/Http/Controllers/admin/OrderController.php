<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Order;
use App\Models\admin\Setting;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index');
    } // End index

    public function viewOrder(Order $order)
    {

        $home = Setting::first();
        //  dd($home);
        $data['order'] = $order;
        $data['home'] = $home;

        $pdf = PDF::loadView('admin.orders.pdf', $data);

        return $pdf->stream($order->order_number.".pdf");
    } // End view Order

} // End Controller
