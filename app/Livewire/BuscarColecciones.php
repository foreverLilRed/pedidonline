<?php

namespace App\Livewire;

use App\Models\Colaborador;
use App\Models\User;
use Livewire\Component;

class BuscarColecciones extends Component
{
    public $busqueda = '';
    public function render()
    {
        return view('livewire.buscar-colecciones',[
            'colaboradores' => Colaborador::all(),
        ]);
    }
}
