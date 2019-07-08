@extends('machote')
@section('content')
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles">Altas <small>Conductor</small></h1>
	</div>
</div>
<br><br>
<form action="{{route('guardaConductor')}}" method="POST" enctype='multipart/form-data' autocomplete="off">
				{{csrf_field()}}
		        @if($errors->first('id_conductor')) 
		        	<i> {{ $errors->first('id_conductor') }} </i> 
		        @endif
		        <div class="form-group label-floating">
					<label class="control-label">Num. Registro</label>
					<input type="text" class="form-control" name="id_conductor" value="{{$idcs}}" readonly>
				</div>
		        @if($errors->first('nombre_conductores')) 
		        	<i> {{ $errors->first('nombre_conductores') }} </i> 
		        @endif
		        <div class="form-group label-floating">
					<label class="control-label">Nombre</label>
					<input type="text" class="form-control" name="nombre_conductores" value="{{old('nombre_conductores')}}">
				</div>
		        @if($errors->first('apellido_paterno_conductores')) 
		        	<i> {{ $errors->first('apellido_paterno_conductores') }} </i> 
		        @endif
		        <div class="form-group label-floating">
					<label class="control-label">Appellido Paterno</label>
					<input type="text" class="form-control" name="apellido_paterno_conductores" value="{{old('apellido_paterno_conductores')}}">
				</div>
		        @if($errors->first('apellido_materno_conductores')) 
		        	<i> {{ $errors->first('apellido_materno_conductores') }} </i> 
		        @endif
		        <div class="form-group label-floating">
					<label class="control-label">Apellido Materno</label>
					<input type="text" class="form-control" name="apellido_materno_conductores" value="{{old('apellido_materno_conductores')}}">
				</div>
		        @if($errors->first('edad')) 
		        	<i> {{ $errors->first('edad') }} </i> 
		        @endif
		        <div class="form-group label-floating">
					<label class="control-label">Edad</label>
					<input type="text" class="form-control" name="edad" value="{{old('edad')}}">
				</div>
		        @if($errors->first('direccion')) 
		        	<i> {{ $errors->first('direccion') }} </i> 
		        @endif
		        <div class="form-group label-floating">
					<label class="control-label">Dirección</label>
					<input type="text" class="form-control" name="direccion" value="{{old('direccion')}}">
				</div>
				@if($errors->first('telefono')) 
		        	<i> {{ $errors->first('telefono') }} </i> 
		        @endif
				<div class="form-group label-floating">
					<label class="control-label">Teléfono</label>
					<input type="text" class="form-control" name="telefono" value="{{old('telefono')}}">
				</div>
				@if($errors->first('email')) 
		        	<i> {{ $errors->first('email') }} </i> 
		        @endif
				<div class="form-group label-floating">
					<label class="control-label">E-mail</label>
					<input type="mail" class="form-control" name="email" value="{{old('email')}}">
				</div>
				@if($errors->first('rfc')) 
		        	<i> {{ $errors->first('rfc') }} </i> 
		        @endif
				<div class="form-group label-floating">
					<label class="control-label">RFC</label>
					<input class="form-control" type="text" name="rfc" value="{{old('rfc')}}">
				</div>
				@if($errors->first('razon_social')) 
		        	<i> {{ $errors->first('razon_social') }} </i> 
		        @endif
				<div class="form-group label-floating">
					<label class="control-label">Razón Social</label>
					<input class="form-control" type="text" name="razon_social" value="{{old('razon_social')}}">
				</div>
				@if($errors->first('identificacion')) 
		        	<i> {{ $errors->first('identificacion') }} </i> 
				@endif
				<div class="form-group label-floating">
					<label class="control-label">Identificación</label><br>
					<input type="file" name="identificacion" value="{{old('identificacion')}}">
				</div>
				@if($errors->first('licencia_conduccion')) 
		        	<i> {{ $errors->first('licencia_conduccion') }} </i> 
				@endif
				<div class="form-group label-floating">
					<label class="control-label">Licencia de Conducir</label><br>
					<input type="file" name="licencia_conduccion" value="{{old('licencia_conduccion')}}">
				</div>
				<p class="text-center">
					<button class="btn btn-info btn-raised"><h4>Guardar</h4></button>
				</p>							
			</form><br><br><br>
@endsection	