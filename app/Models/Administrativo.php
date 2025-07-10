<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    protected $table = 'administrativos';

    protected $fillable = [
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'documento',
        'uid_nfc',
    ];
}
