<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingBasketItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'shopping_basket_id',
        'product_id',
        'amount',
    ];

    public function basket()
    {
        return $this->belongsTo(ShoppingBasket::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
