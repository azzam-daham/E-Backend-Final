<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Http\Resources\LandingPage\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginat(5);

        return ProductResource::collection($products);

    }
}
