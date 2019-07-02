<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\marcas;

class ControladorMarca extends Controller
{
    public function marcas()
    {
    	$marcas = marcas::withTrashed()->orderBy('id_marca','desc')->get();
    	return view('conies.listaMarcas')->with('marcas',$marcas);
    }
    public function altaMarca()
    {
    	$clavequesigue = marcas::withTrashed()->orderBy('id_marca','desc')->take(1)->get();
    	$count = count($clavequesigue);
    	if ($count ==0) {
    		$idcs = 1;
    	}else{
    		$idcs = $clavequesigue[0]->id_marca+1;
    	}
    	return view('conies.altaMarca')->with('idcs',$idcs);
    }
    public function guardaMarca(Request $request)
    {
    	$this->validate($request,[
    		'nombre_marca'=>'required'
    	]);
    	$marca = new marcas;
    	$marca->id_marca=$request->id_marca;
    	$marca->nombre_marca=$request->nombre_marca;
    	$marca->save();
    	echo "<center>Marca Registrada</center>";
    }
    public function modMarca($id_marca)
    {
        $marca = marcas::withTrashed()->where('id_marca',$id_marca)->get();
        return view('conies.modMarca')->with('marca',$marca[0]);
    }
    public function guardaCambiosM(Request $request)
    {
        $this->validate($request,[
            'nombre_marca'=>'required'
        ]);
        $marca = marcas::find($request->id_marca);
        $marca->nombre_marca = $request->nombre_marca;
        $marca->save();
        echo "Registro Modificado";
    }
    public function suspenderMarca($id_marca)
    {
        try {
            marcas::find($id_marca)->delete();
            return back();
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function activarMarca($id_marca)
    {
        try {
            marcas::withTrashed()->where('id_marca',$id_marca)->restore();
            return back();
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function eliminarMarca($id_marca)
    {
        try {
            marcas::withTrashed()->where('id_marca',$id_marca)->forceDelete();
            return back();
        } catch (Exception $e) {
            echo $e;
        }
    }
}
