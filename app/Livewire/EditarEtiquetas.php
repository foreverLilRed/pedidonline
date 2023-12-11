<?php

namespace App\Livewire;

use App\Models\Etiqueta;
use Livewire\Component;

class EditarEtiquetas extends Component
{
    public $search = '';
    public $nombre_add;
    public function agregar(){
        $etiqueta = new Etiqueta([
            'nombre' => $this->nombre_add,
        ]);

        $etiqueta->save();

        $this->nombre_add = '';
    }
    public function eliminar($id){
        Etiqueta::find($id)->delete();
    }
    public function render()
    {
        return view('livewire.editar-etiquetas',[
            'etiquetas' => Etiqueta::where('nombre','like','%'.$this->search.'%')->paginate(40),
        ]);
    }
}
