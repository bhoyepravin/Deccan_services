<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WashingMachineRepairService;
use Illuminate\Http\Request;

class WashingMachineRepairServiceController extends Controller
{
    public function index()
    {
        $service = WashingMachineRepairService::first();
        
        if (!$service) {
            return response()->json(['message' => 'Service not found'], 404);
        }
        
        return response()->json($service);
    }
}