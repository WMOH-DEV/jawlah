<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{


        public function createOrder(Request $request){
            $Ticket = Ticket::find($request->ticket_id);
            $Setting = Setting::where('id' , '=' , 1)->get();

            // dd(  $ticket->price);
            $Comments=Comment::where("ticket_id",'=',$Ticket->id)->get();

            $order = Order::create([
                'user_id' => Auth::user()->id,
                'ticket_id' =>$request->ticket_id,
                'qty' =>$request->qty,
                'total' => $request->qty * $Ticket->price_without_vat,
                'order_number' => rand(),
            ]);

            $request->session()->flash("succes" , " تم ارسال طلبكم بنجاح وسيتم ارسال التذكرة اليك");

            return view('ticket.ticket', compact( 'Ticket','Comments' , 'Setting'));

            
        }






        public function showOrders() {
            $shahads = Order::where('user_id','=', Auth::user()->id)->get();
            $tickets = Ticket::where('user_id','=', Auth::user()->id)->get();
            return view('auth.user', compact('shahads' , 'tickets'));
        }







    public function rand(){
        $rand = rand();
        return view('rand',compact('rand'));
    }
}
