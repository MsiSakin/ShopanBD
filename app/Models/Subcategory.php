<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sub_category_name',
        'sub_category_image',
        'status',
    ];

    //sub category_image_path
    protected $appends = ['image_path'];

    public function getImagePathAttribute(){
        return asset($this->sub_category_image);
    }

    //category
    public function Category(){
        return $this->belongsTo(Category::class, 'category_id')->where('status',1)->select('id','category_name','category_image','status');
    }
}
