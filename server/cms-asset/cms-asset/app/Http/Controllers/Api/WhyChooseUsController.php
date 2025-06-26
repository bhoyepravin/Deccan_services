<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        $data = [
            'mainReasons' => WhyChooseUs::where('section_name', 'main_reasons')
                ->orderBy('sort_order')
                ->get(),
            'compactBenefits' => WhyChooseUs::where('section_name', 'compact_benefits')
                ->orderBy('sort_order')
                ->get(),
            'stats' => WhyChooseUs::where('section_name', 'stats')
                ->orderBy('sort_order')
                ->get(),
            'statsBackgroundImage' => WhyChooseUs::where('section_name', 'stats')
                ->whereNotNull('stats_background_image')
                ->value('stats_background_image'),
        ];

        return response()->json($data);
    }
}