<?php

namespace App\Http\Controllers;

use App\Ambulance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AmbulanceController extends Controller
{

    public function index()
    {
        //
        return Ambulance::orderBy('_id', 'DESC')->get();
    }

    public function addNewCoordinates(Request $request){

        $ambulance = new Ambulance();
        $ambulance->ambulance_key = $request->ambulance_key;
        $ambulance->latitude = $request->latitude;
        $ambulance->longitude = $request->longitude;
        $ambulance->save();

        return $ambulance;

    }

    public function singleAmbulanceCoordinates($ambulance_key){

        $select = DB::table('ambulances')->where('ambulance_key', $ambulance_key)->get();

        return $select;
    }
}

