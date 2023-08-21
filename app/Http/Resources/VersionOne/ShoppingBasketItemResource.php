<?php

namespace App\Http\Resources\VersionOne;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShoppingBasketItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'shoppingBasketId' => $this->shopping_basket_id,
            'product' => new ProductResource($this->product),
            'amount' => $this->amount,
        ];
    }
}
