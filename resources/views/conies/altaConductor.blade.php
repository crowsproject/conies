@extends('machote')
@section('content')
<br>
<div class="card-title">
	<h3 class="title-2">Alta Conductor</h3>
</div><br>
<form action="{{route('guardaConductor')}}" method="POST" enctype='multipart/form-data' autocomplete="off">
				{{csrf_field()}}
		        <div class="form-group label-floating">
					<label class="control-label">Num. Registro</label>
					<input type="text" class="form-control" name="id_conductor" value="{{$idcs}}" readonly>
				</div>
		        @if($errors->first('nombre_conductores'))
		        	<div class="alert alert-warning">
		        		<i> {{ $errors->first('nombre_conductores') }} </i>
		        	</div> 
		        @endif
		        <div class="form-group label-floating">
					<label class="control-label">Nombre(s)</label>
					<input type="text" class="form-control" name="nombre_conductores" value="{{old('nombre_conductores')}}" placeholder="Ingrese el nombre del conductor">
				</div>
		        @if($errors->first('apellido_paterno_conductores')) 
		        	<div class="alert alert-warning">
		        		<i> {{ $errors->first('apellido_paterno_conductores') }} </i>
		        	</div>
		        @endif
		        <div class="form-group label-floating">
					<label class="control-label">Apellido Paterno</label>
					<input type="text" class="form-control" name="apellido_paterno_conductores" value="{{old('apellido_paterno_conductores')}}" placeholder="Ingrese el apellido paterno del conductor">
				</div>
		        @if($errors->first('apellido_materno_conductores')) 
		        	<div class="alert alert-warning">
		        		<i> {{ $errors->first('apellido_materno_conductores') }} </i>
		        	</div>
		        @endif
		        <div class="form-group label-floating">
					<label class="control-label">Apellido Materno</label>
					<input type="text" class="form-control" name="apellido_materno_conductores" value="{{old('apellido_materno_conductores')}}" placeholder="Ingrese el apellido materno del conductor">
				</div>
		        @if($errors->first('edad')) 
		        	<div class="alert alert-warning">
		        		<i> {{ $errors->first('edad') }} </i>
		        	</div>
		        @endif
		        <div class="form-group label-floating">
					<label class="control-label">Edad</label>
					<input type="text" class="form-control" name="edad" value="{{old('edad')}}" placeholder="Ingrese la edad del conductor">
				</div>
		        @if($errors->first('direccion')) 
		        	<div class="alert alert-warning">
		        		<i> {{ $errors->first('direccion') }} </i>
		        	</div> 
		        @endif
		        <div class="form-group label-floating">
					<label class="control-label">Dirección</label>
					<input type="text" class="form-control" name="direccion" value="{{old('direccion')}}" placeholder="Ingrese la direeción del conductor">
				</div>
				@if($errors->first('telefono')) 
		        	<div class="alert alert-warning">
		        		<i> {{ $errors->first('telefono') }} </i>
		        	</div>
		        @endif
				<div class="form-group label-floating">
					<label class="control-label">Teléfono</label>
					<input type="text" class="form-control" name="telefono" value="{{old('telefono')}}" placeholder="Ingrese el teléfono del conductor"> 
				</div>
				@if($errors->first('email')) 
		        	<div class="alert alert-warning">
		        		<i> {{ $errors->first('email') }} </i>
		        	</div>
		        @endif
				<div class="form-group label-floating">
					<label class="control-label">E-mail</label>
					<input type="mail" class="form-control" name="email" value="{{old('email')}}" placeholder="Ingrese el correo electonico del conductor">
				</div>
				@if($errors->first('rfc')) 
		        	<div class="alert alert-warning">
		        		<i> {{ $errors->first('rfc') }} </i>
		        	</div>
		        @endif
				<div class="form-group label-floating">
					<label class="control-label">RFC</label>
					<input class="form-control" type="text" name="rfc" value="{{old('rfc')}}" placeholder="Ingrese el RFC del conductor">
				</div>
				@if($errors->first('razon_social')) 
		        	<div class="alert alert-warning">
		        		<i> {{ $errors->first('razon_social') }} </i>
		        	</div>
		        @endif
				<div class="form-group label-floating">
					<label class="control-label">Razón Social</label>
					<input class="form-control" type="text" name="razon_social" value="{{old('razon_social')}}" placeholder="Ingrese la Razón Social del conductor">
				</div>
				@if($errors->first('identificacion')) 
		        	<div class="alert alert-warning">
		        		<i> {{ $errors->first('identificacion') }} </i>
		        	</div> 
				@endif
				<div class="form-group label-floating">
					<label class="control-label">Identificación</label><br>
					<input type="file" name="identificacion" value="{{old('identificacion')}}">
				</div>
				@if($errors->first('licencia_conduccion')) 
		        	<div class="alert alert-warning">
		        		<i> {{ $errors->first('licencia_conduccion') }} </i>
		        	</div>
				@endif
				<div class="form-group label-floating">
					<label class="control-label">Licencia de Conducir</label><br>
					<input type="file" name="licencia_conduccion" value="{{old('licencia_conduccion')}}">
				</div>
				<p class="text-center">
					<button class="btn btn-info btn-raised"><h4>Guardar</h4></button>
				</p>							
			</form><br><br>
@endsection	