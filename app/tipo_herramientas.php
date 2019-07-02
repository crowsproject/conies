<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tipo_herramientas extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id_tipo_herramienta';  
    protected $fillable=['id_tipo_herramienta','tipo_herramienta'];
    protected $date=['deleted_at'];
    
}
