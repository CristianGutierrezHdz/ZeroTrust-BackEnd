<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteService extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_title',
        'items',
    ];

    protected $casts = [
        'items' => 'array',
    ];
}
