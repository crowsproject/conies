@extends('machote')
@section('content')
<br>
<div class="card-title">
	<h3 class="title-2">Midificación Conductor</h3>
</div><br>
<form  action="{{route('guardaCambiosC')}}" method="POST" enctype='multipart/form-data' autocomplete="off">
				{{csrf_field()}}
		        @if($errors->first('id_conductor')) 
		        	<i> {{ $errors->first('id_conductor') }} </i> 
		        @endif
		        <div class="form-group label-floating">
					<label class="control-label">Num. Registro</label>
					<input type="text" class="form-control" name="id_conductor" value="{{$conductor->id_conductor}}" readonly>
				</div>
		        @if($errors->first('nombre_conductores')) 
		        	<i> {{ $errors->first('nombre_conductores') }} </i> 
		        @endif
		        <div class="form-group label-floating">
					<label class="control-label">Nombre</label>
					<input type="text" class="form-control" name="nombre_conductores" value="{{$conductor->nombre_conductores}}">
				</div>
		        @if($errors->first('apellido_paterno_conductores')) 
		        	<i> {{ $errors->first('apellido_paterno_conductores') }} </i> 
		        @endif
		        <div class="form-group label-floating">
					<label class="control-label">Appellido Paterno</label>
					<input type="text" class="form-control" name="apellido_paterno_conductores" value="{{$conductor->apellido_paterno_conductores}}">
				</div>
		        @if($errors->first('apellido_materno_conductores')) 
		        	<i> {{ $errors->first('apellido_materno_conductores') }} </i> 
		        @endif
		        <div class="form-group label-floating">
					<label class="control-label">Apellido Materno</label>
					<input type="text" class="form-control" name="apellido_materno_conductores" value="{{$conductor->apellido_materno_conductores}}">
				</div>
		        @if($errors->first('edad')) 
		        	<i> {{ $errors->first('edad') }} </i> 
		        @endif
		        <div class="form-group label-floating">
					<label class="control-label">Edad</label>
					<input type="text" class="form-control" name="edad" value="{{$conductor->edad}}">
				</div>
		        @if($errors->first('direccion')) 
		        	<i> {{ $errors->first('direccion') }} </i> 
		        @endif
		        <div class="form-group label-floating">
					<label class="control-label">Dirección</label>
					<input type="text" class="form-control" name="direccion" value="{{$conductor->direccion}}">
				</div>
				@if($errors->first('telefono')) 
		        	<i> {{ $errors->first('telefono') }} </i> 
		        @endif
				<div class="form-group label-floating">
					<label class="control-label">Teléfono</label>
					<input type="text" class="form-control" name="telefono" value="{{$conductor->telefono}}">
				</div>
				@if($errors->first('email')) 
		        	<i> {{ $errors->first('email') }} </i> 
		        @endif
				<div class="form-group label-floating">
					<label class="control-label">E-mail</label>
					<input type="mail" class="form-control" name="email" value="{{$conductor->email}}">
				</div>
				@if($errors->first('rfc')) 
		        	<i> {{ $errors->first('rfc') }} </i> 
		        @endif
				<div class="form-group label-floating">
					<label class="control-label">RFC</label>
					<input class="form-control" type="text" name="rfc" value="{{$conductor->rfc}}">
				</div>
				@if($errors->first('razon_social')) 
		        	<i> {{ $errors->first('razon_social') }} </i> 
		        @endif
				<div class="form-group label-floating">
					<label class="control-label">Razón Social</label>
					<input class="form-control" type="text" name="razon_social" value="{{$conductor->razon_social}}">
				</div>
				@if($errors->first('identificacion')) 
		        	<i> {{ $errors->first('identificacion') }} </i> 
		        @endif
				<div class="form-group label-floating">
					<label class="control-label">Identificación</label><br>
					<img src = "{{asset('/archivos/'.$conductor->identificacion)}}"height =100 width=300><br>
					<input type="file" name="identificacion" value="{{$conductor->identificacion}}">
				</div>
				@if($errors->first('licencia_conduccion')) 
		        	<i> {{ $errors->first('licencia_conduccion') }} </i> 
		        @endif
				<div class="form-group label-floating">
					<label class="control-label">Licencia de Conducir</label><br>
					<img src = "{{asset('/archivos/'.$conductor->licencia_conduccion)}}"height =100 width=300><br>
					<input type="file" name="licencia_conduccion" value="{{$conductor->licencia_conduccion}}">
				</div>
				<p class="text-center">
					<button class="btn btn-info btn-raised"><h4>Guardar</h4></button>
				</p>								
			</form><br><br>
@stop