<?php

namespace App\Models;

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
}
