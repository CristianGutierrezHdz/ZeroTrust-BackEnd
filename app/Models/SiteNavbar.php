<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteNavbar extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_prefix',
        'brand_highlight',
        'brand_suffix',
        'phone',
        'menu',
    ];

    protected $casts = [
        'menu' => 'array',
    ];
}
