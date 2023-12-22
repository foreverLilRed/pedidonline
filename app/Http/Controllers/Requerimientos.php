<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Requerimientos extends Controller
{
    public function listarRequerimientos(){
        return view('requerimientos');
    }

    public function misSolicitudes(){
        return view('mis_solicitudes');
    }

    public function listarServicios(){
        return view('mis_servicios');
    }
}
