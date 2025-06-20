<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutSectionController extends Controller
{
    public function index()
    {
        $aboutSection = AboutSection::first();
        
        return response()->json([
            'success' => true,
            'data' => $aboutSection,
            'message' => 'About section retrieved successfully'
        ]);
    }
}