<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [


        '/admin/view-shop','/admin/category-status','/admin/subcategory-status','/admin/slider-status','/customer-login','/verify-code','/quantity-update','/admin/coupon-status'



    ];
}
