@extends('template.admin')

@section('title', 'Lista de Usuario')

@section('titulo', 'Lista de Usuarios')

@section('content')
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Nombre y Apellido</th><th>Cedula</th><th>email</th><th>Accion</th>
			</tr>
		</thead>
		<tbody>
			@if($cant == 0)
				<tr>
					<td colspan="4">
						<div class="alert alert-info">No existen usuarios registrados</div>
					</td>
				</tr>
			@else 
				@foreach($user as $u)
					<tr>
						<td>{{ $u->nombre }} {{ $u->apellido }}</td>
						<td>{{ $u->cedula }}</td>
						<td>{{ $u->email }}</td>
						<td>
							<a href="{{ route('usuario.edit',$u->id) }}" class="btn btn-primary"><i class="fa fa-edit" style="font-size: 1.3em"></i></a>
							<a href="{{ route('usuario.destroy',$u->id) }}" class="btn btn-danger"><i class="fa fa-close" style="font-size: 1.3em"></i></a>
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>

@stop