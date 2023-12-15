<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleColaboradorServicio extends Model
{
    protected $table = 'colaborador_servicio';

    protected $fillable = [
        'id_colaborador', 'id_tipo_servicio',
    ];
}
