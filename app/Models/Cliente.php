<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cliente extends Model
{
    protected $table = 'clientes';
    
    protected $fillable = [
        'domicilio',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
