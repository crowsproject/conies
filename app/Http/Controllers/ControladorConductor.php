<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\conductores;

class ControladorConductor extends Controller
{
    public function conductores()
    {
    	# code...
    	$conductores = conductores::withTrashed()->orderBy('id_conductor','asc')->get();
        return view('conies.listaConductores')->with('conductores',$conductores);
    }
    public function altaConductor()
    {
    	$clavequesigue = conductores::withTrashed()->orderBy('id_conductor','desc')->take(1)->get();
    	$count = count($clavequesigue);
    	if ($count ==0) {
    		$idcs = 1;
    	}else{
    		$idcs = $clavequesigue[0]->id_conductor+1;
    	}
    	return view('conies.altaConductor')->with(['idcs'=>$idcs]);
    }
    public function guardaConductor(Request $request)
    {
        $this->validate($request,[
            'nombre_conductores'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/'],
            'apellido_paterno_conductores'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/'],
            'apellido_materno_conductores'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/'],
            'edad'=>'required|numeric|min:18',
            'direccion'=>'required',
            'telefono'=>['regex:/^[0-9]{10}$/'],
            'email'=>'required|email',
            'rfc'=>['regex:/^[A-ZÑ&]{3,4}([0-9]{2})([0-1][0-9])([0-3][0-9])[A-Z0-9]{2}[0-9A]$/iu'],
            'razon_social'=>'required',
            'identificacion'=>'required|image|mimes:gif,jpeg,png',
            'licencia_conduccion'=>'required|image|mimes:gif,jpeg,png'
        ]);
        //codigo para subir identificación
        $iden=$request->file('identificacion');
        $lice=$request->file('licencia_conduccion');
        $ldate=date('Ymd_His_');

        $img1=$iden->getClientOriginalName();
        $iden2=$ldate.' iden'.$img1;
        \Storage::disk('local')->put($iden2, \File::get($iden));

        $img2=$lice->getClientOriginalName();
        $lice2 = $ldate.' licencia'.$img2;
        \Storage::disk('local')->put($lice2, \File::get($lice));

            $conductor = new conductores;
            $conductor ->id_conductor=$request->id_conductor;
            $conductor ->nombre_conductores=$request->nombre_conductores;
            $conductor ->apellido_paterno_conductores=$request->apellido_paterno_conductores;
            $conductor ->apellido_materno_conductores=$request->apellido_materno_conductores;
            $conductor ->edad=$request->edad;
            $conductor ->direccion=$request->direccion;
            $conductor ->telefono=$request->telefono;
            $conductor ->email=$request->email;
            $conductor ->rfc=$request->rfc;
            $conductor ->razon_social=$request->razon_social;
            $conductor ->identificacion=$iden2;
            $conductor ->licencia_conduccion=$lice2;
            $conductor->save();
            echo "<center>Registro Completo</center>";
    }

    //Modificaciones
    public function modConductor($id_conductor)
    {
        $conductor = conductores::withTrashed()->where('id_conductor',$id_conductor)->get();
        return view('conies.modConductor')->with('conductor',$conductor[0]);
    }
    public function guardaCambiosC(Request $request)
    {
        $this->validate($request,[
            'nombre_conductores'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/'],
            'apellido_paterno_conductores'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/'],
            'apellido_materno_conductores'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/'],
            'edad'=>'required|numeric|min:18',
            'direccion'=>'required',
            'telefono'=>['regex:/^[0-9]{10}$/'],
            'email'=>'required|email',
            'rfc'=>['regex:/^[A-ZÑ&]{3,4}([0-9]{2})([0-1][0-9])([0-3][0-9])[A-Z0-9]{2}[0-9A]$/iu'],
            'razon_social'=>'required'
        ]);
        $con = conductores::withTrashed()->where('id_conductor',$request->id_conductor)->get();
        $iden=$request->file('identificacion');
        $lice=$request->file('licencia_conduccion');
        $ldate=date('Ymd_His_');
        if ($iden!="") {
            \Storage::delete($con[0]->identificacion);
            $img1=$iden->getClientOriginalName();
            $iden2=$ldate.' iden'.$img1;
            \Storage::disk('local')->put($iden2, \File::get($iden));
        }
        if ($lice!="") {
            \Storage::delete($con[0]->licencia_conduccion);
            $img2=$lice->getClientOriginalName();
            $lice2 = $ldate.' licencia'.$img2;
            \Storage::disk('local')->put($lice2, \File::get($lice));
        }
        $conductor = conductores::find($request->id_conductor);
        $conductor ->id_conductor=$request->id_conductor;
        $conductor ->nombre_conductores=$request->nombre_conductores;
        $conductor ->apellido_paterno_conductores=$request->apellido_paterno_conductores;
        $conductor ->apellido_materno_conductores=$request->apellido_materno_conductores;
        $conductor ->edad=$request->edad;
        $conductor ->direccion=$request->direccion;
        $conductor ->telefono=$request->telefono;
        $conductor ->email=$request->email;
        $conductor ->rfc=$request->rfc;
        $conductor ->razon_social=$request->razon_social;
        if ($iden!="") {
            $conductor ->identificacion=$iden2;
        }
        if ($lice!="") {
            $conductor ->licencia_conduccion=$lice2;
        }
        $conductor->save();
        echo "<center>Cambios Guardados</center>";
    }
    public function suspenderConductor($id_conductor)
    {
        try {
            conductores::find($id_conductor)->delete();
            echo "<center>Conductor Suspendido Correctamente</center>";
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function activarConductor($id_conductor)
    {
        try {
            conductores::withTrashed()->where('id_conductor',$id_conductor)->restore();
            echo "<center>Conductor Restaurado Correctamente</center>";
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function eliminaCondutor($id_conductor)
    {
        try {
            conductores::withTrashed()->where('id_conductor',$id_conductor)->forceDelete();
            echo "<center>Conductor Eliminado Correctamente</center>";
        } catch (Exception $e) {
            echo $e;
        }
    }
}
