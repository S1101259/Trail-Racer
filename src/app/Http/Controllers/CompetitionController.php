<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CompetitionController extends Controller
{
    public function createCompetition(Request $request){
        $competition = Competition::create([
           'name' =>  $request['name'],
           'slug' => Str::slug($request['name'], '_')
        ]);

        Entry::create([
            'user_id' => Auth::user()->id,
            'competition_id' => $competition->id
        ]);

        return response([
            'status' => 200,
            'competition' => $competition
        ]);
    }

    public function getAllCompetitions(Request $request){
        $user = Auth::user();
        $competitions = Competition::all();
        $response_data = [];

        foreach ($competitions as $competition){
            $entries = $competition->entries;
            $userEntries = Entry::where('user_id', '=', $user->id)->where('competition_id' , '=', $competition->id)->get();
            $joined = count($userEntries) > 0 ? true : false;
            array_push($response_data, [
                'name' => $competition->name,
                'slug' => $competition->slug,
                'numberOfDrivers' => count($entries),
                'joined' => $joined
            ]);
        }

        return response([
            'status' => 200,
            'competitions' => $response_data
        ]);
    }
}
