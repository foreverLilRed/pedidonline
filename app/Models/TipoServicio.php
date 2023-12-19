<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoServicio extends Model
{
    protected $table = 'tipo_servicios';

    protected $fillable = [
        'nombre', 'descripcion',
    ];

    public function colaboradores(): BelongsToMany
    {
        return $this->belongsToMany(Colaborador::class, 'colaborador_servicio','id_tipo_servicio','id_colaborador')->withTimestamps();
    }

    public function requerimientos(): HasMany
    {
        return $this->hasMany(Requerimiento::class,'id_tipo_servicio');
    }
}
