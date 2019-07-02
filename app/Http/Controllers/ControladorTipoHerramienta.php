<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\tipo_herramientas;

class ControladorTipoHerramienta extends Controller
{
    public function altatipoherramienta()
    {
		$clavequesigue = tipo_herramientas::withTrashed()
		->orderBy('id_tipo_herramienta','desc')
		->take(1)
		->get();
		if (count($clavequesigue)==0)
		{
	  $idTipoHerramienta = 1;
	   }
	   else
	   {
		$idTipoHerramienta = $clavequesigue[0]->id_tipo_herramienta+1;
	   }
		return view ("conies.altatipoherramienta")
		->with('idTipoHerramienta',$idTipoHerramienta);
      
    }
    public function guardatipoherramienta(Request $request)
    {
        $id_tipo_herramienta =  $request->id_tipo_herramienta;
        $tipo_herramienta = $request->tipo_herramienta;
        
		 /*$this->validate($request,[
	     'id_material'=>'required',
         'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
         'activo'=>'required'
	     ]);*/
		 
            $tip = new tipo_herramientas;
			$tip->id_tipo_herramienta = $request->id_tipo_herramienta;
			$tip->tipo_herramienta = $request->tipo_herramienta;
		    if($tip->save()){
				return back()->with('msj','tipo de herramienta guardada correctamente');
			}else{
				return back();
			}
        
    }
    public function reportetipoherramienta()
	{
		$resultado=\DB::select("SELECT id_tipo_herramienta, tipo_herramienta, deleted_at FROM tipo_herramientas");
	  return view('conies.reporteTipoHerramienta')
	  ->with('herramientas',$resultado); 

	}
	public function modificatipoherramienta($id_tipo_herramienta)
	{
		$tipo_herramienta = tipo_herramientas::withTrashed()->where('id_tipo_herramienta','=',$id_tipo_herramienta)
		                     ->get();
		return view ('conies.modificatipoherramienta')
		->with('tipo_herramienta',$tipo_herramienta[0]);
	}
    public function guardamodificatipoherramienta(Request $request)
	{
		$id_tipo_herramienta =  $request->id_tipo_herramienta;
        $tipo_herramienta = $request->tipo_herramienta;
        
		/* $this->validate($request,[
			'id_material'=>'required',
			'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
			'activo'=>'required'
	     ]);*/
	       
   		    $tip = tipo_herramientas::withTrashed()->find($id_tipo_herramienta);
	        $tip->id_tipo_herramienta = $request->id_tipo_herramienta;
			$tip->tipo_herramienta = $request->tipo_herramienta;
			if($tip->save()){
				return back()->with('msj','tipo de herramienta modificada correctamente');
			}else{
				return back();
			}
	}
	
	public function eliminatipoherramienta($id_tipo_herramienta)
	{
			if(tipo_herramientas::withTrashed()->find($id_tipo_herramienta)->delete()){
				return back()->with('msj','tipo de herramienta inhabilitada correctamente');
			}else{
				return back();
			}
	}
	public function restauratipoherramienta($id_tipo_herramienta)
	{

	if(tipo_herramientas::withTrashed()->where('id_tipo_herramienta',$id_tipo_herramienta)
		->restore()){
		return back()->with('msj','tipo de herramienta restaurada correctamente');
	}else{
		return back();
	}
}
     public function efisicatipoherramienta($id_tipo_herramienta)
	{
		if(tipo_herramientas::withTrashed()->where('id_tipo_herramienta',$id_tipo_herramienta)
			->forceDelete()){
			return back()->with('msj','tipo de herramienta eliminada permanentemente');
		}else{
			return back();
		}
	}
}
