<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_tramites extends Model
{
  protected $fillable  = ['id_tipo_tramite','Descripcion','Num_turno'];
}
