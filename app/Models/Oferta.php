<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Oferta extends Model
{
    protected $table = 'ofertas_colaboradores';

    protected $fillable = [
        'id_colaborador'. 'id_requerimiento', 'oferta_colaborador',
    ];

    public function requerimiento(): BelongsTo
    {
        return $this->belongsTo(Requerimiento::class);
    }

    public function colaborador(): BelongsTo
    {
        return $this->belongsTo(Colaborador::class);
    }
}
