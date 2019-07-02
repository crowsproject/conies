<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Lista Marcas</title>
</head>
<body>
	<center><h3>Lista de Marcas</h3></center>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
	</div>
</body>
</html>