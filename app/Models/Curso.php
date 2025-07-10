<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';

    protected $fillable = ['materia_id', 'carrera_id', 'gestion'];

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'materia_id');
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }

    public function docentes()
    {
        return $this->belongsToMany(Docente::class, 'docentes_cursos', 'curso_id', 'docente_id');
    }

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'estudiantes_cursos', 'curso_id', 'estudiante_id');
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class, 'curso_id');
    }
}
