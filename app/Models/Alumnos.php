<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;

    public function niveles(){
        return $this->belongsTo(Niveles::class, 'nivel_id', 'id');
    }
}
