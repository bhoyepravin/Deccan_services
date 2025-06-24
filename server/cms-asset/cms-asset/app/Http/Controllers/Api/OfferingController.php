<?php

namespace App\Http\Controllers\Api;

use App\Models\Offering;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfferingController extends Controller
{
    public function index()
    {
        return response()->json(
            Offering::active()->ordered()->get()
        );
    }
}
