<?php

namespace App\Livewire;

use App\Models\Colaborador;
use App\Models\Oferta;
use App\Models\Requerimiento;
use App\Models\Servicio;
use Dotenv\Store\File\Reader;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class BusquedaRequerimientos extends Component
{
    public $requerimientos, $colaborador, $servicio, $oferta;
    public $modalOferta = false;
    public $id_requerimiento, $oferta_actual;


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

    public function ofertar($id){
        $this->modalOferta = true;
        $this->id_requerimiento = $id;
        $oferta_actual = Oferta::where('id_requerimiento', $id)
                                    ->where('id_colaborador', auth()->user()->colaborador->id)
                                        ->first();
        if(isset($oferta_actual)){
            $this->mostrarOferta();
        } else {
            $this->oferta_actual = null;
        }
    }

    #[On('ofertaActualizada')] 
    public function mostrarOferta(){
        $oferta_actual = Oferta::where('id_requerimiento', $this->id_requerimiento)
                                    ->where('id_colaborador', auth()->user()->colaborador->id)
                                        ->first();
        $this->oferta_actual = $oferta_actual->oferta_colaborador;
    }

    public function enviarOferta(){
        $requerimiento = Requerimiento::find($this->id_requerimiento);
        $colaborador = Colaborador::find(auth()->user()->colaborador->id);
        $oferta = new Oferta();
        $oferta->oferta_colaborador = $this->oferta;
        $oferta->estado = 0;
        $oferta->requerimiento()->associate($requerimiento);
        $oferta->colaborador()->associate($colaborador);
        $oferta->save();
        $this->oferta = '';
        $this->dispatch('ofertaActualizada');
    }

    public function editarOferta(){
        Oferta::where('id_requerimiento', $this->id_requerimiento)
                    ->where('id_colaborador', auth()->user()->colaborador->id)
                            ->update(['oferta_colaborador' => $this->oferta]);
        $this->oferta = '';
        $this->dispatch('ofertaActualizada');
    }

    public function render()
    {
        return view('livewire.busqueda-requerimientos');
    }
}
