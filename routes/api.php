<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/activities/{activatorId}/',                 [\App\Http\Controllers\ActivitiesController::class, 'getActivities']);
Route::get('/activities/{activatorId}/timeline/',        [\App\Http\Controllers\ActivitiesController::class, 'getTimeline']);
Route::post('/activities/{activatorId}/contribution/',   [\App\Http\Controllers\ActivitiesController::class, 'postContribution']);
Route::post('/activities/{activatorId}/share/',          [\App\Http\Controllers\ActivitiesController::class, 'postShare']);
Route::post('/activities/{activatorId}/reply/',          [\App\Http\Controllers\ActivitiesController::class, 'postReply']);
