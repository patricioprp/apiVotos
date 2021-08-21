<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    public function mesas()
    {
       return $this->belongsToMany(Mesa::class);
    }

    public function subPartidos()
    {
       return $this->hasMany(SubPartido::class);
    }
}
