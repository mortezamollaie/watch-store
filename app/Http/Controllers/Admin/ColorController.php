<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "لیست رنگ ها";
        return  view('admin.color.list', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $color = 'ایجاد رنگ';
        return view('admin.color.create', compact('color'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Color::query()->create([
            "title" => $request->input('title'),
            "code" => $request->input('code'),
        ]);
        return redirect()->route('colors.index')->with('message', 'رنگ جدید با موفقیت ثبت شد');
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
        $title = 'ویرایش رنگ';
        $color = Color::query()->find($id);
        return view('admin.color.edit', compact('color', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Color::query()->find($id)->update([
            "title" => $request->input('title'),
            "code" => $request->input('code'),
        ]);
        return redirect()->route('colors.index')->with('message', 'رنگ جدید با موفقیت ویرایش شد');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
