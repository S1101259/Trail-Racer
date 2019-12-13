<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('jwt:auth')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('circuits/all', 'CircuitController@getCircuits');
Route::get('teams/all', 'TeamController@getTeams');

Route::post('auth/register', 'AuthController@register');
Route::post('auth/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');

Route::get('/competition/all', 'CompetitionController@getAllCompetitions');
Route::get('/competition/standing', 'TimeController@getCompetitionStanding');
Route::get('/leaderboard/circuit', 'TimeController@getLeaderboard');
Route::get('/competition/random', 'CompetitionController@getRandomCompetitions');

Route::group(['middleware' => 'jwt.auth'], function (){
    Route::get('/competition/personal', 'CompetitionController@getOwnCompetitions');
    Route::post('/competition/create', 'CompetitionController@createCompetition');

    Route::post('/time/add', 'TimeController@addTime');
    Route::delete('/time/remove/{id}', 'TimeController@removeTime');

    Route::post('/competition/join', 'EntryController@joinCompetition');
    Route::post('/competition/leave', 'EntryController@leaveCompetition');
});

