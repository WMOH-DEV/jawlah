<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Order;
use App\Models\admin\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index');
    } // End index

    public function viewOrder(Order $order)
    {


        $home = Setting::first();
        $orderNumber = $order->order_number;
       // $number = rand();
        QrCode::size(150)->generate("$orderNumber", public_path("qrcodes/$order->order_number.svg"));
        $data['order']  = $order;
        $data['home']   = $home;

       // return view('admin.orders.pdf', compact('order', 'home'));

        $pdf = PDF::loadView('admin.orders.pdf', $data);

        return $pdf->stream($order->order_number.".pdf");
    } // End view Order

} // End Controller
