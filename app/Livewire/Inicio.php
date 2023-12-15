<?php

namespace App\Livewire;

use App\Models\Colaborador;
use App\Models\ColaboradoresClientes;
use App\Models\TipoServicio;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class Inicio extends Component
{
    public $search = '';
    public $servicioEstado = false;
    public $cantidad, $colaboradores, $tipos_servicio, $lista_colaboradores;

    public $tipo_servicio;

    public function mostrarServicio($id){
        $servicio = TipoServicio::find($id);
        $this->tipo_servicio = $servicio;
        $this->servicioEstado = true;
        $this->cantidad = ColaboradoresClientes::where('id_tipo_servicio','=',$id)->count();
        $this->ultimosTres($servicio);
    }

    public function ultimosTres($servicio){
        $this->tipos_servicio = $servicio;
    }

    public function render()
    {
        return view('livewire.inicio',[
            'servicios' => TipoServicio::where('nombre','like','%'.$this->search.'%')->get(),
        ]);
    }
}
