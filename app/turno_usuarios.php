<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class turno_usuarios extends Model
{
    protected $fillable  = ['cedulaUsuario','id_tipotramite','Num_Turno','id_estado_turno','prioridad'];
}
