<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function shoppingBasketItems()
    {
        return $this->hasMany(ShoppingBasketItem::class);
    }
}
