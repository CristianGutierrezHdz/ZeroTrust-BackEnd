<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteHero extends Model
{
    use HasFactory;

    protected $fillable = [
        'slides',
    ];

    protected $casts = [
        'slides' => 'array',
    ];
}
