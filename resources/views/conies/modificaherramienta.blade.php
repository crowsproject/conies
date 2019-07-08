@extends('machote')
@section('content')
<br>
<div class="card-title">
	<h3 class="title-2">Midificación Herramienta</h3>
</div><br>

<form action =  "{{route('guardamodificaherramienta')}}" method = "POST" enctype='multipart/form-data' >
{{csrf_field()}}
@if($errors->first('id_herramienta'))
	<div class="alert alert-warning">
		        		<i> {{ $errors->first('id_herramienta') }} </i>
		        	</div>
@endif
<div class="form-group label-floating">
<label class="control-label">Clave herramienta</label>
<input type="text" class="form-control" name="id_herramienta" value="{{$herramienta->id_herramienta}}" readonly ='readonly'>
</div>
@if($errors->first('nombre_herramienta')) 
	<div class="alert alert-warning">
		        		<i> {{ $errors->first('nombre_herramienta') }} </i>
		        	</div>
@endif
<div class="form-group label-floating">
<label class="control-label">Nombre</label>
<input type="text" class="form-control" name="nombre_herramienta" value="{{$herramienta->nombre_herramienta}}">
@if($errors->first('fecha_compra')) 
	<div class="alert alert-warning">
		        		<i> {{ $errors->first('fecha_compra') }} </i>
		        	</div>
@endif
<div class="form-group label-floating">
<label class="control-label">fecha_compra</label>
<input type="date" class="form-control" name="fecha_compra" value="{{$herramienta->fecha_compra}}">
</div>


@if($errors->first('costo')) 
	<div class="alert alert-warning">
		        		<i> {{ $errors->first('costo') }} </i>
		        	</div>
@endif
<div class="form-group label-floating">
<label class="control-label">Costo</label>
<input type="text" class="form-control" name="costo" value="{{$herramienta->costo}}">
</div>


@if($errors->first('especificaciones')) 
	<div class="alert alert-warning">
		        		<i> {{ $errors->first('especificaciones') }} </i>
		        	</div>
@endif
<div class="form-group label-floating">
<label class="control-label">Especificaciones</label>
<input type="text" class="form-control" name="especificaciones" value="{{$herramienta->especificaciones}}">
</div>

@if($errors->first('serial')) 
	<div class="alert alert-warning">
		        		<i> {{ $errors->first('serial') }} </i>
		        	</div>
@endif
<div class="form-group label-floating">
<label class="control-label">Serial</label>
<input type="text" class="form-control" name="serial" value="{{$herramienta->serial}}">
</div>

<div class="form-group label-floating">
<label class="control-label">Tipo Herramienta</label>
<select name = 'id_tipo_herramienta'>
 <option value = '{{$id_tipo_herramienta}}'>{{$tipoherramienta}}</option>
 @foreach($otrostipoherramientas as $tip)
 <option value = '{{$tip->id_tipo_herramienta}}'>{{$tip->tipo_herramienta}}</option>
 @endforeach
 </select>
</div>
<div class="form-group label-floating">
<label class="control-label">Marca</label>
<select name = 'id_marca' >
	<option value = '{{$id_marca}}'>{{$marca}}</option>
  @foreach($otrasmarcas as $om)
 <option value = '{{$om->id_marca}}'>{{$om->nombre_marca}}</option>
 @endforeach
 </select>
</div>
<p class="text-center">
	<button class="btn btn-info btn-raised"><h4>Guardar</h4></button>
</p>	
</form><br><br>
@stop