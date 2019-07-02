<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class conductores extends Model
{
    use SoftDeletes;
    protected $primaryKey ='id_conductor';
    protected $fillable = ['id_conductor','nombre_conductores','apellido_paterno_conductores','apellido_materno_conductores',
    'edad','direccion','telefono','email','identificacion','rfc','razon_social','licencia_conduccion'];
    protected $date=['deleted_at'];
}
