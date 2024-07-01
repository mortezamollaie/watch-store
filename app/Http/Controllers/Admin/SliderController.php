<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "لیست اسلایدرها";
        $sliders = Slider::query()->get();
        return view('admin.slider.list', compact('title', 'sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'ایجاد اسلایدر';
        return view('admin.slider.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        $image = Slider::saveImage($request->file);
        Slider::query()->create([
            "title" => $request->input('title'),
            "url" => $request->input('url'),
            "image" => $image,
        ]);
        return redirect()->route('sliders.index')->with('message', 'اسلایدر جدید با موفقیت ثبت شد');
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
        $title = 'ویرایش اسلایدر';
        $slider = Slider::query()->find($id);
        return view('admin.slider.edit', compact('title', 'slider'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, string $id)
    {
        $slider = Slider::query()->find($id);
        if($request->has('file')){
            $image = Slider::saveImage($request->file);
        }else{
            $image = $slider->image;
        }

        $slider->update([
            'title'=> $request->input('title'),
            'url'=> $request->input('url'),
            'image' => $image,
        ]);

        return redirect()->route('sliders.index')->with('message', 'اسلایدر با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
