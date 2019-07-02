<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class marcas extends Model{
	use SoftDeletes;
	protected $primaryKey = 'id_marca';
	protected $fillable = ['id_marca','nombre_marca'];
	protected $date = ['deleted_at'];
}
