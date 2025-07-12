<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefrigeratorRepairService extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'title',
        'background_image',
        'video_url',
        'uploaded_video_path',
        'video_title',
        'service_description',
        'gallery_images',
        'repair_process',
        'final_gallery_images',
        'cta_section',
        'contact_info',
        'meta'
    ];

    protected $casts = [
        'service_description' => 'array',
        'gallery_images' => 'array',
        'repair_process' => 'array',
        'final_gallery_images' => 'array',
        'cta_section' => 'array',
        'contact_info' => 'array',
        'meta' => 'array'
    ];

    // Set default values
    protected $attributes = [
        'page' => 'RefrigeratorRepairservice'
    ];
}