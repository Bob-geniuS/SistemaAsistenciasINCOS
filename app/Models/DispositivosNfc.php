<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DispositivosNfc extends Model
{
    protected $table = 'dispositivos_nfcs';

    protected $fillable = [
        'uid_dispositivo',
        'descripcion',
        'aula_id',
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class, 'aula_id');
    }
}
