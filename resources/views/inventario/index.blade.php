@extends('template.admin')

@section('title', 'Lista de Usuario')

@section('titulo', 'Listado de Usuarios')

@section('content')
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Nombre</th><th>Cantidad</th><th>Accion</th>
			</tr>
		</thead>
		<tbody>
			@if($cantidad == 0)
				<tr>
					<td colspan="3">
						<div class="alert alert-info">No existen usuarios registrados</div>
					</td>
				</tr>
			@else 
				@foreach($inv as $i)
					<tr>
						<td>{{ $i->nombre }}</td>
						<td>{{ $i->cantidad }}</td>
						<td>
							<a href="{{ route('inventario.edit',$i->id) }}" class="btn btn-primary"><i class="fa fa-edit" style="font-size: 1.3em"></i></a>
							<a href="{{ route('inventario.destroy', $i->id) }}" class="btn btn-danger"><i class="fa fa-close" style="font-size: 1.3em"></i></a>
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>

@stop