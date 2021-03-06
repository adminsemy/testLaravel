<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        //Product $perPage = 25
        $products = Product::with('vendor')->orderBy('name', 'asc')->paginate();
        return view('products.index', compact('products'));
    }
}
