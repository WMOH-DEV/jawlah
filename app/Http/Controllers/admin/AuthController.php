<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function edit()
    {
        $user = User::findOrfail(Auth::user()->id);

        return view('admin.profile.edit', compact('user'));
    } // End edit

    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name' => ['bail', 'required', 'string', 'max:50'],
            'email' => ['bail', 'required', 'email', Rule::unique('users')->ignore($user->id)],
            'phone' => ['bail', 'nullable', 'max:50' , 'min:6'],
        ]);

        $user->update($data);
        $user->save();

        notify()->success(' تحديث البيانات الأساسية','تم بنجاح');


        return redirect()->back();


    }

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            return back()->with('error','كلمة المرور الحالية غير صحيحة');
        }

        if (strcmp($request->get('old_password'), $request->get('password')) == 0) {
            return back()->with('error','لا يمكن أن تتطابق كلمة المرور الجديدة مع القديمة');
        }

        $request->validate([
            'old_password' => ['bail', 'required'],
            'password' => ['bail', 'required', 'confirmed', 'min:8']
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->get('password'));
        $user->save();

        notify()->success('تغيير كلمة مرور الحساب', 'تم بنجاح');
        return back();
    } // End changePassword
}
