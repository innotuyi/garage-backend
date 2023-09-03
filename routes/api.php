<?php

use App\Http\Controllers\CooperativeController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\InspectorController;
use App\Http\Controllers\RCAController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cooperatives', [CooperativeController::class, 'getCooperatives']);

Route::get('/cooperatives/{id}', [CooperativeController::class, 'getSingleCooperative']);

Route::put('/cooperatives/{id}', [CooperativeController::class, 'updateCooperative']);

Route::delete('/cooperatives/{id}', [CooperativeController::class, 'RemoveCooperative']);

Route::post('/cooperatives', [CooperativeController::class, 'CreateCooperative']);


Route::get('/insepections', [InspectionController::class, 'getInsepections']);

Route::get('/insepections/{id}', [InspectionController::class, 'getSingleInspection']);

Route::put('/insepections/{id}', [InspectionController::class, 'updateInspection']);

Route::delete('/insepections/{id}', [InspectionController::class, 'RemoveInspection']);

Route::post('/insepections', [InspectionController::class, 'CreateInspection']);


Route::get('/insepectors', [InspectorController::class, 'getInsepectors']);

Route::get('/insepectors/{id}', [InspectorController::class, 'getSingleInspector']);

Route::put('/insepectors/{id}', [InspectorController::class, 'updateInspector']);

Route::delete('/insepectors/{id}', [InspectorController::class, 'RemoveInspector']);

Route::post('/insepectors', [InspectorController::class, 'createInspector']);


Route::get('/rcas', [RCAController::class, 'getRcas']);

Route::get('/rcas/id', [RCAController::class, 'getSingleRca']);

Route::put('/rcas/{id}', [RCAController::class, 'updateRca']);

Route::delete('/rcas/{id}', [RCAController::class, 'RemoveRca']);

Route::post('/rcas', [RCAController::class, 'createRca']);















