@extends('template.admin')

@section('title', 'Edicion de Cliente')

@section('titulo', 'Editar Clientes')

@section('content')

	{!! Form::open(['route'=>['cliente.update', $cli],'method'=>'PUT','class'=>'form-horizontal']) !!}
		<div class="form-group">
			{!! Form::label('Nombre','Nombre y Apellido: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('nombre',$cli->nombre,['class'=>'form-control','placeholder'=>'Jose Cardozo'] ) !!}
				</div>
		</div>
		
		<div class="form-group">
			{!! Form::label('identificacion','Cédula: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('identificacion',$cli->identificacion,['class'=>'form-control','placeholder'=>'11222333'] ) !!}
				</div>
		</div>

		<div class="form-group">
			{!! Form::label('dir','Direccion: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('direccion',$cli->direccion,['class'=>'form-control','placeholder'=>'naranjal'] ) !!}
				</div>
		</div>

		<div class="form-group">
			{!! Form::label('telf1','Telf. Celular: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('telf1',$cli->telf1,['class'=>'form-control','placeholder'=>'0424654987'] ) !!}
				</div>
		</div>

		<div class="form-group">
			{!! Form::label('telf2','Telf. local: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('telf2',$cli->telf2,['class'=>'form-control','placeholder'=>'0424654987'] ) !!}
				</div>
		</div>

		<div class="form-group">
			{!! Form::label('correo','Correo: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('correo',$cli->correo,['class'=>'form-control','placeholder'=>'correo@correo.com'] ) !!}
				</div>
		</div>

		<div class="form-group">
			{!! Form::label('Observacion','Observaciones: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::textarea('observacion',$cli->observacion,['class'=>'form-control','placeholder'=>'Ingrese alguna observacion sobre el cliente'] ) !!}
				</div>
		</div>

		<div class="form-group">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				{!! Form::submit('Registrar Cliente',['class'=>'btn btn-primary']) !!}
				{!! Form::reset('Limpiar campos',['class'=>'btn btn-danger'])!!}
			</div>
		</div>

	{!! Form::close() !!}
@stop