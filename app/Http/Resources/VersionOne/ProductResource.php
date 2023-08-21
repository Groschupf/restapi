<?php

namespace App\Http\Resources\VersionOne;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'typeId' => $this->product_type_id,
            'name' => $this->name,
            'description' => $this->description,
            'amount' => $this->amount,
            'price' => $this->price,
        ];
    }
}
