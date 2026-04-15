<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Requests\Products\PostProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostProductRequest $request)
    {
        $data= $request->validated();
        $product = Product::create($data);
        return ProductResource::make($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        if (!$product){

            return response()->json(['Error'=>'Product not found! pleas try again']);
        }

        return ProductResource::make($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $data = $request->validated();
        $product = Product::find($id);
        if ($product){
            $product->update($data);
        }

        return ProductResource::make($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if($product){
            $product->delete(); 
            return response()->json(['data' => 'Deleted succsefully']);
        }else{
            return response()->json(['data' => 'there is no product with this ID']);
        }
    }
}
