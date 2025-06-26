<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_name',
        'icon',
        'title',
        'description',
        'image_url',
        'image_alt',
        'number',
        'label',
        'stats_background_image',
        'sort_order'
    ];
}
