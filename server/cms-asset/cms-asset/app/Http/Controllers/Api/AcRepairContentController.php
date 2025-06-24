<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AcRepairContent;
use Illuminate\Http\Request;

class AcRepairContentController extends Controller
{
    public function index()
    {
        $content = AcRepairContent::first();
        
        if (!$content) {
            return response()->json(['message' => 'Content not found'], 404);
        }
        
        return response()->json([
            'serviceDescription' => [
                'title' => $content->title,
                'paragraphs' => explode("\n", $content->description)
            ],
            'repairProcess' => [
                'title' => $content->process_title,
                'description' => $content->process_description,
                'steps' => $content->process_steps,
                'note' => $content->process_note
            ],
            'images' => [
                'main' => $content->main_images,
                'gallery' => $content->gallery_images
            ],
            'ctaContent' => [
                'text' => $content->cta_text
            ]
        ]);
    }
}
