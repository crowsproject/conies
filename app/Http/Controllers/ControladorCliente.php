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
        $apellido_paterno_cliente = $request->apellido_paterno_cliente;
        $apellido_materno_cliente = $request->apellido_materno_cliente;
		$edad = $request->edad;
		$direccion = $request->direccion;
		$telefono = $request->telefono;
        $email = $request->email;
		$rfc = $request->rfc;
		$razon_social = $request->razon_social;
		
		 $this->validate($request,[
            'nombre_cliente'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/'],
            'apellido_paterno_cliente'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/'],
            'apellido_materno_cliente'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/'],
            'edad'=>'required|numeric|min:18',
            'direccion'=>'required',
            'telefono'=>'required',
            'email'=>'required|email',
			'identificacion'=>'image|mimes:gif,jpeg,png',
            'rfc'=>'required',
            'razon_social'=>'required',
            'comprobante_domiciliario'=>'image|mimes:gif,jpeg,png'
        ]);
		
		$lice3 = $request->file('identificacion');
		$lice = $request->file('comprobante_domiciliario');
       
		if($lice3!="")
		 {	
		$ldate=date('Ymd_His_');
		$img3=$lice3->getClientOriginalName();
        $lice4 = $ldate.$img3;
        \Storage::disk('local')->put($lice4, \File::get($lice3));
		}
		 else
		 {
		 $img2= 'sinfoto.png';
		 }
		if($lice!="")
		 {	
        $img2=$lice->getClientOriginalName();
        $lice2 = $ldate.$img2;
        \Storage::disk('local')->put($lice2, \File::get($lice));
		}
		 else
		 {
		 $img2= 'sinfoto.png';
		 }
		

            $cliente = new clientes;
            $cliente ->id_cliente=$request->id_cliente;
            $cliente ->nombre_cliente=$request->nombre_cliente;
            $cliente ->apellido_paterno_cliente=$request->apellido_paterno_cliente;
            $cliente ->apellido_materno_cliente=$request->apellido_materno_cliente;
            $cliente ->edad=$request->edad;
            $cliente ->direccion=$request->direccion;
            $cliente ->telefono=$request->telefono;
            $cliente ->email=$request->email;
            $cliente ->rfc=$request->rfc;
            $cliente ->razon_social=$request->razon_social;
			$cliente ->identificacion=$lice4;
            $cliente ->comprobante_domiciliario=$lice2;
            if($cliente->save()){
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
        $apellido_paterno_cliente = $request->apellido_paterno_cliente;
        $apellido_materno_cliente = $request->apellido_materno_cliente;
		$edad = $request->edad;
		$direccion = $request->direccion;
		$telefono = $request->telefono;
        $email = $request->email;
		$rfc = $request->rfc;
		$razon_social = $request->razon_social;
		
		
		 $this->validate($request,[
            'nombre_cliente'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/'],
            'apellido_paterno_cliente'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/'],
            'apellido_materno_cliente'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/'],
            'edad'=>'required|numeric|min:18',
            'direccion'=>'required',
            'telefono'=>'required',
            'email'=>'required|email',
			'identificacion'=>'image|mimes:gif,jpeg,png',
            'rfc'=>'required',
            'razon_social'=>'required',
            'comprobante_domiciliario'=>'image|mimes:gif,jpeg,png'
        ]);
		
		$lice3=$request->file('identificacion');
        $lice=$request->file('comprobante_domiciliario');
        
		 
		if ($lice3!="") {
			$ldate=date('Ymd_His_');
            $img1=$lice3->getClientOriginalName();
            $iden2=$ldate.$img1;
            \Storage::disk('local')->put($iden2, \File::get($lice3));
        }
		else
		 {
		 $img1= 'sinfoto.png';
		 }
        if ($lice!="") {
			$ldate=date('Ymd_His_');
            $img2=$lice->getClientOriginalName();
            $lice2 = $ldate.$img2;
            \Storage::disk('local')->put($lice2, \File::get($lice));
        }
		else
		 {
		 $img2= 'sinfoto.png';
		 }
	        $client = clientes::withTrashed()->find($id_cliente);
            $client->id_cliente =  $request->id_cliente;
            $client->nombre_cliente = $request->nombre_cliente;
            $client->apellido_materno_cliente = $request->apellido_materno_cliente;
            $client->apellido_paterno_cliente = $request->apellido_paterno_cliente;
			$client->edad = $request->edad;
			$client->direccion = $request->direccion;
			$client->telefono = $request->telefono;
			$client->email = $request->email;
			$client->rfc = $request->rfc;
			$client->razon_social = $request->razon_social;
			 if ($lice3!="") {
            $client ->identificacion=$iden2;
			}
			if ($lice!="") {
            $client ->comprobante_domiciliario=$lice2;
			}
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