@extends('template.admin')

@section('title', 'Asignacio de Personal')

@section('titulo', 'Evento: '.$eve->nombre)

@section('content')

		{!! Form::open(['route'=>['implementos.update',$eve],'method'=>'PUT','class'=>'form-horizontal']) !!}
		
			<?php $n = 0 ?>
		@foreach($inven as $i)
			
			{{ Form::checkbox('implemento['.$n.']', $i->id) }} - {{ $i->nombre }}
			<?php echo $n = $n+1 ?>
		<br>
		@endforeach
		<div class="form-group">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				{!! Form::submit('Asignar',['class'=>'btn btn-primary']) !!}
				{!! Form::reset('Limpiar campos',['class'=>'btn btn-danger'])!!}
			</div>
		</div>

	{!! Form::close() !!}

@stop