<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'address',
        'email',
        'regular_hours',
        'emergency_hours',
        'map_embed_url',
        'map_title'
    ];
}