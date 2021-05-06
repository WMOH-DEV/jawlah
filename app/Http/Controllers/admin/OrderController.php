<?php

namespace App\Http\Controllers\admin;

use Alkoumi\LaravelArabicTafqeet\Tafqeet;
use Alkoumi\LaravelHijriDate\Hijri;
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
        $order_date = $order->created_at;
        $hijri = Hijri::Date('l ، j F ، Y',$order_date);
        $data['hijri'] = $hijri;
        $pt_date = $order->ticket->date_party;
        $party_hijri = Hijri::Date('l ، j F ، Y', $pt_date);
        $data['party_hijri'] = Hijri::Date('l ، j F ، Y', $pt_date);
        $data['order']  = $order;
        $data['home']   = $home;
        $totalInArabic = Tafqeet::inArabic($order->total);
        $data['totalInArabic'] = $totalInArabic;

        // return view('admin.orders.test', compact('order', 'home','hijri','totalInArabic','party_hijri'));

        $pdf = PDF::loadView('admin.orders.test', $data);

        return $pdf->stream($order->order_number.".pdf");
    } // End view Order

} // End Controller
