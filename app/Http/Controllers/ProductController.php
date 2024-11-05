<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with('category')->paginate(perPage: 9);

        return ProductResource::collection($product);
    }
}
