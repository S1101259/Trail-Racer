<?php

namespace App\Http\Controllers;

use App\Team;

class TeamController extends Controller
{
   public function getTeams(){
       $teams = Team::all();
       return response([
           'status' => 200,
           'temas' => $teams
       ]);
   }
}
