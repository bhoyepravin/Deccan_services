<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SlideController;
use App\Http\Controllers\Api\AboutSectionController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\StepController;
use App\Http\Controllers\Api\BenefitController;
use App\Http\Controllers\Api\OfferingController;
use App\Http\Controllers\Api\AboutUsController;
use App\Http\Controllers\Api\WhyChooseUsController;
use App\Http\Controllers\Api\ContactInformationController;
use App\Http\Controllers\Api\AcRepairServiceController;
use App\Http\Controllers\Api\WashingMachineRepairServiceController;
use App\Http\Controllers\WashingMachineRepairController;
use App\Http\Controllers\RefrigeratorRepairController;
use App\Http\Controllers\Api\RefrigeratorRepairServiceController;
use App\Http\Controllers\Api\MicrowaveOvenRepairServiceController;






// API Routes
Route::get('/api/slides', [SlideController::class, 'index']);
Route::get('/api/about-section', [AboutSectionController::class, 'index']);
Route::get('/api/services', [ServiceController::class, 'index']);
Route::get('/api/gallery', [GalleryController::class, 'index']);
Route::get('/api/steps', [StepController::class, 'index']);
Route::get('/api/benefits', [BenefitController::class, 'index']);
Route::get('/api/what-we-offer', [OfferingController::class, 'index']);
Route::get('/api/about-us', [AboutUsController::class, 'index']);
Route::get('/api/why-choose-us', [WhyChooseUsController::class, 'index']);
Route::get('/api/contact-info', [ContactInformationController::class, 'index']);
Route::get('/api/ac-repair-service', [AcRepairServiceController::class, 'index']);
Route::get('/api/washing-machine-repair', [WashingMachineRepairServiceController::class, 'index']);
Route::get('/api/refrigerator-repair-service', [RefrigeratorRepairServiceController::class, 'index']);

Route::get('/api/microwave-oven-repair-service', [MicrowaveOvenRepairServiceController::class, 'index']);

// Web Route
Route::get('/', function () {
    return view('welcome');
});








