<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Requerimiento extends Model
{
    protected $table = 'requerimientos';
    protected $fillable = [
        'id_cliente', 'id_tipo_servicio','monto','estado','ubicacion','descripcion',
    ];

    public function clientes(): BelongsTo
    {
        return $this->belongsTo(Cliente::class,'id_cliente');
    }

    public function servicios(): BelongsTo
    {
        return $this->belongsTo(TipoServicio::class,'id_tipo_servicio');
    }

    public function servicio(): HasOne
    {
        return $this->HasOne(Servicio::class,'id_requerimiento');
    }

    public function ofertas(): HasMany
    {
        return $this->hasMany(Oferta::class,'id_requerimiento');
    }
}
