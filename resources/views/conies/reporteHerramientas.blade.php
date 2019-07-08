@extends('machote')
@section('content')
<br>
<div class="card-title">
	<h3 class="title-2">Reporte Herramientas</h3>
</div><br>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-condensed table-hover">
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
  <td>{{$her->tipoherramienta}}</td>
 <td>{{$her->marca}}</td>
 <td>
 <div>
 @if($her->deleted_at=="")
 <a href="{{URL::action('ControladorHerramienta@modificaherramienta',['id_herramienta'=>$her->id_herramienta])}}"> 
 Editar
 </a>
 <a href="{{URL::action('ControladorHerramienta@eliminaherramienta',['id_herramienta'=>$her->id_herramienta])}}"> 
 Inhabiltar
 </a> 
 @else
 <a href="{{URL::action('ControladorHerramienta@restauraherramienta',['id_herramienta'=>$her->id_herramienta])}}"> 
 Restaurar
 </a> 
 <a href="{{URL::action('ControladorHerramienta@efisicaherramienta',['id_herramienta'=>$her->id_herramienta])}}"> 
 Eliminar
 </a> 
 @endif
 </div>  
 </td>
 </tr>
 @endforeach
 </tbody>
	</table>
</div>	
 @stop