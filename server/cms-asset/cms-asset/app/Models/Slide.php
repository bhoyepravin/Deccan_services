<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slide extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'image',
        'cta',
        'order',
        'is_active'
    ];

    protected $appends = ['image_url'];

    /**
     * Get the full URL for the image.
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        if (!$this->image) return null;
        
        // Use this for public/uploads
        return asset('uploads/'.$this->image);
        
        // OR if you want to use Storage facade:
        // return Storage::disk('public_uploads')->url($this->image);
    }

    /**
     * Prepare data for JSON serialization.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'description' => $this->description,
            'image' => $this->image_url, // Using the accessor
            'image_path' => $this->image, // Keep the relative path if needed
            'cta' => $this->cta,
            'order' => $this->order,
            'is_active' => $this->is_active,
        ];
    }
}