@extends('template.admin')

@section('title', 'Registro de Usuarsio')

@section('titulo', 'Regsitrar Implementos')

@section('content')

	{!! Form::open(['route'=>'inventario.store','method'=>'POST','class'=>'form-horizontal']) !!}
		<div class="form-group">
			{!! Form::label('Nombre','Nombre: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('nombre',NULL,['class'=>'form-control','placeholder'=>'Ej. Pelotas'] ) !!}
				</div>
		</div>
		
		<div class="form-group">
			{!! Form::label('cantidad','Cantidad: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('cantidad',NULL,['class'=>'form-control','placeholder'=>'30'] ) !!}
				</div>
		</div>

		<div class="form-group">
			{!! Form::label('observacion','Observacion: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('observacion',NULL,['class'=>'form-control','placeholder'=>'Comentario referente al item del inventario que se esta registrando'] ) !!}
				</div>
		</div>		

		<div class="form-group">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				{!! Form::submit('Registrar Inventario',['class'=>'btn btn-primary']) !!}
				{!! Form::reset('Limpiar campos',['class'=>'btn btn-danger'])!!}
			</div>
		</div>

		
	{!! Form::close() !!}
@stop