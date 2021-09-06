<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'escuela_id',
        'estoy_en_mesa',
        'cierre_votacion',
        'votos_totales',
        'nro_mesa',
    ];

    public function escuela()
    {
        return $this->belongsTo(Escuela::class);
    }

    public function user()
    {
       return $this->hasOne(User::class);
    }

    public function subPartidos()
    {
       return $this->belongsToMany(SubPartido::class)
       ->withPivot('voto_diputado','voto_senador');
    }
}
