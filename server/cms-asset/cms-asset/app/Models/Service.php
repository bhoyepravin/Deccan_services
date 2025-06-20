<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon_name',
        'title',
        'description',
        'link',
        'image_url',
        'order',
        'is_active'
    ];
}