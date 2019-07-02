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
        $id_herramienta =  $request->id_herramienta;
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
    public function reporteherramientas()
	{
	$resultado=\DB::select("SELECT h.id_herramienta, h.nombre_herramienta, h.fecha_compra, h.costo, h.especificaciones, h.serial,
    t.tipo_herramienta AS tipoherramienta, m.nombre_marca AS marca, h.deleted_at FROM herramientas AS h 
				INNER JOIN tipo_herramientas AS t ON h.id_tipo_herramienta = t.id_tipo_herramienta
				INNER JOIN marcas AS m ON h.id_marca = m.id_marca;");
	
	return view('conies.reporteHerramientas')
	->with('herramientas',$resultado); 
	}
	public function modificaherramienta($id_herramienta)
	{
		
	  
		$herramienta = herramientas::withTrashed()->where('id_herramienta','=',$id_herramienta)
		->get();
		$id_tipo_herramienta = $herramienta[0]->id_tipo_herramienta;
		$tipoherramienta = tipo_herramientas::where('id_tipo_herramienta','=',$id_tipo_herramienta)
		->get();
		$otrostipoherramientas = tipo_herramientas::where('id_tipo_herramienta','!=',$id_tipo_herramienta)
		->get();
		
		$id_marca = $herramienta[0]->id_marca;
		$marca = marcas::where('id_marca','=',$id_marca)
		->get();
		$otrasmarcas = marcas::where('id_marca','!=',$id_marca)
		->get();

		return view ('conies.modificaherramienta')
		->with('herramienta',$herramienta[0])
		->with('id_tipo_herramienta',$id_tipo_herramienta)
	    ->with('tipoherramienta',$tipoherramienta[0]->tipo_herramienta)
		->with('otrostipoherramientas',$otrostipoherramientas)
		->with('id_marca',$id_marca)
	    ->with('marca',$marca[0]->nombre_marca)
		->with('otrasmarcas',$otrasmarcas);
	}
    public function guardamodificaherramienta(Request $request)
	{
		$id_herramienta =  $request->id_herramienta;
        $nombre_herramienta = $request->nombre_herramienta;
        $fecha_compra = $request->fecha_compra;
		$costo =  $request->costo;
        $especificaciones = $request->especificaciones;
        $serial = $request->serial;
      
        /*
		 $this->validate($request,[
			'id_material'=>'required',
			'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
			'activo'=>'required'
	     ]);*/
		 
	    $herra = herramientas::withTrashed()->find($id_herramienta);
		$herra->id_herramienta =  $request->id_herramienta;
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
	
	public function eliminaherramienta($id_herramienta)
	{
			if(herramientas::withTrashed()->find($id_herramienta)->delete()){
				return back()->with('msj','tipo de herramienta inhabilitada correctamente');
			}else{
				return back();
			}
	}
	public function restauraherramienta($id_herramienta)
	{

	if(herramientas::withTrashed()->where('id_herramienta',$id_herramienta)->restore()){
		return back()->with('msj','tipo de herramienta restaurada correctamente');
	}else{
		return back();
	}
}
     public function efisicaherramienta($id_herramienta)
	{
		if(herramientas::withTrashed()->where('id_herramienta',$id_herramienta)->forceDelete()){
			return back()->with('msj','tipo de herramienta eliminada permanentemente');
		}else{
			return back();
		}
	}
}