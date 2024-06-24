<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "لیست دسته بندی ها";
        return view('admin.category.list', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'ایجاد دسته بندی';
        $categories = Category::query()->pluck('title', 'id');
        return view('admin.category.create', compact('categories', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = Category::saveImage($request->file);
        Category::query()->create([
            "title" => $request->input('title'),
            "parent_id" => $request->input('parent_id'),
            "image" => $image,
        ]);
        return redirect()->route('category.index')->with('message', 'دسته بندی جدید با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
//    public function show(string $id)
//    {
//        dd("show");
//    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::query()->find($id);
        $categories = Category::query()->pluck('title', 'id');
        return view('admin.category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::query()->find($id);
        if($request->has('file')){
            $image = Category::saveImage($request->file);
        }else{
            $image = $category->image;
        }

        $category->update([
            "title" => $request->input('title'),
            "parent_id" => $request->input('parent_id'),
            "image" => $image,
        ]);
        return redirect()->route('category.index')->with('message', 'دسته بندی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd('delete');
    }
}
