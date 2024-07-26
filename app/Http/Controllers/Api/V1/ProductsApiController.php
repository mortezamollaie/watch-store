<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductRepository;
use App\Http\services\Keys;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class ProductsApiController extends Controller
{
    public function most_sold_products()
    {
        return response()->json([
            'result' => true,
            'message' => 'application products page',
            'data' => [
                keys::categories => Category::getAllCategories(),
                Keys::most_seller_products => ProductRepository::getMostSellerProducts()->response()->getData(true),
            ]
        ], 200);
    }

    public function most_viewed_products()
    {
        return response()->json([
            'result' => true,
            'message' => 'application products page',
            'data' => [
                keys::categories => Category::getAllCategories(),
                Keys::most_viewed_products => ProductRepository::getMostViewedProducts()->response()->getData(true),
            ]
        ], 200);
    }

    public function newest_products()
    {
        return response()->json([
            'result' => true,
            'message' => 'application products page',
            'data' => [
                keys::categories => Category::getAllCategories(),
                Keys::newest_products => ProductRepository::getNewestProducts()->response()->getData(true),
            ]
        ], 200);
    }

    public function cheapest_products()
    {
        return response()->json([
            'result' => true,
            'message' => 'application products page',
            'data' => [
                keys::categories => Category::getAllCategories(),
                Keys::cheapest_products => ProductRepository::getCheapestProducts()->response()->getData(true),
            ]
        ], 200);
    }

    public function most_expensive_products()
    {
        return response()->json([
            'result' => true,
            'message' => 'application products page',
            'data' => [
                keys::categories => Category::getAllCategories(),
                Keys::most_expensive_products => ProductRepository::getMostExpensiveProducts()->response()->getData(true),
            ]
        ], 200);
    }
}

