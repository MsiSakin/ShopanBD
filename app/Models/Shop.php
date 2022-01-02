<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
        'shopkeeper_id','category_id','shop_name','shop_address','shop_description','banner','shop_phone','shop_status',
    ];

    //slider_image_path
    protected $appends = ['banner_path'];

    public function getBannerPathAttribute(){
        return asset($this->banner);
    }

    public function shopkeepers(){
        return $this->belongsTo('App\Models\Shopkeeper','shopkeeper_id');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function shop_image(){
        return $this->hasMany(ShopImage::class,'shop_id');
    }


}
