<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Requerimientos extends Controller
{
    public function listarRequerimientos(){
        return view('requerimientos');
    }
}
