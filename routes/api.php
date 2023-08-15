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

Route::get('/activities/{userId}/',                 [\App\Http\Controllers\ActivitiesController::class, 'getActivities']);
Route::get('/activities/{userId}/timeline/',        [\App\Http\Controllers\ActivitiesController::class, 'getTimeline']);
Route::post('/activities/{userId}/contribution/',   [\App\Http\Controllers\ActivitiesController::class, 'postContribution']);
Route::post('/activities/{userId}/share/',          [\App\Http\Controllers\ActivitiesController::class, 'postShare']);
Route::post('/activities/{userId}/reply/',          [\App\Http\Controllers\ActivitiesController::class, 'postReply']);
