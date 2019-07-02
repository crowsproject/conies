<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Alta Marcas</title>
</head>
<body>
	<center><h3>Alta Marca</h3></center><br>
	<div class="row">
		<div class="container">
			<form action="{{route('guardaMarca')}}" method="POST" enctype='multipart/form-data'>
				{{csrf_field()}}
				<div class="form-group label-floating">
					<label class="control-label">Num. Registro</label>
					<input type="text" class="form-control" name="id_marca" value="{{$idcs}}" readonly>
				</div>
				@if($errors->first('nombre_marca')) 
		        	<i> {{ $errors->first('nombre_marca') }} </i>
		        @endif
		        <div class="form-group label-floating">
					<label class="control-label">Nombre Marca</label>
					<input type="text" class="form-control" name="nombre_marca" value="{{ old('nombre_marca') }}">
				</div>
				<p class="text-center">
					<button class="btn btn-info btn-raised">Guardar</button>
				</p>
			</form>
		</div>
	</div>
</body>
</html>