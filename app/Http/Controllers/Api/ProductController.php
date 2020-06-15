<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function updatePrice(Product $product, $price)
    {
        $product->price = (int)$price;
        $product->save();
        return response()->json(['message' => 'Success', 200]);
    }
}
