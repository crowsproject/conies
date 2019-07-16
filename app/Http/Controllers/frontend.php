<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\tblproductos;
use App\herramientas;
use App\tipo_herramientas;
use Session;

class frontend extends Controller
{
    public function productos()
    { 
            /*$produ =\DB::select("SELECT * FROM herramientas ORDER BY id_herramienta ASC");*/
            
            $produ=\DB::select("SELECT h.id_herramienta,h.nombre_herramienta,h.costo,h.especificaciones,h.imagen,t.id_tipo_herramienta,t.tipo_herramienta AS tip
                                    FROM herramientas AS h 
                                    INNER JOIN tipo_herramientas AS t ON t.id_tipo_herramienta =  h.id_tipo_herramienta ORDER BY h.id_herramienta DESC LIMIT 6");
        
            return view ('conies/home')
                    ->with('produ',$produ);
    }



    public function guardacarrito(Request $request)
    {
       
        $request->all();


                   /*$dato = datos::find($idd);
                        $dato->idd = $request->idd;
                        if($file!="")
                    {	
                    $dato->archivo = $img2;
                    }
                $dato->nombre = $request->nombre;
                $dato->ap =$request->ap;
                $dato->am= $request->am;
                        $dato->edad=$request->edad;
                        $dato->telefono=$request->telefono;
                        $dato->calle=$request->calle;
                        $dato->numero=$request->numero;
                        $dato->calle1=$request->calle1;
                        $dato->calle2=$request->calle2;
                        $dato->colonia=$request->colonia;
                        $dato->municipio=$request->municipio;
                        $dato->ciudad=$request->ciudad;
                        $dato->cp=$request->cp;
                        $dato->referencia=$request->referencia;
                        $dato->save();
                */
                        return view('conies');
    }
    
}
