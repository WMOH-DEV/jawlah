<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\City;
use App\Models\admin\Ticket;
use App\Models\admin\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\TicketRequest;
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
        $categories = Category::all();
        $cities = City::all();
        return view('admin.tickets.create', compact('cities', 'categories'));
    } // end create

    public function store(TicketRequest $request)
    {
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

        //        $vat = Setting::first()->vat;
        //        $data['price'] = isset($request['vat']) ? $data['price'] * $vat : $data['price'];

        $data['vat'] = isset($request['vat']) ? 1 : 0;

        $data['user_id'] = 1;

        Ticket::create($data);

        notify()->info('إضافة تذكرة جديدة إلى الموقع', 'تم بنجاح');

        return redirect('admincp/tickets');
    } // End Store

    public function edit(Ticket $ticket)
    {
        $categories = Category::all();
        $cities = City::all();
        // dd($ticket);
        return view('admin.tickets.edit', compact('cities', 'categories', 'ticket'));
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

        $data['vat'] = isset($request['vat']) ? 1 : 0;

        $data['user_id'] = 1;

        $ticket->update($data);

        notify()->info('تعديل بيانات التذكرة', 'تم بنجاح');

        return redirect(route('tickets.show', $ticket->id));

        // return redirect('admincp/tickets');
    } // End Update

} // End controller
