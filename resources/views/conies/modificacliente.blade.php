@extends('conies.principal')
@section('contenido')
<h3 >Alta Cliente</h3>
<form action =  "{{route('guardamodificacliente')}}" method = "POST" enctype='multipart/form-data' >
{{csrf_field()}}
@if($errors->first('id_cliente'))
	<i> {{ $errors->first('id_cliente') }} </i> 
@endif
<label>Clave cliente</label>
<input type="text" name="id_cliente" value="{{$cliente->id_cliente}}" readonly ='readonly'>
<br>
<label>Nombre</label>
@if($errors->first('nombre_cliente')) 
	<i style="color:rgb(255,0,0);" > {{ $errors->first('nombre_cliente') }} </i>
@endif
<input type="text" name="nombre_cliente" value="{{$cliente->nombre_cliente}}">
<br>
<label>Apellido paterno</label>
@if($errors->first('apellido_paterno_cliente')) 
	<i style="color:rgb(255,0,0);" > {{ $errors->first('apellido_paterno_cliente') }} </i>
@endif
<input type="text" name="apellido_paterno_cliente" value="{{$cliente->apellido_paterno_cliente}}">
<br>
<label>Apellido materno</label>
@if($errors->first('apellido_materno_cliente')) 
	<i style="color:rgb(255,0,0);" > {{ $errors->first('apellido_materno_cliente') }} </i>
@endif
<input type="text" name="apellido_materno_cliente" value="{{$cliente->apellido_materno_cliente}}">
<br>
<label>Edad</label>
@if($errors->first('edad')) 
	<i style="color:rgb(255,0,0);" > {{ $errors->first('edad') }} </i>
@endif
<input type="number" name="edad" value="{{$cliente->edad}}">
<br>
<label>Dirección</label>
@if($errors->first('direccion')) 
	<i style="color:rgb(255,0,0);" > {{ $errors->first('direccion') }} </i>
@endif
<input type="text" name="direccion" value="{{$cliente->direccion}}">
<br>
<label>Teléfono</label>
@if($errors->first('telefono')) 
	<i style="color:rgb(255,0,0);" > {{ $errors->first('telefono') }} </i>
@endif
<input type="text" name="telefono" value="{{$cliente->telefono}}">
<br>
<label>E-mail</label>
@if($errors->first('email')) 
	<i style="color:rgb(255,0,0);" > {{ $errors->first('email') }} </i>
@endif
<input type="text" name="email" value="{{$cliente->email}}">
<br>
<label >Identificacóon</label>
<br>
@if($errors->first('identificacion')) 
	<i style="color:rgb(255,0,0);"> {{ $errors->first('identificacion') }} </i>
@endif
<img src = "{{asset('storage/app/'.$cliente->identificacion)}}" height =100 width=100>
<br>
<input type='file' name ='identificacion'value="{{$cliente->identificacion}}">
<br>
<label>RFC</label>
@if($errors->first('rfc')) 
	<i style="color:rgb(255,0,0);" > {{ $errors->first('rfc') }} </i>
@endif
<input type="text" name="rfc" value="{{$cliente->rfc}}">
<br>
<label>Razón social</label>
@if($errors->first('razon_social')) 
	<i style="color:rgb(255,0,0);" > {{ $errors->first('razon_social') }} </i>
@endif
<input type="text" name="razon_social" value="{{$cliente->razon_social}}">
<br>
<label >Comprobante domiciliario</label>
<br>
@if($errors->first('comprobante_domiciliario')) 
	<i style="color:rgb(255,0,0);"> {{ $errors->first('comprobante_domiciliario') }} </i>
@endif
<img src = "{{asset('storage/app/'.$cliente->comprobante_domiciliario)}}" height =100 width=100>
<br>
<input type='file' name ='comprobante_domiciliario'value="{{$cliente->comprobante_domiciliario}}">
<br>
<input type = 'submit' value = 'Guardar'>
</form>
@stop