<?php

namespace App\Http\Controllers\Api;

use App\Models\MicrowaveOvenRepairService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MicrowaveOvenRepairServiceController extends Controller
{
    public function index()
    {
        $service = MicrowaveOvenRepairService::where('page', 'MicrowaveOvenRepair')->first();
        
        if (!$service) {
            return response()->json(['message' => 'Service not found'], 404);
        }
        
        return response()->json($service);
    }
}