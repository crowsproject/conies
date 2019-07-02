@extends('conies.principal')
@section('contenido')
<h3 >Alta Tipo Herramienta</h3>
<form action =  "{{route('guardatipoherramienta')}}" method = "POST" enctype='multipart/form-data' >
{{csrf_field()}}
@if($errors->first('id_tipo_herramienta'))
	<i> {{ $errors->first('id_tipo_herramienta') }} </i> 
@endif
<label>Clave tipo herramienta</label>
<input type="text" name="id_tipo_herramienta" value="{{$idTipoHerramienta}}" readonly ='readonly'>
<br>
<label>Tipo de herramienta</label>
@if($errors->first('tipo_herramienta')) 
	<i style="color:rgb(255,0,0);" > {{ $errors->first('tipo_herramienta') }} </i>
@endif
<input type="text" name="tipo_herramienta" value="{{old('tipo_herramienta')}}">

<br>
<input type = 'submit' value = 'Guardar'>
</form>
@stop