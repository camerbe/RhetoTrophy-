<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\WorkshopMeasuresController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\EventTeamsController;
use App\Http\Controllers\Api\EventTracksController;
use App\Http\Controllers\Api\EventTeamTrackController;
use App\Http\Controllers\Api\EventPenaltiesController;
use App\Http\Controllers\Api\BasePenaltyController;
use App\Http\Controllers\Api\EventTeamTrackWorkshopController;
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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::apiResources(['events'=> EventController::class]);
Route::apiResources(['workshopmeasures'=> WorkshopMeasuresController::class]);
Route::apiResources(['eventteams'=> EventTeamsController::class]);
Route::apiResources(['eventtracks'=> EventTracksController::class]);
Route::apiResources(['eventteamtracks'=> EventTeamTrackController::class]);
Route::apiResources(['eventpenalties'=> EventPenaltiesController::class]);
Route::apiResources(['basepenalties'=> BasePenaltyController::class]);
Route::apiResources(['eventteamtrackworkshops'=> EventTeamTrackWorkshopController::class]);
