<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Colaborador extends Model
{
    protected $table = 'colaboradores';

    protected $fillable = [
        'calificacion',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function servicios(): BelongsToMany
    {
        return $this->belongsToMany(TipoServicio::class, 'colaborador_servicio','id_colaborador','id_tipo_servicio')->withTimestamps()->withPivot('id');
    }

    public function etiquetas(): BelongsToMany
    {
        return $this->belongsToMany(Etiqueta::class, 'etiquetas_colaboradores','id_colaborador','id_etiqueta')->withTimestamps()->withPivot('id');
    }

    public function servicio(): HasMany
    {
        return $this->HasMany(Servicio::class,'id_colaborador');
    }

    public function ofertas(): HasMany
    {
        return $this->HasMany(Oferta::class,'id_colaborador');
    }
}
