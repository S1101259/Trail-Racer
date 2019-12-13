<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use phpDocumentor\Reflection\Types\Integer;

class TimeController extends Controller
{
    public function addTime(Request $request)
    {
        $competition = Competition::where('slug', '=', $request['competition'])->first();
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

    public function getLeaderboard(Request $request)
    {
        $times = Time::orderBy('time', 'DESC')
            ->where('circuit_id', '=', $request['circuit'])
            ->with('team')
            ->take(100)
            ->get();

        $response_data = $this->formatTimes($times);

        return response([
            'status' => 200,
            'times' => $response_data
        ]);
    }

    public function getCompetitionStanding(Request $request)
    {
        $competition = Competition::where('slug', '=', $request['competition'])->first();

        $times = Time::orderBy('time', 'ASC')
            ->where('competition_id', '=', $competition->id)
            ->where('circuit_id', '=', intval($request['circuit']))
            ->with('team')
            ->take(100)
            ->get();

        $response_data = $this->formatTimes($times);

        return response([
            'status' => 200,
            'times' => $response_data
        ]);
    }

    private function formatTimes($times)
    {
        $response_data = [];
        foreach ($times as $time) {
            array_push($response_data, [
                'time' => $time->time,
                'team' => $time->team,
                'user' => $time->user->name
            ]);
        }
        return $response_data;

    }
}
