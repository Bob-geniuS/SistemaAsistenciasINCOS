<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = 'asistencias';

    protected $fillable = ['uid_nfc', 'tipo', 'aula_id', 'fecha', 'hora'];

    public function aula()
    {
        return $this->belongsTo(Aula::class, 'aula_id');
    }

    protected $appends = ['fecha_hora'];

    public function getFechaHoraAttribute()
    {
        return "{$this->fecha} {$this->hora}";
    }

    public function getNombrePersonaAttribute()
    {
        if ($this->tipo === 'ESTUDIANTE') {
            $estudiante = \App\Models\Estudiante::where('uid_nfc', $this->uid_nfc)->first();

            return $estudiante ? $estudiante->nombres.' '.$estudiante->apellido_paterno : 'Desconocido';
        }

        if ($this->tipo === 'DOCENTE') {
            $docente = \App\Models\Docente::where('uid_nfc', $this->uid_nfc)->first();

            return $docente ? $docente->nombres.' '.$docente->apellido_paterno : 'Desconocido';
        }

        if ($this->tipo === 'ADMINISTRATIVO') {
            $admin = \App\Models\Administrativo::where('uid_nfc', $this->uid_nfc)->first();

            return $admin ? $admin->nombres.' '.$admin->apellido_paterno : 'Desconocido';
        }

        return 'Desconocido';
    }
}
