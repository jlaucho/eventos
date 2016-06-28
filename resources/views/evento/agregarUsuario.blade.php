@extends('template.admin')

@section('title', 'Asignacio de Personal')

@section('titulo', 'Evento: '.$evento->nombre)

@section('content')

		{!! Form::open(['route'=>['asignar.update',$evento],'method'=>'PUT','class'=>'form-horizontal']) !!}
		
			<?php $n = 0 ?>
		@foreach($user as $persona)
			
			{{ Form::checkbox('usuario['.$n.']', $persona->id) }} - {{ $persona->nombre }} {{ $persona->apellido }}
			<?php echo $n = $n+1 ?>
		<br>
		@endforeach
		<div class="form-group">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				{!! Form::submit('Asignar Usuarios',['class'=>'btn btn-primary']) !!}
				{!! Form::reset('Limpiar campos',['class'=>'btn btn-danger'])!!}
			</div>
		</div>

	{!! Form::close() !!}

@stop