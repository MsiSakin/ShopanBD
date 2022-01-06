<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'session_id',
        'product_id',
        'shop_id',
        'quantity',
        'price'
    ];


    //product
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    //shop
    public function shop(){
        return $this->belongsTo(Shop::class,'shop_id');
    }
}

