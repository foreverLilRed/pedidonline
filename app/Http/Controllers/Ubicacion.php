<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Ubicacion extends Controller
{
    public function mostrarUbicacion(){
        return view('geocoding');
    }

    public function getUserLocation(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        return response()->json(['latitude' => $latitude, 'longitude' => $longitude]);
    }

    public function mostrarUbicacionGeolocation(){
        
    }
}
