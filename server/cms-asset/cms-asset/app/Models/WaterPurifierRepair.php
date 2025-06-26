<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterPurifierRepair extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description_paragraphs',
        'video_src',
        'video_title',
        'process_title',
        'process_steps',
        'process_note',
        'main_images',
        'gallery_images',
        'cta_text'
    ];

    protected $casts = [
        'description_paragraphs' => 'array',
        'process_steps' => 'array',
        'main_images' => 'array',
        'gallery_images' => 'array'
    ];
}
