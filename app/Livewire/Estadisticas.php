<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\Colaborador;
use App\Models\Servicio;
use Livewire\Component;

class Estadisticas extends Component
{
    public function render()
    {
        return view('livewire.estadisticas',[
            'colaboradores' => Colaborador::all()->count(),
            'clientes' => Cliente::all()->count(),
            'servicios' => Servicio::all()->count(),
        ]);
    }
}
