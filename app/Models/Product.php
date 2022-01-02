<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'category_id','sub_category_id','shop_id','product_name','image','price','discount','discounted_price','short_des','long_des','status'
    ];


    //product
    public function shop(){
        return $this->belongsTo(Shop::class,'shop_id');
    }

     //product_image_path
     protected $appends = ['image_path'];

     public function getImagePathAttribute(){
         return asset($this->image);
     }


}

