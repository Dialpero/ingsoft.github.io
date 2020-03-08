<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    protected $fillable = ['facultad','id_Dept','nombre','estado','id_Secretaria'];
    protected $table = ('departamentos');
}
