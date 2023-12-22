<?php

namespace App\Livewire;

use App\Models\Colaborador;
use App\Models\Oferta;
use App\Models\Requerimiento;
use App\Models\Servicio;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BusquedaRequerimientos extends Component
{
    public $requerimientos, $colaborador, $servicio, $oferta;
    public $modalOferta = false;


    public function mount(){
        $this->colaborador = Colaborador::find(auth()->user()->colaborador->id);
    }

    public function buscarRequerimientos(){
        $this->requerimientos = Requerimiento::where('id_tipo_servicio','=',$this->servicio)
                                                ->where('estado','=',0)->get();
    }

    public function crearServicio($id){
        $requerimiento = Requerimiento::find($id);
        $colaborador = Colaborador::find(auth()->user()->colaborador->id);
        $servicio = new Servicio();
        $servicio->monto = $requerimiento->monto;
        $servicio->descripcion = $requerimiento->descripcion;
        $servicio->estado = 0;
        $servicio->id_medio_pago = 1;
        $servicio->colaborador()->associate($colaborador);
        $servicio->requerimiento()->associate($requerimiento);
        $servicio->save();

        DB::table('requerimientos')
            ->where('id',$requerimiento->id)
                ->update(['estado' => 1]);
        return redirect('/mis-servicios');

    }

    public function enviarOferta($id){

    }

    public function render()
    {
        return view('livewire.busqueda-requerimientos');
    }
}
