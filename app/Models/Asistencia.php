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
}
