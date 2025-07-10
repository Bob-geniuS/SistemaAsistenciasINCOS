<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = ['nombre', 'email', 'password', 'rol_id'];

    public function rol()
    {
        return $this->belongsTo(Role::class, 'rol_id');
    }
}
