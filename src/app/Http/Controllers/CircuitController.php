<?php

namespace App\Http\Controllers;

use App\Circuit;

class CircuitController extends Controller
{
   public function getCircuits(){
       $circuits = Circuit::all();
       return response([
           'circuits' => $circuits
       ], 201);
   }
}
