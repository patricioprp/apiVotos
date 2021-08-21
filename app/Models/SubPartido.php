<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubPartido extends Model
{
    use HasFactory;

    public function partido()
    {
        return $this->belongsTo(Partido::class);
    }
}
