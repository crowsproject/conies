@extends('machoteModificaciones')
@section('contenido')
<h3 >Modifica Tipo Herramienta</h3>
<form action =  "{{route('guardamodificatipoherramienta')}}" method = "POST" enctype='multipart/form-data' >
{{csrf_field()}}
@if($errors->first('id_tipo_herramienta'))
	<i> {{ $errors->first('id_tipo_herramienta') }} </i> 
@endif
<label>Clave tipo herramienta</label>
<input type="text" name="id_tipo_herramienta" value="{{$tipo_herramienta->id_tipo_herramienta}}" readonly ='readonly'>
<br>

<label>Tipo de herramienta</label>
<input type="text" name="tipo_herramienta" value="{{$tipo_herramienta->tipo_herramienta}}">
<br>
<input type = 'submit' value = 'Guardar'>
</form>
@stop