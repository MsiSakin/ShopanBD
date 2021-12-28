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

    public function shopkeepers(){
        return $this->belongsTo('App\Models\Shopkeeper','shopkeeper_id');
    }

}
