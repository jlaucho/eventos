@extends('template.admin')

@section('title', 'Asignacio y creacion de eventos')

@section('titulo', 'Asignar evento al Cliente: '.$cli->nombre)
@section('link')
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/jquery-ui/jquery-ui.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/TimePicki/css/timepicki.css')}}">
@stop

@section('content')

	{!! Form::open(['route'=>'evento.store','method'=>'POST','class'=>'form-horizontal']) !!}
		{{ Form::hidden('idCliente',$cli->id) }}
		<div class="form-group">
			{!! Form::label('Nombre','Nombre del Evento: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('nombre',NULL,['class'=>'form-control','placeholder'=>'Fiesta en Casa', 'required'=>'required']) !!}
				</div>
		</div>
		
		<div class="form-group">
			{!! Form::label('tipo_evento','Tipo de Evento: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('tipo_evento',NULL,['class'=>'form-control','placeholder'=>'Fiesta', 'required'=>'required'] ) !!}
				</div>
		</div>

		<div class="form-group">
			{!! Form::label('cant','Cantidad de Participante: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('cant_participante',NULL,['class'=>'form-control','placeholder'=>'69', 'required'=>'required']) !!}
				</div>
		</div>
		
		<div id="datepairExample1"> <!-- INICIO DE DIV DE FECHAS-->
			
		<div class="form-group">
			{!! Form::label('fecha_inicio','Fecha Inicio: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('fecha_inicio',NULL,['class'=>'form-control','placeholder'=>'AAAA/MM/DD', 'readonly'=>'readonly', 'required'=>'required'] ) !!}
				</div>
		</div>

		<div class="form-group">
			{!! Form::label('fecha_fin','Fecha Fin: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('fecha_fin',NULL,['class'=>'form-control','placeholder'=>'AAAA/MM/DD','readonly'=>'readonly', 'required'=>'required'] ) !!}
				</div>
		</div>

		<div class="form-group">
			{!! Form::label('hora_inicio','Hora Inicio: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('hora_inicio',NULL,['class'=>'form-control','placeholder'=>'HH:MM:SS', 'readonly'=>'readonly', 'required'=>'required'] ) !!}
				</div>
		</div>

		<div class="form-group">
			{!! Form::label('hora_fin','Hora FIN: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('hora_fin',NULL,['class'=>'form-control','placeholder'=>'HH:MM:SS', 'readonly'=>'readonly', 'required'=>'required'] ) !!}
				</div>
		</div>

		</div><!-- FIN DE DIV DE FECHAS-->
		<div class="form-group">
			{!! Form::label('nombre_resp','Nombre del Responsable: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('responsable',NULL,['class'=>'form-control','placeholder'=>'Jose Cardozo', 'required'=>'required'] ) !!}
				</div>
		</div>

		<div class="form-group">
			{!! Form::label('telf_resp','Telf. del Responsable: ',['class'=>'control-label col-sm-2']) !!}
				<div class="col-sm-8">
					{!! Form::text('telf_responsable',NULL,['class'=>'form-control','placeholder'=>'Jose Cardozo', 'required'=>'required'] ) !!}
				</div>
		</div>

		<div class="form-group">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				{!! Form::submit('Registrar Evento',['class'=>'btn btn-primary']) !!}
				{!! Form::reset('Limpiar campos',['class'=>'btn btn-danger'])!!}
			</div>
		</div>

	{!! Form::close() !!}
	    
@stop

@section('script')
	<script src="{{asset('plugins/jquery-ui/jquery-ui.js')}}" type="text/javascript"></script>
	<script type="text/javascript" src="{{asset('plugins/TimePicki/js/timepicki.js')}}"></script>

	<script>
	  $(function() {
	    $( "#fecha_inicio" ).datepicker({
	      defaultDate: "+1w",
	      changeMonth: true,
	      minDate:0,
	      numberOfMonths: 2,
	      dateFormat: 'yy/mm/dd',
	      onClose: function( selectedDate ) {
	        $( "#fecha_fin" ).datepicker( "option", "minDate", selectedDate );
	      }
	    });
	    $( "#fecha_fin" ).datepicker({
	      defaultDate: "+1w",
	      changeMonth: true,
	      numberOfMonths: 2,
	      dateFormat: 'yy/mm/dd',
	      onClose: function( selectedDate ) {
	        $( "#fecha_inicio" ).datepicker( "option", "maxDate", selectedDate );
	      }
	    });
	  });

	</script>
	
	<script type='text/javascript'>
	$('#hora_inicio, #hora_fin').timepicki({
		show_meridian:false,
		min_hour_value:0,
		max_hour_value:23,
		step_size_minutes:15,
		overflow_minutes:true,
		increase_direction:'up',
		disable_keyboard_mobile: true});
	</script>
	
	
@stop