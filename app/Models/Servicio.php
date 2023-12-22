<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Servicio extends Model
{
    protected $table = 'servicio';

    protected $fillable = [
        'descripcion', 'monto','id_colaborador','id_medio_pago','estado','id_requerimiento',
    ];

    public function colaborador(): BelongsTo
    {
        return $this->belongsTo(Colaborador::class,'id_colaborador');
    }

    public function requerimiento(): BelongsTo
    {
        return $this->belongsTo(Requerimiento::class,'id_requerimiento');
    }

}
