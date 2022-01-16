<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    //product
    public function product(){
        return $this->belongsTo(Product::class,'product_id')->select('id','category_id','sub_category_id','shop_id','product_name','image','price','discount','discounted_price','short_des','long_des');
    }

    //shop
    public function shop(){
        return $this->belongsTo(Shop::class,'shop_id')->select('id','shopkeeper_id','category_id','shop_name','shop_address','shop_description','banner','shop_phone','shop_status');
    }




}

