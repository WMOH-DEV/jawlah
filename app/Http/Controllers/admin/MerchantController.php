<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function index()
    {
        return view('admin.merchants.index');
    } // end index

    public function show($id)
    {
        $merchant = Merchant::findOrFail($id);
        return view('admin.merchants.show', ['merchant' => $merchant]);
    } // end show

    public function edit($id)
    {
        $merchant = Merchant::findOrFail($id);
        return view('admin.merchants.edit', ['merchant' => $merchant]);
    } // end Edit

    public function update(Request $request, Merchant $merchant)
    {
        $data = $request->validate([
            'name'  => ['required'],
            'phone' => ['required'],
            'email' => ['required','email',"unique:users,email,$merchant->id"],
        ]);
        $merchant->update($data);
        $merchant->save();
        notify()->success('تعديل بيانات التاجر في الموقع','تم بنجاح');
        return back();
    } // End update


}
