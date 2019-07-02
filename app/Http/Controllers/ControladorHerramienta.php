<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\herramientas;
use App\tipo_herramientas;
use App\marcas;

class ControladorHerramienta extends Controller
{
    public function altaherramienta()
    {
	
		$clavequesigue = herramientas::withTrashed()->orderBy('id_herramienta','desc')
		->take(1)
		->get();
		if (count($clavequesigue)==0)
		{
	  $idHerramienta = 1;
	   }
	   else
	   {
		$idHerramienta = $clavequesigue[0]->id_herramienta+1;
	   }
	   $tipo_herramientas = tipo_herramientas::orderBy('tipo_herramienta','asc')
						  ->get();
		$marcas = marcas::orderBy('nombre_marca','asc')
						  ->get();
		return view ("conies.altaherramienta")
		->with('tipo_herramientas',$tipo_herramientas)
		->with('marcas',$marcas)
		->with('idHerramienta',$idHerramienta);
      
    }
    public function guardaherramienta(Request $request)
    {
        $id_herramienta =  $request->id_herramenta;
        $nombre_herramienta = $request->nombre_herramienta;
        $fecha_compra = $request->fecha_compra;
		$costo =  $request->costo;
        $especificaciones = $request->especificaciones;
        $serial = $request->serial;
		$id_tipo_herramienta =  $request->id_tipo_herramienta;
        $id_marca = $request->id_marca;
        
		/* $this->validate($request,[
	     'id_material'=>'required',
         'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
         'activo'=>'required'
	     ]);*/
		 
            $herra = new herramientas;
			$herra->id_herramienta =  $request->id_herramienta;
			$herra->nombre_herramienta = $request->nombre_herramienta;
			$herra->fecha_compra = $request->fecha_compra;
			$herra->costo =  $request->costo;
			$herra->especificaciones = $request->especificaciones;
			$herra->serial = $request->serial;
			$herra->id_tipo_herramienta =  $request->id_tipo_herramienta;
			$herra->id_marca = $request->id_marca;
		    if($herra->save()){
				return back()->with('msj','tipo de herramienta guardada correctamente');
			}else{
				return back();
			}
        
    }
    public function reporteherramienta()
	{
	$resultado=\DB::select("SELECT id_herramienta, nombre_herramienta, fecha_compra,
	costo, especificaciones, serial, id_tipo_herramienta, id_marca, deleted_at FROM herramientas");
	return view('conies.reporteHerramientas')
	->with('herramientas',$resultado); 
	}
	public function modificaherramienta($id_herramenta)
	{
		$herramienta = herramientas::withTrashed()->where('id_herramienta','=',$id_herramienta)
		                     ->get();
		return view ('conies.modificaherramienta')
		->with('herramienta',$herramienta[0]);
	}
    public function guardamodificaherramienta(Request $request)
	{
		$id_herramienta =  $request->id_herramenta;
        $nombre_herramienta = $request->nombre_herramienta;
        $fecha_compra = $request->fecha_compra;
		$costo =  $request->costo;
        $especificaciones = $request->especificaciones;
        $serial = $request->serial;
		$id_tipo_herramienta =  $request->id_tipo_herramienta;
        $id_marca = $request->id_marca;
      
        /*
		 $this->validate($request,[
			'id_material'=>'required',
			'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
			'activo'=>'required'
	     ]);*/
		 
	    $herra = herramientas::withTrashed()->find($id_herramenta);
	    $herra = new herramientas;
		$herra->id_herramenta =  $request->id_herramenta;
		$herra->nombre_herramienta = $request->nombre_herramienta;
		$herra->fecha_compra = $request->fecha_compra;
		$herra->costo =  $request->costo;
		$herra->especificaciones = $request->especificaciones;
		$herra->serial = $request->serial;
		$herra->id_tipo_herramienta =  $request->id_tipo_herramienta;
		$herra->id_marca = $request->id_marca;
			if($herra->save()){
				return back()->with('msj','tipo de herramienta modificada correctamente');
			}else{
				return back();
			}
	  echo "Listo para modificar";
	}
	
	public function eliminaherramienta($id_herramenta)
	{
			if(herramientas::withTrashed()->find($id_herramenta)->delete()){
				return back()->with('msj','tipo de herramienta inhabilitada correctamente');
			}else{
				return back();
			}
	}
	public function restauraherramienta($id_herramenta)
	{

	if(herramientas::withTrashed()->where('id_herramenta',$id_herramenta)->restore()){
		return back()->with('msj','tipo de herramienta restaurada correctamente');
	}else{
		return back();
	}
}
     public function efisicaherramienta($id_herramenta)
	{
		if(herramientas::withTrashed()->where('id_herramenta',$id_herramenta)->forceDelete()){
			return back()->with('msj','tipo de herramienta eliminada permanentemente');
		}else{
			return back();
		}
	}
}