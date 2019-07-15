@extends('machote')
@section('content')
<br>
<div class="card-title">
	<h3 class="title-2">Alta Marca</h3>
</div><br>
<form action="{{route('guardaMarca')}}" method="POST" enctype='multipart/form-data'>
				{{csrf_field()}}
				<div class="form-group label-floating">
					<label class="control-label">Num. Registro</label>
					<input type="text" class="form-control" name="id_marca" value="{{$idcs}}" readonly>
				</div>
				@if($errors->first('nombre_marca'))
					<div class="alert alert-warning">
						<i> {{ $errors->first('nombre_marca') }} </i>
					</div>
		        @endif
		        <div class="form-group label-floating">
					<label class="control-label">Nombre Marca</label>
					<input type="text" class="form-control" name="nombre_marca" value="{{ old('nombre_marca') }}">
				</div>
				<p class="text-center">
					<button class="btn btn-info btn-raised"><h4>Guardar</h4></button>
				</p>
</form>
@stop