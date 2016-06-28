@extends('template.admin')

@section('title', 'Lista de Usuario')

@section('titulo', 'Listado de Usuarios')

@section('content')
	
	<table class="table table-hover">
		<tbody>
			<tr>
				<td><label>Titulo</label></td>
				<td><label class="label label-default" style="font-size:1em">{{ $eve->nombre }}</label></td>
				<td><label>Tipo de Evento</label></td>
				<td><label class="label label-default" style="font-size:1em">{{ $eve->tipo_evento }}</label></td>
			</tr>
			<tr>
				<td><label>Fecha de Inicio</label></td>
				<td><label class="label label-default" style="font-size:1em">{{ $eve->fecha_inicio }}</label></td>
				<td><label>Fecha Culminacion</label></td>
				<td><label class="label label-default" style="font-size:1em">{{ $eve->fecha_fin }}</label></td>
			</tr>
			<tr>
				<td><label>Hora de Inicio</label></td>
				<td><label class="label label-default" style="font-size:1em">{{ $eve->hora_inicio }}</label></td>
				<td><label>Hora Culminacion</label></td>
				<td><label class="label label-default" style="font-size:1em">{{ $eve->hora_fin }}</label></td>
			</tr>
			<tr>
				<td><label>Reponsable</label></td>
				<td><label class="label label-default" style="font-size:1em">{{ $eve->responsable }}</label></td>
				<td><label>Telefono</label></td>
				<td><label class="label label-default" style="font-size:1em">{{ $eve->telf_responsable }}</label></td>
			</tr>
			<tr>
				<td><label>Cliente</label></td>
				<td><label class="label label-default" style="font-size:1em">{{ $eve->cliente->nombre }}</label></td>
				<td><label>Cantidad de Personas</label></td>
				<td><label class="label label-default" style="font-size:1em">{{ $eve->cant_participante }}</label></td>
			</tr>
			<tr>
				<td colspan="4" align="center"><label><i class="fa fa-smile-o"></i> Personal que participaran en el evento <i class="fa fa-smile-o"></i></label>
				<a href="{{ route('asignar.edit', $eve->id) }}" title="agregar mas" class="btn btn-info">
					<i class="fa fa-group" style="font-size:1.3em"></i>
				</a>
				</td>
			</tr>
			@foreach($usu as $u)
				<tr>
					<td colspan="4">
						<ul>
							<li><label>{{ $u->usuario->nombre }} {{ $u->usuario->apellido }}</label></li>
						</ul>
					</td>
				</tr>
			@endforeach
			<tr>
				<td colspan="4" align="center"><label><i class="fa fa-soccer-ball-o"></i> Implementos <i class="fa fa-soccer-ball-o"></i>
					<a href="{{ route('implementos.edit', $eve->id) }}" class="btn btn-warning" title="Agregar Implementos"><i class="fa fa-trophy" style="font-size: 1.3em"></i></a>
				</label>	
				</td>
			</tr>
			@foreach($inv as $i)
				<tr>
					<td colspan="4">
						<ul>
							<li><label>{{ $i->inventario->nombre}}</label></li>
						</ul>
					</td>
				</tr>
			@endforeach
			<tr>
				<td colspan="4" align="center"><label><i class="fa fa-calendar"> Actividades <i class="fa fa-bullhorn"></label></td>
			</tr>
			@foreach($act as $a)
				<tr>
					<td colspan="4">
						<ul>
							<li><label>{{ $a->fecha }}: {{ $a->actividades}}</label></li>
						</ul>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop