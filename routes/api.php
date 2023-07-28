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
use App\Http\Controllers\Api\EventTrackWorkshopBonusMalusController;
use App\Http\Controllers\Api\EventTrackWorkshopsController;
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
Route::apiResources([
    'events'=> EventController::class,
    'workshopmeasures'=> WorkshopMeasuresController::class,
    'workshopmeasures'=> WorkshopMeasuresController::class,
    'eventteams'=> EventTeamsController::class,
    'eventtracks'=> EventTracksController::class,
    'eventteamtracks'=> EventTeamTrackController::class,
    'eventpenalties'=> EventPenaltiesController::class,
    'basepenalties'=> BasePenaltyController::class,
    'eventteamtrackworkshops'=> EventTeamTrackWorkshopController::class,
    'eventTrackworkshopbonusmalus'=> EventTrackWorkshopBonusMalusController::class,
    'eventtrackworkshops'=> EventTrackWorkshopsController::class,
]);
Route::get('/eventtrackworkshops/code/{code}', [EventTrackWorkshopsController::class, 'findByCode']);
Route::get('/eventtracks/code/{code}', [EventTracksController::class, 'findEventTrackByCode']);
Route::get('/eventteamtracks/{trackoid}/{teamoid}', [EventTeamTrackController::class, 'findByTrackOidAndTeamOid']);

