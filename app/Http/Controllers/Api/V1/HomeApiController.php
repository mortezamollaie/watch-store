<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\services\Keys;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeApiController extends Controller
{
    public function home()
    {
        return response()->json([
           'result' => true,
           'message' => 'application home page',
           'data' => [
               Keys::sliders => Slider::getSliders(),
               keys::categories => Category::getAllCategories(),
               Keys::amazing_products => '',
               Keys::baner => Slider::query()->inRandomOrder()->first(),
               Keys::most_seller_products => '',
               Keys::newest_products => '',
           ]
        ], 200);
    }
}
