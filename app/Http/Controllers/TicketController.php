<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Comment;
use App\Models\Setting;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    public function index()
    {

        $Cityone = City::where("id", "=", 1)->get();
        $Cittwo = City::where("id", "=", 2)->get();
        $Citythree = City::where("id", "=", 3)->get();
        $Cityfour = City::where("id", "=", 4)->get();
        $Setting = Setting::where('id' , '=' , 1)->get();

        $Category = Category::get();
        $City = City::get();

        return view('ticket.index', compact('Cityone', 'Cittwo', 'Citythree', 'Cityfour', 'Category', 'City', 'Setting'));
    }






    public function show($id , Request $request)
    {
        $Ticket = Ticket::findOrFail($id);
        $Comments=Comment::where("ticket_id",'=',$Ticket->id)->get();
        $Setting = Setting::where('id' , '=' , 1)->get();
        // $request->session()->flash("succes" , " تم ارسال طلبكم بنجاح وسيتم ارسال التذكرة اليك");

        return view('ticket.ticket', compact('Ticket','Comments', 'Setting'));
    }

    public function search(Request $request)
    {
        $q = $request->q;

        $filter = Ticket::where('name', 'like', '%' . $q . '%')->paginate(6);
        $Setting = Setting::where('id' , '=' , 1)->get();

        //dd($filter);

        return view('ticket.search', compact('filter', 'Setting'));
    }
    public function storeTicket()
    {

        $Ticket = Ticket::get();
        $City = City::get();
        $Category = Category::get();
        return view('auth.create', compact('Ticket', 'City', 'Category'));
    }

    public function createTicket(Request $request)
    {

        $image = Storage::putFile("ticket", $request->file('image'));
        $image2 = Storage::putFile("ticket", $request->file('image2'));
        $image3 = Storage::putFile("ticket", $request->file('image3'));
        $image4 = Storage::putFile("ticket", $request->file('image4'));
     //   $Setting = Setting::where("id" , "=" , 1)->get();
        //dd($path);

        Ticket::create([
            'name' => $request->name,
            'information' => $request->information,
            'date_party' => $request->date_party,
            'hour_party' => $request->hour_party,
            'price_without_vat' => $request->price_without_vat,
            'desc' => $request->desc,
            'qty' => $request->qty,
            'image' => $image,
            'image2' => $image2,
            'image3' => $image3,
            'image4' => $image4,
            'user_id' => $request->user_id,
            'age' => $request->age,
            'city_id' => $request->city_id,

            'category_id' => $request->category_id,

            // 'vat'=>$request->vat,

        ]);

        return redirect('/');
    }



    public function edit($id) {
        $ticket = Ticket::findOrFail($id);
        $City = City::get();
        $Category = Category::get();
        return view('auth.edit', compact('ticket' , 'City' , 'Category'));
      }


      public function update(Request $request , $id){
        $ticket = Ticket::findOrFail($id);

        $image = $ticket->image;
        $image2 = $ticket->image2;
        $image3 = $ticket->image3;
        $image4 = $ticket->image4;


        if ($request->hasFile('image')) {
            Storage::delete($image);
            $image = Storage::putFile('ticket', $request->file('image'));
        } elseif ($request->hasFile('image2')) {
            Storage::delete($image2);
            $image2 = Storage::putFile('ticket', $request->file('image2'));
        } elseif ($request->hasFile('image3')) {
            Storage::delete($image3);
            $image3 = Storage::putFile('ticket', $request->file('image3'));
        } elseif ($request->hasFile('image4')) {
            Storage::delete($image4);
            $image4 = Storage::putFile('ticket', $request->file('image4'));
        }


        $ticket->update([
          'name'=>$request->name,
              'city_id'=>$request->city_id,
              'category_id'=>$request->category_id,
              // 'user_id'=>$request->user_id,
              'age'=>$request->age,
              'information'=>$request->information,
              'date_party'=>$request->date_party,
              'price_without_vat'=>$request->price_without_vat ,
             // 'vat'=>$request->vat,
              'desc'=>$request->desc,
              'qty'=>$request->qty,

              'image' => $image,
              'image2' => $image2,
              'image3' => $image3,
              'image4' => $image4,
        ]);
        return redirect('/');
       }




       public function comment(Request $request)
       {

        Comment::create([
            'user_id'=>Auth::user()->id,
            'ticket_id'=>$request->ticket_id,
            'comment' => $request->comment,
        ]);

        return redirect('/');
    }


    public function allticket()
    {
        $Ticket=Ticket::get();
        $Setting = Setting::where('id' , '=' , 1)->get();

        return view('ticket.allticket' , compact('Ticket' , 'Setting'));
    }

}
