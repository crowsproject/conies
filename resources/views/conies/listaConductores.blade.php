@extends('machote')
@section('content')
<br>
<div class="card-title">
	<h3 class="title-2">Reporte Conductores</h3>
</div><br>
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>N. Conductor</th>
						<th>Nombre Completo</th>
						<th>Edad</th>
						<th>Dirección</th>
						<th>Teléfono</th>
						<th>E-mail</th>
						<th>RFC</th>
						<th>Identificación</th>
						<th>Licencia</th>
						<th>Opciones</th>
					</thead>
					@foreach($conductores as $conductor)
					<tr>
						<td width="150">{{$conductor->id_conductor}}</td>
						<td width="200">{{$conductor->nombre_conductores}} {{$conductor->apellido_paterno_conductores}} {{$conductor->apellido_materno_conductores}}</td>
						<td width="130">{{$conductor->edad}}</td>
						<td>{{$conductor->direccion}}</td>
						<td width="150">{{$conductor->telefono}}</td>
						<td width="150">{{$conductor->email}}</td>
						<td width="150">{{$conductor->rfc}}</td>
						<td width="100"><center><img width=100 height="130" src = "{{asset('/archivos/'.$conductor->identificacion)}}"></center></td>
						<td width="100"><center><img width=100 height="130" src = "{{asset('/archivos/'.$conductor->licencia_conduccion)}}"></center></td>
						<td>
							@if($conductor->deleted_at=='')
							<a href="{{URL::action('ControladorConductor@modConductor',['id_conductor'=>$conductor->id_conductor])}}"><button>Modificar</button></a><br>
							<a href="{{URL::action('ControladorConductor@suspenderConductor',['id_conductor'=>$conductor->id_conductor])}}"><button>Suspender</button></a>
							@else
							<a href="{{ URL::action('ControladorConductor@activarConductor',['id_conductor'=>$conductor->id_conductor]) }}"><button>Activar</button></a><br>
							<a href="{{ URL::action('ControladorConductor@eliminaCondutor',['id_conductor'=>$conductor->id_conductor]) }}"><button>Eliminar</button></a>
							@endif
						</td>
					</tr>
					@endforeach
				</table>
			</div>
@stop