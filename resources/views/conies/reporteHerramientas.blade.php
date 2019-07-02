@extends('conies.principal')
@section('contenido')
<table border="1">
 <thead>
 <tr>
 <th>Clave herramienta</th>
 <th>Nombre</th>
 <th>Fecha de compra</th>
 <th>Costo</th>
 <th>Especificaciones</th>
 <th>Serial</th>
 <th>Tipo de herramienta</th>
 <th>Marca</th>
 </tr>
 </thead>
 <tbody>
 @foreach($herramientas as $her)
 <tr>
 <td>{{$her->id_herramienta}}</td>
 <td>{{$her->nombre_herramienta}}</td>
  <td>{{$her->fecha_compra}}</td>
 <td>{{$her->costo}}</td>
  <td>{{$her->especificaciones}}</td>
 <td>{{$her->serial}}</td>
  <td>{{$her->tipo_herramienta}}</td>
 <td>{{$her->nombre_marca}}</td>
 <td>
 <div>
 @if($her->deleted_at=="")
	 <button title="Editar">Editar
 <a href="{{URL::action('ControladorHerramienta@modificaherramienta',['id_herramienta'=>$her->id_herramienta])}}"> 
 </a>
 </button>
 <button title="Inhabiltar">Inhabiltar
 <a href="{{URL::action('ControladorHerramienta@eliminaherramienta',['id_herramienta'=>$her->id_herramienta])}}"> 
 </a> 
 </button>
 @else
	 <button title="restaurar">Restaurar
 <a href="{{URL::action('ControladorHerramienta@restauraherramienta',['id_herramienta'=>$her->id_herramienta])}}"> 
 </a> 
 </button>
 <button title="Eliminar">Eliminar
 <a href="{{URL::action('ControladorHerramienta@efisicaherramienta',['id_herramienta'=>$her->id_herramienta])}}"> 
 </a> 
 </button>
 @endif
 </div>  
 </td>
 </tr>
 @endforeach
 </tbody>
 </table>
 @stop