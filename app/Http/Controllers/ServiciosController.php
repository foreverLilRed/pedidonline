<?php

namespace App\Http\Controllers;

use App\Models\TipoServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ServiciosController extends Controller
{
    public function mostrarServicio($id){
        $id = Crypt::decrypt($id);
        
        $servicio = TipoServicio::find($id);
        return view('servicio', ['id' => $id, 'servicio' => $servicio]);
    }
}
