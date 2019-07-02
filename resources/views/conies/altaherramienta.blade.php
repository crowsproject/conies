@extends('conies.principal')
@section('contenido')
<h3 >Alta Herramienta</h3>
<form action =  "{{route('guardaherramienta')}}" method = "POST" enctype='multipart/form-data' >
{{csrf_field()}}
@if($errors->first('id_herramienta'))
	<i> {{ $errors->first('id_herramienta') }} </i> 
@endif
<label>Clave herramienta</label>
<input type="text" name="id_cliente" value="{{$idHerramienta}}" readonly ='readonly'>
<br>
<label>Nombre</label>
@if($errors->first('nombre_herramienta')) 
	<i style="color:rgb(255,0,0);" > {{ $errors->first('nombre_herramienta') }} </i>
@endif
<input type="text" name="nombre_herramienta" value="{{old('nombre_herramienta')}}">
<br>
<label>fecha_compra</label>
@if($errors->first('fecha_compra')) 
	<i style="color:rgb(255,0,0);" > {{ $errors->first('fecha_compra') }} </i>
@endif
<input type="date" name="fecha_compra" value="{{old('fecha_compra')}}">
<br>
<label>Costo</label>
@if($errors->first('costo')) 
	<i style="color:rgb(255,0,0);" > {{ $errors->first('costo') }} </i>
@endif
<input type="text" name="costo" value="{{old('costo')}}">
<br>
<label>Especificaciones</label>
@if($errors->first('especificaciones')) 
	<i style="color:rgb(255,0,0);" > {{ $errors->first('especificaciones') }} </i>
@endif
<input type="text" name="especificaciones" value="{{old('especificaciones')}}">
<br>
<label>Serial</label>
@if($errors->first('serial')) 
	<i style="color:rgb(255,0,0);" > {{ $errors->first('serial') }} </i>
@endif
<input type="text" name="serial" value="{{old('serial')}}">
<br>
<label>Tipo Herramienta</label>
<select name = 'id_tipo_herramienta'>
 @foreach($tipo_herramientas as $tip)
 <option value = '{{$tip->id_tipo_herramienta}}'>{{$tip->tipo_herramienta}}</option>
 @endforeach
 </select>
 <br>
 <label>Marca</label>
<select name = 'id_marca' >
 @foreach($marcas as $mar)
 <option value = '{{$mar->id_marca}}'>{{$mar->nombre_marca}}</option>
 @endforeach
 </select>
<br>
<input type = 'submit' value = 'Guardar'>
</form>
@stop