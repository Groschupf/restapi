<?php

namespace App\Http\Controllers\Api\VersionOne;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\VersionOne\ProductResource;
use App\Http\Resources\VersionOne\ProductCollection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ProductCollection(Product::paginate());
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }
}
