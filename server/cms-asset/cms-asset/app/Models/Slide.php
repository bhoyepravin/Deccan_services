<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    /**
     * Get the full URL for the image.
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
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
            'image' => $this->image_url, // This will use the accessor
            'cta' => $this->cta,
            'order' => $this->order,
            'is_active' => $this->is_active,
        ];
    }
}