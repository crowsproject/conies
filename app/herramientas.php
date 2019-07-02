<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class herramientas extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id_herramienta';  
    protected $fillable=['id_herramienta','nombre_herramienta','fecha_compra','costo',
	'especificaciones','serial','id_tipo_herramienta','id_marca'];
    protected $date=['deleted_at'];
    
}
