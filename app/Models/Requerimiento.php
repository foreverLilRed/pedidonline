<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Http;

class Requerimiento extends Model
{
    protected $table = 'requerimientos';
    protected $fillable = [
        'id_cliente', 'id_tipo_servicio','monto','estado','ubicacion','descripcion','latitud','longitud',
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

    public function calcularDistancia(){
        $destino = $this->latitud.','.$this->longitud;
        $origen = '';
        $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?destinations='.$destino.'&origins=-6.7742985,-79.8545228&units=metric&key=AIzaSyACwJVm_-WdLVJRNOgi62xHweLhP5L2F9I';
        $response = Http::get($url);
        $data = $response->json();
        $distancia = $data['rows'][0]['elements'][0]['distance']['text'];
        return $distancia;
    }
}
