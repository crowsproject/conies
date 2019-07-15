@extends('machote')
@section('content')
<br>
<div class="card-title">
	<h3 class="title-2">Alta Tipo Herramienta</h3>
</div><br>
<form action =  "{{route('guardatipoherramienta')}}" method = "POST" enctype='multipart/form-data' >
{{csrf_field()}}
@if($errors->first('id_tipo_herramienta'))
	<i> {{ $errors->first('id_tipo_herramienta') }} </i> 
@endif
<div class="form-group label-floating">
<label class="control-label">Clave tipo herramienta</label>
<input type="text" class="form-control" name="id_tipo_herramienta" value="{{$idTipoHerramienta}}" readonly ='readonly'>
</div>
@if($errors->first('tipo_herramienta')) 
	<div class="alert alert-warning">
		<i > {{ $errors->first('tipo_herramienta') }} </i>
	</div>
@endif
<div class="form-group label-floating">
<label class="control-label">Tipo de herramienta</label>
<input type="text" class="form-control" name="tipo_herramienta" value="{{old('tipo_herramienta')}}">
</div>
<p class="text-center">
	<button class="btn btn-info btn-raised"><h4>Guardar</h4></button>
</p>
</form>
@stop