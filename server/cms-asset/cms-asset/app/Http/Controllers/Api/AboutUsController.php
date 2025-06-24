<?php

namespace App\Http\Controllers\Api;

use App\Models\AboutUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        return response()->json(
            AboutUs::active()->ordered()->get()
        );
    }
}
