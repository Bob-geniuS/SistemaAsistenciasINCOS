<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docentes';

    protected $fillable = [
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'documento',
        'uid_nfc',
    ];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'docentes_cursos', 'docente_id', 'curso_id');
    }
}
