<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'shop_id','shop_slider',
    ];
    //slider_image_path
    protected $appends = ['shop_image_path'];

    public function getShopImagePathAttribute(){
        return asset($this->shop_slider);
    }

    public function shopImage(){
        return $this->belongsTo('App\Models\Shop','shop_id');
    }
}
