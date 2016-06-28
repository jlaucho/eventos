@extends('template.admin')

@section('title', 'Lista de Usuario')

@section('titulo', 'Listado de Usuarios')

@section('content')
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Nombre</th><th>tipo</th><th>Accion</th><th>Estatus</th>
			</tr>
		</thead>
		<tbody>
			@if($cant == 0)
				<tr>
					<td colspan="4">
						<div class="alert alert-info">No existen eventos registrados</div>
					</td>
				</tr>
			@else 

				@foreach($evento as $e)
					<tr>
						<td>{{ $e->nombre }} </td>
						<td>{{ $e->tipo_evento }}</td>
						<td>
							<a href="{{ Route('evento.show',$e->id) }}" class="btn btn-info" title="Ver Detalles">
								<i class="fa fa-search-plus" style="font-size: 1.3em"></i>
							</a>
						</td>
						@if($fa < $e->fecha_inicio)
							<td><span class="btn btn-default">Evento Pendiente por Comenzar <i class="fa fa-hourglass-2"></i></span></td>
						@elseif($fa > $e->fecha_fin)
								<td><span class="btn btn-warning">  Evento Culminado <i class="fa fa-check-square-o"></i></span></td>
							@elseif($fa >= $e->fecha_inicio && $fa <= $e->fecha_fin)
									<td><span class="btn btn-success">Evento en Proceso <i class="fa fa-child"></i></span></td>	
						@endif
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
	@if($cant != 0)
		{!! $evento->render() !!}
	@endif
@stop