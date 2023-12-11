<?php

namespace App\Livewire;

use App\Models\TipoServicio;
use Livewire\Component;

class Inicio extends Component
{
    public $search = '';
    public $servicioEstado = false;

    public $tipo_servicio;

    public function mostrarServicio($id){
        $this->tipo_servicio = TipoServicio::find($id);
        $this->servicioEstado = true;
    }
    public function render()
    {
        return view('livewire.inicio',[
            'servicios' => TipoServicio::where('nombre','like','%'.$this->search.'%')->get(),
        ]);
    }
}
