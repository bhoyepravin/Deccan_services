<?php

namespace App\Http\Controllers\Api;

use App\Models\MicrowaveRepairData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MicrowaveRepairController extends Controller
{
    public function index()
    {
        $data = MicrowaveRepairData::first();
        return response()->json($data ?? []);
    }
}