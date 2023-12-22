<?php

namespace App\Livewire;

use App\Models\Servicio;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MisServicios extends Component
{
    public function solicitarValidacion($id){
        DB::table('servicio')
            ->where('id',$id)
                ->update(['estado' => 1]);
    }
    public function render()
    {
        return view('livewire.mis-servicios',[
            'servicios' => User::find(auth()->user()->id)->colaborador->servicio,
        ]);
    }
}
