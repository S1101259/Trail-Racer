<?php

namespace App\Http\Controllers;

use App\Team;

class TeamController extends Controller
{
   public function getTeams(){
       $teams = Team::all();
       return response([
           'teams' => $teams
       ], 200);
   }
}
