<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use App\Models\admin\City;
use App\Models\admin\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        return view('admin.tickets.index');
    }

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
}
