@extends('template.admin')

@section('title', 'Registro de Emplementos')

@section('titulo', 'Regsitrar Implementos')

@section('content')

	{!! Form::open(['route'=>['inventario.update',$inv],'method'=>'PUT','class'=>'form-horizontal']) !!}
		<div class="form-group">
			{!! Form::label('Nombre','Nombre: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('nombre',$inv->nombre,['class'=>'form-control','placeholder'=>'Ej. Pelotas'] ) !!}
				</div>
		</div>
		
		<div class="form-group">
			{!! Form::label('cantidad','Cantidad: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('cantidad',$inv->cantidad,['class'=>'form-control','placeholder'=>'30'] ) !!}
				</div>
		</div>	

		<div class="form-group">
			{!! Form::label('observacion','Observacion: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('observacion',$inv->observacion,['class'=>'form-control','placeholder'=>'Comentario referente al item del inventario que se esta registrando'] ) !!}
				</div>
		</div>		

		<div class="form-group">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				{!! Form::submit('Guardar Cambios',['class'=>'btn btn-primary']) !!}
				{!! Form::reset('Limpiar campos',['class'=>'btn btn-danger'])!!}
			</div>
		</div>

	{!! Form::close() !!}
@stop