<?php

namespace App\Livewire;

use App\Models\Colaborador;
use App\Models\TipoServicio;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

use function Laravel\Prompts\table;

class BuscarColecciones extends Component
{
    public $id;

    public $servicio, $listaColaboradores;
    public $filtro = '';

    public function mount(){
        $this->servicio = TipoServicio::find($this->id);
        $this->listaColaboradores = $this->servicio->colaboradores;
    }

    public function actualizarFiltro(){
        if($this->filtro == 'calificacion'){
            $this->servicio = TipoServicio::find($this->id);
            $this->listaColaboradores = $this->servicio->colaboradores->orderByDesc('calificacion')->get();
            dd($this->listaColaboradores);
        }
    }

    public function tiempo(){
        $this->listaColaboradores = $this->servicio->colaboradores->orderBy('calificacion', 'desc');
    }
    public function render()
    {
        return view('livewire.buscar-colecciones');
    }
}
