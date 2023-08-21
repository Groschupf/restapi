<?php

namespace App\Http\Controllers\Api\VersionOne;

use App\Models\ShoppingBasket;
use App\Http\Resources\VersionOne\ShoppingBasketResource;
use App\Http\Requests\UpdateShoppingBasketRequest;
use App\Http\Controllers\Controller;

class ShoppingBasketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ShoppingBasket::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(ShoppingBasket $shoppingBasket)
    {
        return new ShoppingBasketResource($shoppingBasket);
    }
}
