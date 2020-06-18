<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
    //
    protected $table = 'alumno';
    protected $fillable =[
        'nombre','edad','aprobado'
    ];
}
