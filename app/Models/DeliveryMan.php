<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'password',
        'phone',
        'image',
        'address',
        'status',

    ];

    protected $appends = ['image_path'];

    public function getImagePathAttribute(){
        return asset($this->image);
    }
}
