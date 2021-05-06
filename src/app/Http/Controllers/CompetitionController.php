<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Entry;
use App\Http\Requests\CreateCompetitionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CompetitionController extends Controller
{
    public function createCompetition(CreateCompetitionRequest $request){
        $competition = Competition::create([
           'name' =>  $request['name'],
           'slug' => Str::slug($request['name'], '_')
        ]);

        Entry::create([
            'user_id' => Auth::user()->id,
            'competition_id' => $competition->id
        ]);

        return response([
            'competition' => $competition
        ], 200);
    }

    public function getAllCompetitions(){
        $competitions = Competition::all();
        $response_data = $this->formatCompetition($competitions);
        return response([
            'competitions' => $response_data
        ], 200);
    }

    public function getRandomCompetitions(){
        $competitions = Competition::take(5)
            ->inRandomOrder()
            ->get();

        $response_data = $this->formatCompetition($competitions);

        return response([
            'competitions' => $response_data
        ], 200);
    }

    public function getOwnCompetitions(){
        $user = Auth::user();
        $entries = Entry::where('user_id', '=', $user->id)->with('competition')->get();
        $competitions = [];

        foreach ($entries as $entry){
            array_push($competitions, $entry->competition);
        }

        $response_data = $this->formatCompetition($competitions);

        return response([
           'competitions' => $response_data
        ], 200);

    }

    private function formatCompetition($competitions){
        $response_data = [];
        foreach ($competitions as $competition){
            $entries = $competition->entries;

            if($user = Auth::user()){
                $userEntries = Entry::where('user_id', '=', $user->id)->where('competition_id' , '=', $competition->id)->get();
                $joined = count($userEntries) > 0 ? true : false;
            }else{
                $joined = false;
            }

            array_push($response_data, [
                'name' => $competition->name,
                'slug' => $competition->slug,
                'numberOfDrivers' => count($entries),
                'joined' => $joined
            ]);
        }
        return $response_data;
    }
}

