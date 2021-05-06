<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Entry;
use App\Http\Requests\JoinCompetitionRequest;
use App\Http\Requests\LeaveCompetitionRequest;
use App\Time;
use Illuminate\Support\Facades\Auth;

class EntryController extends Controller
{
    public function joinCompetition(JoinCompetitionRequest $request)
    {
        $competition = Competition::where('slug', '=', $request['competition'])->first();
        $entry = Entry::create([
            'user_id' => Auth::user()->id,
            'competition_id' => $competition->id
        ]);
        return response([], 204);
    }

    public function leaveCompetition(LeaveCompetitionRequest $request)
    {
        $competition = Competition::where('slug', '=', $request['competition'])->first();
        try {
            Entry::where('user_id', '=', Auth::user()->id)
                ->where('competition_id', '=', $competition->id)
                ->delete();

            Time::where('user_id', '=', Auth::user()->id)
                ->where('competition_id', '=', $competition->id)
                ->delete();

            $newCompetitionEntries = Entry::where('competition_id', '=', $request['competition_id'])->get();

            if (count($newCompetitionEntries) <= 0) {
                $competition->delete();
            }
            return response([], 204);
        } catch (\Exception $e) {
            return response([], 404);
        }
    }
}
