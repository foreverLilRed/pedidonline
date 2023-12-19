<?php

namespace App\Livewire;

use App\Models\Colaborador;
use App\Models\Requerimiento;
use Livewire\Component;

class BusquedaRequerimientos extends Component
{
    public $requerimientos, $colaborador, $servicio;


    public function mount(){
        $this->colaborador = Colaborador::find(auth()->user()->colaborador->id);
    }

    public function buscarRequerimientos(){
        $this->requerimientos = Requerimiento::where('id_tipo_servicio','=',$this->servicio)
                                                ->where('estado','=',0)->get();
    }

    public function render()
    {
        return view('livewire.busqueda-requerimientos');
    }
}
