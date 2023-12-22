<?php

namespace App\Livewire;

use App\Models\Colaborador;
use App\Models\Requerimiento;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Solicitudes extends Component
{
    public $modal = false;
    public $ofertas = false;
    public $estado = false;
    public $oferta, $direccion, $descripcion, $requerimiento;

    public $colaborador, $estado_servicio;
    public $id_servicio;

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

    public function verEstado($id){
        $this->estado = true;
        $this->id_servicio = $id;
        $this->consultarEstado();
    }

    public function consultarEstado(){
        $servicio = Requerimiento::find($this->id_servicio)->servicio;
        $this->colaborador = $servicio->colaborador->user->name;
        $this->estado_servicio = $servicio->estado;
    }

    public function confirmarServicio($id){
        $servicio = Requerimiento::find($id)->servicio;
        DB::table('servicio')
            ->where('id',$servicio->id)
                ->update(['estado' => 2]);
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
