<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteNews extends Model
{
    use HasFactory;

    protected $table = 'site_news';

    protected $fillable = [
        'section_title',
        'items',
        'newsletter',
        'modal',
    ];

    protected $casts = [
        'items' => 'array',
        'newsletter' => 'array',
        'modal' => 'array',
    ];
}
