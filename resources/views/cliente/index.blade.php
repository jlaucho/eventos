@extends('template.admin')

@section('title', 'Lista de Cliente')

@section('titulo', 'Listado de Clientes')

@section('content')
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Nombre y Apellido</th><th>email</th><th>Accion</th>
			</tr>
		</thead>
		<tbody>
			@if($cant == 0)
				<tr>
					<td colspan="3">
						<div class="alert alert-info">No existen Clientes registrados</div>
					</td>
				</tr>
			@else 
				@foreach($client as $c)
					<tr>
						<td>{{ $c->nombre }}</td>
						<td>{{ $c->correo }}</td>
						<td>
							<a href="{{ route('cliente.edit',$c->id) }}" class="btn btn-primary" title="Editar"><i class="fa fa-edit" style="font-size: 1.3em"></i></a>
							<a href="{{ route('cliente.destroy', $c->id) }}" class="btn btn-danger" title="Eliminar"><i class="fa fa-close" style="font-size: 1.3em"></i></a>
							<a href="{{ route('evento.create', $c->id) }}" class="btn btn-danger" title="Agregar Evento"><i class="fa fa-birthday-cake" style="font-size: 1.3em"></i></a>
							
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>

@stop