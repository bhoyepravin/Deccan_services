<?php

namespace App\Http\Controllers;

use App\Models\WashingMachineRepairService;
use Illuminate\Http\Request;

class WashingMachineRepairController extends Controller
{
    public function index()
    {
        $service = WashingMachineRepairService::first();
        
        if (!$service) {
            abort(404);
        }
        
        return view('washing-machine-repair', compact('service'));
    }
}