<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name','category_image','status'
    ];

    //category_image_path
    protected $appends = ['image_path'];

    public function getImagePathAttribute(){
        return asset($this->category_image);
    }
}
