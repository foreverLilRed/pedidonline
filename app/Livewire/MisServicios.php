<?php

namespace App\Livewire;

use App\Models\Servicio;
use App\Models\User;
use Livewire\Component;

class MisServicios extends Component
{
    public function render()
    {
        return view('livewire.mis-servicios',[
            'servicios' => User::find(auth()->user()->id)->colaborador->servicio,
        ]);
    }
}
