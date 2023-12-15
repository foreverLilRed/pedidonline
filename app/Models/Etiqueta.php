<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Etiqueta extends Model
{
    protected $table = 'etiquetas';
    protected $fillable = [
        'nombre',
    ];

    public function colaboradores(): BelongsToMany
    {
        return $this->belongsToMany(Colaborador::class, 'etiquetas_colaboradores','id_etiqueta','id_colaborador')->withTimestamps();
    }
}
