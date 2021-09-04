<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'escuela_id',
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
       return $this->belongsToMany(SubPartido::class);
    }
}
