<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\clientes;

class ControladorCliente extends Controller
{
    public function altacliente()
    {
          
                $clavequesigue = clientes::withTrashed()->orderBy('id_cliente','desc')
                ->take(1)
                ->get();
                if (count($clavequesigue)==0)
                {
              $idClientes = 1;
               }
               else
               {
                $idClientes = $clavequesigue[0]->id_cliente+1;
               }
            return view ("conies.altacliente")
                   ->with('idClientes',$idClientes);
           
    }

    public function guardacliente(Request $request)
    {
        $id_cliente =  $request->id_cliente;
        $nombre_cliente = $request->nombre_cliente;
        $apellido_materno_cliente = $request->apellido_materno_cliente;
        $apellido_paterno_cliente = $request->apellido_paterno_cliente;
        $edad = $request->edad;
        $direccion = $request->direccion;
        $telefono = $request->telefono;
        $email = $request->email;
        $identificacion = $request->identificacion;
		$rfc = $request->rfc;
        $razon_social = $request->razon_social;
        $comprobante_domiciliario = $request->comprobante_domiciliario;

		/* $this->validate($request,[
            'id_cliente'=>'required',
             'nombre_cliente'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'apellido_materno_cliente'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'apellido_paterno_cliente'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'empresa'=>'required|regex:/^[A-Z,a-z, ,ñ,é,ó,á,í,ú,1,2,3,4,5,6,7,8,9]+$/',
             'calle'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'num'=>'required|numeric',
             'localidad'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'activo'=>'required'
	     ]);*/
	 
            $client = new clientes;
            $client->id_cliente =  $request->id_cliente;
            $client->nombre_cliente = $request->nombre_cliente;
            $client->apellido_materno_cliente = $request->apellido_materno_cliente;
            $client->apellido_paterno_cliente = $request->apellido_paterno_cliente;
			$client->edad = $request->edad;
			$client->direccion = $request->direccion;
			$client->telefono = $request->telefono;
			$client->email = $request->email;
			$client->identificacion = $request->identificacion;
			$client->rfc = $request->rfc;
			$client->razon_social = $request->razon_social;
			$client->comprobante_domiciliario = $request->comprobante_domiciliario;
		    if($client->save()){
				return back()->with('msj','Cliente guardado correctamente');
			}else{
				return back();
			}
    }
    public function reporteclientes()
	{
       
        	$clientes=clientes::withTrashed()->orderBy('id_cliente','asc')
	          ->get();
	  return view('conies.reporteCliente')
	  ->with('clientes',$clientes);   
        
         
    }
    public function modificacliente($id_cliente)
	{
		$cliente = clientes::withTrashed()->where('id_cliente','=',$id_cliente)
		                     ->get();
		return view ('conies.modificacliente')
		->with('cliente',$cliente[0]);
	}
    public function guardamodificacliente(Request $request)
	{
		$id_cliente =  $request->id_cliente;
        $nombre_cliente = $request->nombre_cliente;
        $apellido_materno_cliente = $request->apellido_materno_cliente;
        $apellido_paterno_cliente = $request->apellido_paterno_cliente;
        $edad = $request->edad;
        $direccion = $request->direccion;
        $telefono = $request->telefono;
        $email = $request->email;
        $identificacion = $request->identificacion;
		$rfc = $request->rfc;
        $razon_social = $request->razon_social;
        $comprobante_domiciliario = $request->comprobante_domiciliario;
        
		/* $this->validate($request,[
            'id_cliente'=>'required',
             'nombre_cliente'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'apellido_materno_cliente'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'apellido_paterno_cliente'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'empresa'=>'required|regex:/^[A-Z,a-z, ,ñ,é,ó,á,í,ú,1,2,3,4,5,6,7,8,9]+$/',
             'calle'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'num'=>'required|numeric',
             'localidad'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/',
             'activo'=>'required'
	     ]);*/
		 
	        $client = clientes::withTrashed()->find($id_cliente);
            $client->id_cliente =  $request->id_cliente;
            $client->nombre_cliente = $request->nombre_cliente;
            $client->apellido_materno_cliente = $request->apellido_materno_cliente;
            $client->apellido_paterno_cliente = $request->apellido_paterno_cliente;
			$client->edad = $request->edad;
			$client->direccion = $request->direccion;
			$client->telefono = $request->telefono;
			$client->email = $request->email;
			$client->identificacion = $request->identificacion;
			$client->rfc = $request->rfc;
			$client->razon_social = $request->razon_social;
			$client->comprobante_domiciliario = $request->comprobante_domiciliario;
			if($client->save()){
                return back()->with('msj','Cliente modificado correctamente');
			}else{
				return back();
			}
	}
	public function eliminacliente($id_cliente)
	{
			if(clientes::withTrashed()->find($id_cliente)->delete()){
				return back()->with('msj','Cliente inhabilitado correctamente');
			}else{
				return back();
            }
            
    }
    
    public function restauracliente($id_cliente)
	{

	if(clientes::withTrashed()->where('id_cliente',$id_cliente)->restore()){
		return back()->with('msj','Cliente restaurado correctamente');
	}else{
		return back();
	}
}
     public function efisicacliente($id_cliente)
	{
		if(clientes::withTrashed()->where('id_cliente',$id_cliente)->forceDelete()){
			return back()->with('msj','Cliente eliminado permanentemente');
		}else{
			return back();
		}
	}
}
