<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $table = 'aulas';

    protected $fillable = ['nombre', 'descripcion'];

    public function dispositivosNfc()
    {
        return $this->hasMany(DispositivosNfc::class, 'aula_id');
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class, 'aula_id');
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class, 'aula_id');
    }
}
