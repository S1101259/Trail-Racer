<?php

namespace App\Http\Controllers;

use App\Circuit;

class CircuitController extends Controller
{
   public function getCircuits(){
       $circuits = Circuit::all();
       return response([
           'status' => 201,
           'circuits' => $circuits
       ]);
   }
}
