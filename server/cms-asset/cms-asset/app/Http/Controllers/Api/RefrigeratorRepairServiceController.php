<?php

namespace App\Http\Controllers\Api;

use App\Models\RefrigeratorRepairService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RefrigeratorRepairServiceController extends Controller
{
    public function index()
    {
        $service = RefrigeratorRepairService::where('page', 'RefrigeratorRepairservice')->first();
        
        if (!$service) {
            return response()->json(['message' => 'Service not found'], 404);
        }
        
        return response()->json($service);
    }
}