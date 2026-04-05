<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteAbout extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_title',
        'image',
        'image_alt',
        'overlay_title',
        'overlay_description',
        'headline',
        'paragraphs',
        'signature_image',
        'signature_name',
    ];

    protected $casts = [
        'paragraphs' => 'array',
    ];
}
