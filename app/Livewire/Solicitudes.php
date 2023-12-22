<?php

namespace App\Livewire;

use App\Models\Requerimiento;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Solicitudes extends Component
{
    public $modal = false;
    public $ofertas = false;
    public $oferta, $direccion, $descripcion, $requerimiento;

    public function rules() 
    {
        return [
            'oferta' => 'required|integer|gt:10',
            'direccion' => 'required|min:5',
            'descripcion' => 'required|min:5',
        ];
    }

    public function editarRequerimiento($id){
        $this->requerimiento = Requerimiento::find($id);
        $this->modal = true;
        $this->oferta = $this->requerimiento->monto;
        $this->direccion = $this->requerimiento->ubicacion;
        $this->descripcion = $this->requerimiento->descripcion;
    }

    public function updateRequerimiento(){
        $this->validate();
        DB::table('requerimientos')
            ->where('id',$this->requerimiento->id)
                ->update(['monto' => $this->oferta, 'ubicacion' => $this->direccion, 'descripcion' => $this->descripcion]);
        $this->dispatch('requerimiento_editado');
    }
    public function render()
    {
        return view('livewire.solicitudes',[
            'solicitudes' => User::find(auth()->user()->id)
                                    ->cliente
                                        ->requerimientos,
        ]);
    }
}
