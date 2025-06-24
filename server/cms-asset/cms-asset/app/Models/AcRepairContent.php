<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcRepairContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'process_title',
        'process_description',
        'process_steps',
        'process_note',
        'main_images',
        'gallery_images',
        'cta_text'
    ];

    protected $casts = [
        'process_steps' => 'array',
        'main_images' => 'array',
        'gallery_images' => 'array'
    ];
}