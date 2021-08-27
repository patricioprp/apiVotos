<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    use HasFactory;

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function escuelas()
    {
       return $this->hasMany(Escuela::class);
    }
}
