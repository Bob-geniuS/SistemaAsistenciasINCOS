<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timbre extends Model
{
    protected $table = 'timbres';

    protected $fillable = ['hora', 'descripcion'];
}
