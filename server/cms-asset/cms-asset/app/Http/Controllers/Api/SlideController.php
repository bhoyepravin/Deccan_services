<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of active slides ordered by their order field.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $slides = Slide::where('is_active', true)
                ->orderBy('order', 'asc')
                ->get(['id', 'title', 'subtitle', 'description', 'image', 'cta', 'order']);
            
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