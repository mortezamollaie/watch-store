<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "لیست برندها";
        $brands = Brand::query()->get();
        return view('admin.brand.list', compact('title', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'ایجاد برند';
        return view('admin.brand.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $image = Brand::saveImage($request->file);
        Brand::query()->create([
            "title" => $request->input('title'),
            "image" => $image,
        ]);
        return redirect()->route('brands.index')->with('message', 'برند جدید با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'ویرایش برند';
        $brand = Brand::query()->find($id);
        return view('admin.brand.edit', compact('title', 'brand'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
    {
        $brand = Brand::query()->find($id);
        if($request->has('file')){
            $image = Brand::saveImage($request->file);
        }else{
            $image = $brand->image;
        }

        $brand->update([
            'title'=> $request->input('title'),
            'image' => $image,
        ]);

        return redirect()->route('brands.index')->with('message', 'برند با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
