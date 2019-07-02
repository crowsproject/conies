@extends('conies.principal')
@section('contenido')
<table border="1">
 <thead>
 <tr>
 <th>Clave tipo de herramienta</th>
 <th>Tipo de herramienta</th>
 </tr>
 </thead>
 <tbody>
 @foreach($tipo_herramientas as $tip)
 <tr>
 <td>{{$tip->id_tipo_herramienta}}</td>
 <td>{{$tip->tipo_herramienta}}</td>
 <td>
 <div>
 @if($tip->deleted_at=="")
	 
 <a href="{{URL::action('ControladorTipoHerramienta@modificatipoherramienta',['id_tipo_herramienta'=>$tip->id_tipo_herramienta])}}"> 
 MODIFICAR
 </a>

 <a href="{{URL::action('ControladorTipoHerramienta@eliminatipoherramienta',['id_tipo_herramienta'=>$tip->id_tipo_herramienta])}}"> 
 INHABILITAR
 </a> 
 
 @else
	 
 <a href="{{URL::action('ControladorTipoHerramienta@restauratipoherramienta',['id_tipo_herramienta'=>$tip->id_tipo_herramienta])}}"> 
 RESTAURAR
 </a> 

 <a href="{{URL::action('ControladorTipoHerramienta@efisicatipoherramienta',['id_tipo_herramienta'=>$tip->id_tipo_herramienta])}}"> 
 ELIMINAR
 </a> 

 @endif
 </div>  
 </td>
 </tr>
 @endforeach
 </tbody>
 </table>
 @stop