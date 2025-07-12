<?php

namespace App\Http\Controllers\Api;

use App\Models\AcRepairService;
use App\Http\Controllers\Controller;
use App\Http\Resources\AcRepairServiceResource;
use Illuminate\Http\Request;

class AcRepairServiceController extends Controller
{
    public function index()
    {
        return AcRepairServiceResource::collection(AcRepairService::all());
    }
    
    public function show(AcRepairService $acRepairService)
    {
        return new AcRepairServiceResource($acRepairService);
    }
}