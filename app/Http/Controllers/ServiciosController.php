<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\TipoServicio;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ServiciosController extends Controller
{
    public function mostrarServicio($id){
        $id = Crypt::decrypt($id);
        
        $servicio = TipoServicio::find($id);
        return view('servicio', ['id' => $id, 'servicio' => $servicio]);
    }

    public function mostrarColaborador($nombre){
        $colaborador = User::where('name','=',$nombre)->first()->colaborador;

        $fechaActual = Carbon::now();
        $fechaCreacion = Carbon::parse($colaborador->user->created_at);
        $tiempo = $fechaActual->diffInDays($fechaCreacion);
        
        return view('colaborador',compact('colaborador','tiempo'));
    }
}
