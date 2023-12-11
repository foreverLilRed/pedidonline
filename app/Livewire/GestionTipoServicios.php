<?php

namespace App\Livewire;

use Livewire\WithPagination;
use App\Models\TipoServicio;
use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\DB;

class GestionTipoServicios extends Component
{
    use WithPagination;
    public $search = '';
    public $nombre, $descripcion, $id;
    public $tipoModalStatus = false;

    public function Borrar($id){
        TipoServicio::find($id)->delete();
    }

    public function Editar(TipoServicio $servicio){
        $this->tipoModalStatus = true;
        $this->nombre = $servicio->nombre;
        $this->descripcion = $servicio->descripcion;
        $this->id = $servicio->id;
    }

    public function confirmar(){
        DB::table('tipo_servicios')
              ->where('id', $this->id)
              ->update(['nombre' => $this->nombre,'descripcion' => $this->descripcion]);

        $this->dispatch('editado');
    }

    public function updatingSearch(){
        $this->resetPage();
    }
    public function search()
    {
        $this->resetPage();
    }

    #[On('tipo_guardado')]
    public function render()
    {
        return view('livewire.gestion-tipo-servicios',[
            'servicios' => TipoServicio::where('nombre','like','%'.$this->search.'%')->paginate(4),
        ]);
    }
}
