@extends('machoteModificaciones')
@section('content')
<br>
<div class="card-title">
	<h3 class="title-2">Midificación Conductor</h3>
</div><br>
<form action =  "{{route('guardamodificacliente')}}" method = "POST" enctype='multipart/form-data' >
{{csrf_field()}}
@if($errors->first('id_cliente'))
	<i> {{ $errors->first('id_cliente') }} </i> 
@endif
<div class="form-group label-floating">
	<label class="control-label">Clave cliente</label>
	<input type="text" class="form-control" name="id_cliente" value="{{$cliente->id_cliente}}" readonly ='readonly'>
</div>
@if($errors->first('nombre_cliente')) 
	<div class="alert alert-warning">
		<i> {{ $errors->first('nombre_cliente') }} </i>
	</div>
@endif
<div class="form-group label-floating">
<label class="control-label">Nombre</label>
<input type="text" class="form-control" name="nombre_cliente" value="{{$cliente->nombre_cliente}}">
</div>
@if($errors->first('apellido_paterno_cliente')) 
	<div class="alert alert-warning">
		<i  > {{ $errors->first('apellido_paterno_cliente') }} </i>
	</div>
@endif
<div class="form-group label-floating" >
<label class="control-label">Apellido paterno</label>
<input type="text" class="form-control" name="apellido_paterno_cliente" value="{{ $cliente->apellido_paterno_cliente }}">
</div>
@if($errors->first('apellido_materno_cliente')) 
	<div class="alert alert-warning">
		<i> {{ $errors->first('apellido_materno_cliente') }} </i>
	</div>
@endif
<div class="form-group label-floating">
<label class="control-label">Apellido materno</label>
<input type="text" class="form-control" name="apellido_materno_cliente" value="{{$cliente->apellido_materno_cliente}}">
</div>
@if($errors->first('edad')) 
	<div class="alert alert-warning">
		<i  > {{ $errors->first('edad') }} </i>
	</div>
@endif
<div class="form-group label-floating">
<label class="control-label">Edad</label>
<input type="number" class="form-control" name="edad" value="{{$cliente->edad}}">
</div>
@if($errors->first('direccion')) 
	<div class="alert alert-warning">
		<i  > {{ $errors->first('direccion') }} </i>
	</div>
@endif
<div class="form-group label-floating">
<label class="control-label">Dirección</label>
<input type="text" class="form-control" name="direccion" value="{{$cliente->direccion}}">
</div>
@if($errors->first('telefono')) 
	<div class="alert alert-warning">
		<i  > {{ $errors->first('telefono') }} </i>
	</div>
@endif
<div class="form-group label-floating">
<label class="control-label">Teléfono</label>
<input type="text" class="form-control" name="telefono" value="{{$cliente->telefono}}">
</div>
@if($errors->first('email')) 
	<div class="alert alert-warning">
		<i  > {{ $errors->first('email') }} </i>
	</div>
@endif
<div class="form-group label-floating">
<label class="control-label">E-mail</label>
<input type="text" class="form-control" name="email" value="{{$cliente->email}}">
</div>
@if($errors->first('identificacion')) 
	<div class="alert alert-warning">
		<i  > {{ $errors->first('identificacion') }} </i>
	</div>
@endif
<div class="form-group label-floating">
<label class="control-label">Identificación</label><br>
<img src = "{{asset('/archivos/'.$cliente->identificacion)}}" height =100 width=300><br>
<input type="file" name="identificacion" value="{{$cliente->identificacion}}">
</div>
@if($errors->first('rfc')) 
	<div class="alert alert-warning">
		<i  > {{ $errors->first('rfc') }} </i>
	</div>
@endif
<div class="form-group label-floating">
<label class="control-label">RFC</label>
<input type="text" class="form-control" name="rfc" value="{{$cliente->rfc}}">
</div>
@if($errors->first('razon_social')) 
	<div class="alert alert-warning">
		<i  > {{ $errors->first('razon_social') }} </i>
	</div>
@endif
<div class="form-group label-floating">
<label class="control-label">Razón social</label>
<input type="text" class="form-control" name="razon_social" value="{{$cliente->razon_social}}">
</div>
@if($errors->first('comprobante_domiciliario')) 
	<div class="alert alert-warning">
		<i  > {{ $errors->first('comprobante_domiciliario') }} </i>
	</div>
@endif
<div class="form-group label-floating">
<label class="control-label">Comprobante domiciliario</label><br>
<img src = "{{asset('/archivos/'.$cliente->comprovante_domiciliario)}}" height =100 width=300><br>
<input type="file" name="comprobante_domiciliario" value="{{$cliente->comprovante_domiciliario}}">
</div>
<p class="text-center">
	<button class="btn btn-info btn-raised"><h4>Guardar</h4></button>
</p>
</form><br><br>
@stop