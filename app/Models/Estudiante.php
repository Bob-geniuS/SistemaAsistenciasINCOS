<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes';

    protected $fillable = [
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'cedula_identidad',
        'uid_nfc',
        'carrera_id',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'estudiantes_cursos', 'estudiante_id', 'curso_id');
    }
}
