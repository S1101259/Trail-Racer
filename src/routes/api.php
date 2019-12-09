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

Route::group(['middleware' => 'jwt.auth'], function (){
    Route::get('/competition/all', 'CompetitionController@getAllCompetitions');
    Route::post('/competition/create', 'CompetitionController@createCompetition');

    Route::post('/time/add', 'TimeController@addTime');
    Route::delete('/time/remove/{id}', 'TimeController@removeTime');
});

