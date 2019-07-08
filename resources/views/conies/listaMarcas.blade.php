@extends('machote')
@section('content')
<br>
<div class="card-title">
	<h3 class="title-2">Reporte Marcas</h3>
</div><br>
	<center><h3>Lista de Marcas</h3></center>

			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Num. Registro</th>
						<th>Nombre Marca</th>
						<th>Opciones</th>
					</thead>
					@foreach($marcas as $marca)
					<tr>
						<td>{{ $marca->id_marca }}</td>
						<td>{{ $marca->nombre_marca }}</td>
						<td>
							@if($marca->deleted_at == "")
							<a href="{{ URL::action('ControladorMarca@modMarca',['id_marca'=>$marca->id_marca]) }}"><button>Modificar</button></a>
							<a href="{{ URL::action('ControladorMarca@suspenderMarca',['id_marca'=>$marca->id_marca]) }}"><button>Suspender</button></a>
							@else
							<a href="{{ URL::action('ControladorMarca@activarMarca',['id_marca'=>$marca->id_marca]) }}"><button>Activar</button></a>
							<a href="{{ URL::action('ControladorMarca@eliminarMarca',['id_marca'=>$marca->id_marca]) }}"><button>Eliminar</button></a>
							@endif
						</td>
					</tr>
					@endforeach
				</table>
			</div>
@stop