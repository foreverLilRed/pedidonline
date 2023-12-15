<?php

namespace App\Livewire;

use App\Models\Colaborador;
use App\Models\Etiqueta;
use App\Models\TipoServicio;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AsignarServicios extends Component
{
    public $servicioSeleccionados = [];

    public function guardarServicios(){
        $colaborador = DB::table('colaboradores')
                            ->where('user_id', 'like', auth()->user()->id)
                                ->get();

        $colaborador->servicios()->sync('servicioSeleccionados');
        return redirect()->to('/inicio');
    }
    public function render()
    {
        return view('livewire.asignar-servicios',[
            'servicios' => TipoServicio::all(),
        ]);
    }
}
