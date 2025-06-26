<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MicrowaveRepairData extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_description',
        'images',
        'repair_process',
        'cta_content'
    ];

    protected $casts = [
        'service_description' => 'array',
        'images' => 'array',
        'repair_process' => 'array',
        'cta_content' => 'array'
    ];
}