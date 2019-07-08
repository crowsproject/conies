@extends('machote')
@section('content')
<br>
<div class="card-title">
	<h3 class="title-2">Reporte Conductores</h3>
</div><br>
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<tr>
							<th>Clave cliente</th>
							<th>Nombre</th>
							<th>Apellido paterno</th>
							<th>Apellido materno</th>
							<th>Edad</th>
							<th>Dirección</th>
							<th>Teléfono</th>
							<th>Email</th>
							<th>Identificación</th>
							<th>RFC</th>
							<th>Razón social</th>
							<th>Comprobante domiciliario</th>
						</tr>
					</thead>
					<tbody>
						@foreach($clientes as $cli)
						<tr>
							<td>{{$cli->id_cliente}}</td>
							<td>{{$cli->nombre_cliente}}</td>
							<td>{{$cli->apellido_paterno_cliente}}</td>
							<td>{{$cli->apellido_materno_cliente}}</td>
							<td>{{$cli->edad}}</td>
							<td>{{$cli->direccion}}</td>
							<td>{{$cli->telefono}}</td>
							<td>{{$cli->email}}</td>
							<td>{{$cli->identificacion}}</td>
							<td>{{$cli->rfc}}</td>
							<td>{{$cli->razon_social}}</td>
							<td>{{$cli->comprobante_domiciliario}}</td>
							<td>
								<div>
									@if($cli->deleted_at=="")
									<a href="{{URL::action('ControladorCliente@modificacliente',['id_cliente'=>$cli->id_cliente])}}"> 
									Editar
									</a>
								<a href="{{URL::action('ControladorCliente@eliminacliente',['id_cliente'=>$cli->id_cliente])}}"> 
									Inhabiltar
							</a> 
								@else
								<a href="{{URL::action('ControladorCliente@restauracliente',['id_cliente'=>$cli->id_cliente])}}"> 
									Restaurar
							</a> 
								<a href="{{URL::action('ControladorCliente@efisicacliente',['id_cliente'=>$cli->id_cliente])}}"> 
									Eliminar
							</a> 
								@endif
 </div>  
 </td>
 </tr>
 @endforeach
 </tbody>
				</table>
</div>
 @stop