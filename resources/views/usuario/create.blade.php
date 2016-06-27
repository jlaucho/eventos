@extends('template.admin')

@section('title', 'Registro de Usuarsio')

@section('titulo', 'Regsitrar Usuario')

@section('content')

       

	{!! Form::open(['route'=>'usuario.store','method'=>'POST','class'=>'form-horizontal']) !!}
		<div class="form-group">
			{!! Form::label('Nombre','Nombre: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('nombre',NULL,['class'=>'form-control','placeholder'=>'Carlos', 'required'=>'required'] ) !!}
				</div>
		</div>
		<div class="form-group">
			{!!  Form::label('apelido','Apellido: ',['class'=>'control-label col-sm-2']) !!}
			<div class="col-sm-8">
				{!! Form::text('apellido', NULL,['class'=>'form-control','placeholder'=>'Gonzalez', 'required'=>'required']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('cedula','Cedula ó RIF: ',['class'=>'control-label col-sm-2']) !!}
			<div class="col-sm-8">
				{!! Form::text('cedula',NULL,['class'=>'form-control','placeholder'=>'12345678', 'required'=>'required']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('telf1','Telefono Celular: ',['class'=>'control-label col-sm-2']) !!}
			<div class="col-sm-8">
				{!! Form::text('telf1',NULL,['class'=>'form-control','placeholder'=>'042402120261', 'required'=>'required'])!!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('telf2','Telefono local',['class'=>'control-label col-sm-2']) !!}
			<div class="col-sm-8">
				{!! Form::text('telf2',NULL,['class'=>'form-control','placeholder'=>'026177777', 'required'=>'required'])!!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('nivel','nivel de usuairo',['class'=>'control-label col-sm-2']) !!}
			<div class="col-sm-8">
				{!! Form::select('nivel',[''=>'Seleccione','admin'=>'Admin','user'=>'User'],NULL,['class'=>'form-control', 'required'=>'required'])!!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('email','Correo Electronico',['class'=>'control-label col-sm-2']) !!}
			<div class="col-sm-8">
				{!! Form::email('email',NULL,['class'=>'form-control','placeholder'=>'correo@correo.com', 'required'=>'required'])!!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('clave','Clave',['class'=>'control-label col-sm-2']) !!}
			<div class="col-sm-8">
				{!! Form::password('password',['class'=>'form-control','placeholder'=>'clave de usuario', 'required'=>'required'])!!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('password_confirmation','Repetir Clave',['class'=>'control-label col-sm-2']) !!}
			<div class="col-sm-8">
				{!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'repetir clave', 'required'=>'required'])!!}
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				{!! Form::submit('Agregar Usuario',['class'=>'btn btn-primary']) !!}
				{!! Form::reset('Limpiar campos',['class'=>'btn btn-danger'])!!}
			</div>
		</div>

		
	{!! Form::close() !!}
@stop		