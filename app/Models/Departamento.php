<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    public function seccion()
    {
        return $this->belongsTo(Seccion::class);
    }

    public function comunas()
    {
       return $this->hasMany(Comuna::class);
    }
}
