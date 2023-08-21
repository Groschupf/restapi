<?php

namespace App\Http\Controllers\Api\VersionOne;

use App\Models\ShoppingBasketItem;
use App\Models\ShoppingBasket;
use App\Models\Product;
use App\Http\Resources\VersionOne\ShoppingBasketItemResource;
use App\Http\Requests\VersionOne\StoreShoppingBasketItemRequest;
use App\Http\Requests\VersionOne\UpdateShoppingBasketItemRequest;
use App\Http\Controllers\Controller;
use \Illuminate\Http\Response;

class ShoppingBasketItemController extends Controller
{
    protected const REST_COMMAND_PATCH = 'PATCH';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ShoppingBasketItem::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShoppingBasketItemRequest $request): ShoppingBasketItemResource|Response
    {
        // export validation
        $basket = ShoppingBasket::find($request->get('shoppingBasketId'));
        if($basket->items->find($request->get('productId'))){
            $content = [
                'error' => 'product already in basket'
            ];

            return response($content, 400);
        }

        $product = Product::find($request->get('productId'));
        if($product->amount < $request->get('amount')){
            $content = [
                'error' => 'amount is higher than product base amount'
            ];

            return response($content, 400);
        } 

        $shoppingBasketItem = ShoppingBasketItem::create($request->all());
        return new ShoppingBasketItemResource($shoppingBasketItem);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(ShoppingBasketItem $shoppingBasketItem): ShoppingBasketItemResource
    {
        return new ShoppingBasketItemResource($shoppingBasketItem);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShoppingBasketItemRequest $request, ShoppingBasketItem $shoppingBasketItem): ShoppingBasketItemResource|Response
    {
        if(
            $request->method() === self::REST_COMMAND_PATCH 
            && $request->get('amount') <= 0
        ){
            return $this->destroy($shoppingBasketItem);
        }

        $shoppingBasketItem->update($request->all());
        return new ShoppingBasketItemResource($shoppingBasketItem);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShoppingBasketItem $shoppingBasketItem): Response
    {
        $shoppingBasketItem->delete();

        return response()->noContent();
    }
}
