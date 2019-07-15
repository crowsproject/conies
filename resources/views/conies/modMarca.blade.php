@extends('machoteModificaciones')
@section('content')
<br>
<div class="card-title">
	<h3 class="title-2">Midificación Marca</h3>
</div><br>
<form action="{{route('guardaCambiosM')}}" method="POST" enctype='multipart/form-data'>
				{{csrf_field()}}
				<div class="form-group label-floating">
					<label class="control-label">Num. Registro</label>
					<input type="text" class="form-control" name="id_marca" value="{{ $marca->id_marca }}" readonly>
				</div>
				@if($errors->first('nombre_marca')) 
		        	<i> {{ $errors->first('nombre_marca') }} </i>
		        @endif
		        <div class="form-group label-floating">
					<label class="control-label">Nombre Marca</label>
					<input type="text" class="form-control" name="nombre_marca" value="{{$marca->nombre_marca}}">
				</div>
				<p class="text-center">
					<button class="btn btn-info btn-raised">Guardar</button>
				</p>
</form>
@stop
