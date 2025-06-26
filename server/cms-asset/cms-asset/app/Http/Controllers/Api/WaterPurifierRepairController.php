<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WaterPurifierRepair;
use Illuminate\Http\Request;

class WaterPurifierRepairController extends Controller
{
    public function index()
    {
        $content = WaterPurifierRepair::first();
        
        if (!$content) {
            return response()->json(['message' => 'Content not found'], 404);
        }
        
        return response()->json([
            'serviceDescription' => [
                'title' => $content->title,
                'paragraphs' => $content->description_paragraphs,
                'video' => [
                    'src' => $content->video_src,
                    'title' => $content->video_title,
                ],
            ],
            'repairProcess' => [
                'title' => $content->process_title,
                'steps' => $content->process_steps,
                'note' => $content->process_note,
            ],
            'images' => [
                'main' => $content->main_images,
                'gallery' => $content->gallery_images,
            ],
            'ctaContent' => [
                'text' => $content->cta_text,
            ],
        ]);
    }
}
