<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class TimeController extends Controller
{
    public function addTime(Request $request)
    {
        $competition = Competition::where('slug', '=', 'formule-1')->first();
        $timeInMilliseconds = ($request['minutes'] * 60000) + ($request['seconds'] * 1000) + $request['milliseconds'];

        $time = Time::create([
            'user_id' => Auth::user()->id,
            'competition_id' => $competition->id,
            'team_id' => $request['teamId'],
            'circuit_id' => $request['circuitId'],
            'time' => $timeInMilliseconds
        ]);

        return response([
            'status' => 201,
            'time' => $time
        ]);
    }

    public function removeTime($id)
    {
        try {
            $time = Time::findOrFail($id)->where('user_id', '=', Auth::user()->id);
            $time->delete();
        } catch (Exception $e) {
            return response([
                'status' => 400
            ]);
        }

        return response([
            'status' => 204
        ]);
    }
}
