<?php

namespace App\Livewire;

use App\Models\TipoServicio;
use Livewire\Component;

class AgregarTipoServicio extends Component
{
    public $tipoModalStatus = false;
    public $nombre, $descripcion;

    public function rules() 
    {
        return [
            'nombre' => 'required|min:2',
            'descripcion' => 'required|min:2',
        ];
    }

    public function saveTipo(){
        $this->validate();
        TipoServicio::create([
            "nombre" => $this->nombre,
            "descripcion" => $this->descripcion,
        ]);
        $this->dispatch('tipo_guardado');
        $this->cleanInputs();
    }

    public function cleanInputs(){
        $this->nombre = '';
        $this->descripcion = '';
    } 
    public function render()
    {
        return view('livewire.agregar-tipo-servicio');
    }
}
