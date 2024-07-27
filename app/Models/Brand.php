<?php

namespace App\Models;

use App\Http\Resources\BrandResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image'
    ];

    public static function saveImage($file){
        if($file){
            $name = time(). '.' . $file->extension();
            $file->move(public_path('images/admin/brands/picture'), $name);
            return $name;
        }else{
            return '';
        }
    }

    public static function getAllBrands()
    {
        $brands = self::query()->get();
        return BrandResource::collection($brands);
    }
}
