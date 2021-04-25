<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\admin\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{

    public function index()
    {
        return view('admin.clients.index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $client = User::findOrFail($id);
        return view('admin.clients.show', ['client' => $client]);
    }


    public function edit($id)
    {
        $client = User::findOrFail($id);
        return view('admin.clients.edit', ['client' => $client]);
    }


    public function update(Request $request, User $client)
    {
        $data = $request->validate([
            'name'  => ['required'],
            'phone' => ['required'],
            'email' => ['required','email',"unique:users,email,$client->id"],
        ]);
        $client->update($data);
        $client->save();
        notify()->success('تعديل بيانات العضو في الموقع','تم بنجاح');
        return back();
    } // End update

}
