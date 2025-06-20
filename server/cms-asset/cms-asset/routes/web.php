<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SlideController;
use App\Http\Controllers\Api\AboutSectionController;
use App\Http\Controllers\Api\ServiceController;



Route::get('/api/slides', [SlideController::class, 'index']);
Route::get('/api/about-section', [AboutSectionController::class, 'index']);
Route::get('/services', [ServiceController::class, 'index']);


Route::get('/', function () {
    return view('welcome');
    
});




