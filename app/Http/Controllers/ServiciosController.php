<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Colaborador;
use App\Models\Requerimiento;
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

    public function generarRequerimiento($id){
        $id = Crypt::decrypt($id);
        $servicios = TipoServicio::all();
        return view('requerimiento', ['id' => $id,'servicios' => $servicios]);
    }

    public function crearRequerimiento(Request $request){
        $requerimiento = new Requerimiento();

        $monto = $request->input('oferta');
        $estado = 0;
        $ubicacion = $request->input('direccion');
        $descripcion = $request->input('descripcion');
        $latitud = $request->input('lat');
        $longitud = $request->input('lng');

        $requerimiento->monto = $monto;
        $requerimiento->estado = $estado;
        $requerimiento->ubicacion = $ubicacion;
        $requerimiento->descripcion = $descripcion;
        $requerimiento->latitud = $latitud;
        $requerimiento->longitud = $longitud;
        $servicio = TipoServicio::find($request->input('servicio'));
        $requerimiento->servicios()->associate($servicio);
        $cliente = Cliente::find(auth()->user()->cliente->id);
        $requerimiento->clientes()->associate($cliente);
        $requerimiento->save();

        return redirect('/inicio');

    }
}
