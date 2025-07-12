<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WashingMachineRepairService extends Model
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
        'meta' => 'array',
    ];

    /**
     * Get the full URL for the background image
     */
    public function getBackgroundImageUrlAttribute()
    {
        return asset('storage/'.$this->background_image);
    }

    /**
     * Get the full URL for the uploaded video
     */
    public function getUploadedVideoUrlAttribute()
    {
        return $this->uploaded_video_path ? asset('storage/'.$this->uploaded_video_path) : null;
    }

    /**
     * Get full URLs for gallery images
     */
    public function getGalleryImagesUrlsAttribute()
    {
        if (empty($this->gallery_images)) {
            return [];
        }

        return array_map(function($image) {
            return asset('storage/'.$image);
        }, $this->gallery_images);
    }

    /**
     * Get full URLs for final gallery images
     */
    public function getFinalGalleryImagesUrlsAttribute()
    {
        if (empty($this->final_gallery_images)) {
            return [];
        }

        return array_map(function($image) {
            return asset('storage/'.$image);
        }, $this->final_gallery_images);
    }
}