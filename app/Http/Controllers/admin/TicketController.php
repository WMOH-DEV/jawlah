<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\City;
use App\Models\admin\Merchant;
use App\Models\admin\Setting;
use App\Models\admin\Ticket;
use App\Models\admin\Category;
use App\Http\Requests\TicketRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{


    public function index()
    {
        return view('admin.tickets.index');
    } // End index

    public function show(Ticket $ticket)
    {
        return view('admin.tickets.show', compact('ticket'));
    } // End Show

    public function create()
    {
        if (Auth::check() && Auth::user()->role_id == '3') {
            $categories = Category::all();
            $cities = City::all();
            $merchants = Merchant::where('role_id', '2')->get();
            return view('admin.tickets.create', compact('cities', 'categories', 'merchants'));
        }
         abort(403);

    } // end create

    public function store(TicketRequest $request)
    {
        if (Auth::check() && Auth::user()->role_id == '3') {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $data['image'] = Storage::put("tickets", $request->file('image'));
            }

            if ($request->hasFile('image2')) {
                $data['image2'] = Storage::put("tickets", $request->file('image2'));
            }

            if ($request->hasFile('image3')) {
                $data['image3'] = Storage::put("tickets", $request->file('image3'));
            }

            if ($request->hasFile('image4')) {
                $data['image4'] = Storage::put("tickets", $request->file('image4'));
            }

            $vat = Setting::vat();

            $net = $data['price_without_vat'] - $data['discount'];

            $data['price'] = isset($request['vat']) ? ($net * $vat) + $net : $data['price_without_vat'];
            $data['vat'] = isset($request['vat']) ? 1 : 0;
            $data['special'] = isset($request['special']) ? 1 : 0;
            $data['photography'] = isset($request['photography']) ? 1 : 0;
            $data['food'] = isset($request['food']) ? 1 : 0;
            $data['id_card'] = isset($request['id_card']) ? 1 : 0;
            $data['trans'] = isset($request['trans']) ? 1 : 0;
            $data['guide'] = isset($request['guide']) ? 1 : 0;
            $data['safety'] = isset($request['safety']) ? 1 : 0;

//        $data['user_id'] = Auth::user()->id;

            Ticket::create($data);

            notify()->info('إضافة تذكرة جديدة إلى الموقع', 'تم بنجاح');

            return redirect('admincp/tickets');
        }

        abort(403);

    } // End Store

    public function edit(Ticket $ticket)
    {
        $categories = Category::all();
        $cities = City::all();
        $merchants = Merchant::where('role_id', 2)->get();
        return view('admin.tickets.edit', compact('cities', 'categories', 'ticket', 'merchants'));
    } // End edit

    public function update(Ticket $ticket, TicketRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($ticket->image !== 'no-image.jpg') {
                Storage::delete($ticket->image);
            }
            $data['image'] = Storage::put("tickets", $request->file('image'));
        }

        if ($request->hasFile('image2')) {
            if ($ticket->image2 !== 'no-image.jpg') {
                Storage::delete($ticket->image2);
            }
            $data['image2'] = Storage::put("tickets", $request->file('image2'));
        }

        if ($request->hasFile('image3')) {
            if ($ticket->image3 !== 'no-image.jpg') {
                Storage::delete($ticket->image3);
            }
            $data['image3'] = Storage::put("tickets", $request->file('image3'));
        }

        if ($request->hasFile('image4')) {
            if ($ticket->image4 !== 'no-image.jpg') {
                Storage::delete($ticket->image4);
            }
            $data['image4'] = Storage::put("tickets", $request->file('image4'));
        }

        $vat = Setting::vat();

        $net = $data['price_without_vat'] - $data['discount'];

        $data['price'] = isset($request['vat']) ? ($net * $vat) + $net : $data['price_without_vat'];
        $data['vat'] = isset($request['vat']) ? 1 : 0;
        $data['special'] = isset($request['special']) ? 1 : 0;
        $data['photography'] = isset($request['photography']) ? 1 : 0;
        $data['food'] = isset($request['food']) ? 1 : 0;
        $data['id_card'] = isset($request['id_card']) ? 1 : 0;
        $data['trans'] = isset($request['trans']) ? 1 : 0;
        $data['guide'] = isset($request['guide']) ? 1 : 0;
        $data['safety'] = isset($request['safety']) ? 1 : 0;


        $ticket->update($data);

        notify()->info('تعديل بيانات التذكرة', 'تم بنجاح');

        return redirect(route('tickets.show', $ticket->id));

        // return redirect('admincp/tickets');
    } // End Update


} // End controller
