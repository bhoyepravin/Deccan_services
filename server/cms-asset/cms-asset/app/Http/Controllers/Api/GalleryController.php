<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $items = GalleryItem::where('is_active', true)
            ->orderBy('order')
            ->get();
            
        return response()->json([
            'success' => true,
            'data' => $items,
            'message' => 'Gallery items retrieved successfully'
        ]);
    }
}