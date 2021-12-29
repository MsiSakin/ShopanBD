<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'slider',
        'status',
    ];

    //slider_image_path
    protected $appends = ['image_path'];

    public function getImagePathAttribute(){
        return asset($this->slider);
    }


    //category
    public function Category(){
        return $this->belongsTo(Category::class, 'category_id')->where('status',1)->select('id','category_name','category_image','status');
    }


}
