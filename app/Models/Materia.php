<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materias';

    protected $fillable = ['nombre_materia', 'codigo', 'descripcion'];

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'materia_id');
    }
}
