@extends('template.admin')

@section('title', 'Edición de Usuarsio')

@section('titulo', 'Editar Usuario: '.$user->nombre.' '.$user->apellido)

@section('content')

	{!! Form::open(['route'=>['usuario.update',$user],'method'=>'PUT','class'=>'form-horizontal']) !!}
		<div class="form-group">
			{!! Form::label('Nombre','Nombre: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('nombre',$user->nombre,['class'=>'form-control','placeholder'=>'Carlos'] ) !!}
				</div>
		</div>
		<div class="form-group">
			{!!  Form::label('apelido','Apellido: ',['class'=>'control-label col-sm-2']) !!}
			<div class="col-sm-8">
				{!! Form::text('apellido', $user->apellido,['class'=>'form-control','placeholder'=>'Gonzalez']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('cedula','Cedula: ',['class'=>'control-label col-sm-2']) !!}
			<div class="col-sm-8">
				{!! Form::text('cedula',$user->cedula,['class'=>'form-control','placeholder'=>'12345678']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('telf1','Telefono Celular: ',['class'=>'control-label col-sm-2']) !!}
			<div class="col-sm-8">
				{!! Form::text('telf1',$user->telf1,['class'=>'form-control','placeholder'=>'042402120261'])!!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('telf2','Telefono local',['class'=>'control-label col-sm-2']) !!}
			<div class="col-sm-8">
				{!! Form::text('telf2',$user->telf2,['class'=>'form-control','placeholder'=>'026177777'])!!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('nivel','nivel de usuairo',['class'=>'control-label col-sm-2']) !!}
			<div class="col-sm-8">
				{!! Form::select('nivel',['admin'=>'Admin','user'=>'User'],$user->nivel,['class'=>'form-control','placeholder'=>'Seleccione uno'])!!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('email','Correo Electronico',['class'=>'control-label col-sm-2']) !!}
			<div class="col-sm-8">
				{!! Form::text('email',$user->email,['class'=>'form-control','placeholder'=>'correo@correo.com'])!!}
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