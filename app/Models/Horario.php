<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';

    protected $fillable = ['curso_id', 'aula_id', 'dia', 'hora_inicio', 'hora_fin'];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    public function aula()
    {
        return $this->belongsTo(Aula::class, 'aula_id');
    }
}
