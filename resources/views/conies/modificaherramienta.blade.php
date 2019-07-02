@extends('conies.principal')
@section('contenido')
<h3 >Alta Herramienta</h3>
<form action =  "{{route('guardamodificaherramienta')}}" method = "POST" enctype='multipart/form-data' >
{{csrf_field()}}
@if($errors->first('id_herramienta'))
	<i> {{ $errors->first('id_herramienta') }} </i> 
@endif
<label>Clave herramienta</label>
<input type="text" name="id_herramienta" value="{{$herramienta->id_herramienta}}" readonly ='readonly'>
<br>
<label>Nombre</label>
@if($errors->first('nombre_herramienta')) 
	<i style="color:rgb(255,0,0);" > {{ $errors->first('nombre_herramienta') }} </i>
@endif
<input type="text" name="nombre_herramienta" value="{{$herramienta->nombre_herramienta}}">
<br>
<label>fecha_compra</label>
@if($errors->first('fecha_compra')) 
	<i style="color:rgb(255,0,0);" > {{ $errors->first('fecha_compra') }} </i>
@endif
<input type="date" name="fecha_compra" value="{{$herramienta->fecha_compra}}">
<br>
<label>Costo</label>
@if($errors->first('costo')) 
	<i style="color:rgb(255,0,0);" > {{ $errors->first('costo') }} </i>
@endif
<input type="text" name="costo" value="{{$herramienta->costo}}">
<br>
<label>Especificaciones</label>
@if($errors->first('especificaciones')) 
	<i style="color:rgb(255,0,0);" > {{ $errors->first('especificaciones') }} </i>
@endif
<input type="text" name="especificaciones" value="{{$herramienta->especificaciones}}">
<br>
<label>Serial</label>
@if($errors->first('serial')) 
	<i style="color:rgb(255,0,0);" > {{ $errors->first('serial') }} </i>
@endif
<input type="text" name="serial" value="{{$herramienta->serial}}">
<br>
<label>Tipo Herramienta</label>
<select name = 'id_tipo_herramienta'>
 <option value = '{{$id_tipo_herramienta}}'>{{$tipoherramienta}}</option>
 @foreach($otrostipoherramientas as $tip)
 <option value = '{{$tip->id_tipo_herramienta}}'>{{$tip->tipo_herramienta}}</option>
 @endforeach
 </select>
 <br>
 <label>Marca</label>
 <select name = 'id_marca' >
 <option value = '{{$id_marca}}'>{{$marca}}</option>
 @foreach($otrasmarcas as $om)
  <option value = '{{$om->id_marca}}'>{{$om->nombre_marca}}</option>
 @endforeach
 </select>
<br>
<input type = 'submit' value = 'Guardar'>
</form>
@stop