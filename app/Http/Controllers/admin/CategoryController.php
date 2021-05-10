<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\Controller;
use App\Models\admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $cats = Category::latest('id')->get();
        return view('admin.categories.index', compact('cats'));

    }// end index

    public function store(Request $request)
    {
       // dd($request->all());
        $data = $request->validate([
                'name' => ['required', 'string', 'max:100'],
                'desc' => ['required', 'string', 'max:150']
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = Storage::put("categories",$request->file('image'));
        }

        Category::create($data);

        notify()->info('إضافة فئة جديدة إلى الموقع', 'تم بنجاح');
        return back();

    } // End store

    public function edit(Category $category)
    {
        $cat = $category;
        return view('admin.categories.edit', compact('cat'));
    } // End update

    public function update(Request $request,Category $category)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'desc' => ['required', 'string', 'max:150'],
            'image' => ['nullable', 'image', 'max:1024']

        ]);

        if ($request->hasFile('image')) {
            if ($category->image !== 'no-image.jpg'){Storage::delete($category->image);}
            $data['image'] = Storage::put("categories",$request->file('image'));
        }

        $category->update($data);

        notify()->info('تم تعديل الفئة وحفظ البيانات', 'تم بنجاح');

        return back();

    } // End update

    public function destroy(Category $category)
    {
        if ($category->image !== 'no-image.jpg'){
            Storage::delete($category->image);
        }
        $category->delete();
        notify()->success('تم حذف الفئة من قاعدة البيانات', 'تم بنجاح');

        return back();
    } // End delete

} // End Controller
