<?php

namespace App\Http\Controllers\Api;

use App\Models\ContactInformation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactInformationController extends Controller
{
    public function index()
    {
        $contactInfo = ContactInformation::first();
        return response()->json([
            'contact_info' => $contactInfo
        ]);
    }
}