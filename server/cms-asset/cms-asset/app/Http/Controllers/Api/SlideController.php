<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index()
{
    try {
        $slides = Slide::where('is_active', true)
            ->orderBy('order', 'asc')
            ->get(); // Remove the column selection to allow model's toArray() to work
        
        return response()->json([
            'success' => true,
            'data' => $slides,
            'message' => 'Slides retrieved successfully'
        ], 200);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to retrieve slides',
            'error' => $e->getMessage()
        ], 500);
    }
}
}