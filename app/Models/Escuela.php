<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    use HasFactory;

    public function comuna()
    {
        return $this->belongsTo(Comuna::class);
    }

    public function mesas()
    {
       return $this->hasMany(Mesa::class);
    }
}
