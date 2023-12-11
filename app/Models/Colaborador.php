<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
