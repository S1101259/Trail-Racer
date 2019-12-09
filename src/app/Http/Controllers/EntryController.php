<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntryController extends Controller
{
    public function joinCompetition(Request $request)
    {
        $entry = Entry::create([
            'user_id' => Auth::user()->id,
            'competition_id' => $request['competition_id']
        ]);
    }

    public function leaveCompetition(Request $request)
    {
        try {
            Entry::delete()
                ->where('user_id', '=', Auth::user()->id)
                ->where('competition_id', '=', $request['competition_id'])
                ->get();

            $newCompetitionEntries = Entry::where('competition_id', '=', $request['competition_id'])->get();

            if (count($newCompetitionEntries) <= 0) {
                //todo remove competition
            }
            return response([
                "status" => 203
            ]);
        } catch (\Exception $e) {
            return response([
                "status" => 404
            ]);
        }
    }
}
