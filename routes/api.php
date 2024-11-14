<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitatController;
use App\Http\Controllers\LizardController;
use App\Http\Controllers\PreyController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::apiResource('lizards', LizardController::class);
Route::apiResource('habitats', HabitatController::class);
Route::apiResource('preys', PreyController::class);
