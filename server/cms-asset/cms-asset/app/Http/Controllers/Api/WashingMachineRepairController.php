<?php



namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WashingMachineRepairContent;
use Illuminate\Http\Request;

class WashingMachineRepairController extends Controller
{
    public function index()
    {
        $content = WashingMachineRepairContent::first();
        
        if (!$content) {
            return response()->json(['message' => 'Content not found'], 404);
        }
        
        return response()->json([
            'serviceDescription' => [
                'title' => $content->title,
                'paragraphs' => $content->description_paragraphs,
                'video' => [
                    'src' => $content->video_url,
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
            'serviceButtons' => $content->service_buttons,
        ]);
    }
}