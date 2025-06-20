<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_title',
        'highlighted_text',
        'description',
        'image_url',
        'features'
    ];

    protected $casts = [
        'features' => 'array'
    ];
}