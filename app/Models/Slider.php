<?php

namespace App\Models;

use App\Http\Resources\SliderResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'image',
    ];

    public static function saveImage($file){
        if($file){
            $name = time(). '.' . $file->extension();
            $file->move(public_path('images/admin/sliders/picture'), $name);
            return $name;
        }else{
            return '';
        }
    }

    public static function getSliders(){
        $sliders = self::query()->get();
        return SliderResource::collection($sliders);
    }
}
