@extends('template.admin')

@section('title', 'Asignacio de Personal')

@section('titulo', 'Cliente: ' .$cliente->nombre. ' Evento: '.$evento->nombre)

@section('content')

	{!! Form::open(['route'=>'actividades.store','method'=>'POST','class'=>'form-horizontal']) !!}
		{!! Form::hidden('evento',$evento->id) !!}

		<div class="form-group">
		{!! Form::label('fecha1',$evento->fecha_inicio,['class'=>'control-label col-sm-2']) !!}
			<div class="col-sm-8">
				{!! Form::textarea('actividad[0]',NUll,['class'=>'form-control']) !!}
				{!! Form::hidden('fechas[0]', $evento->fecha_inicio) !!}
			</div>
		</div>
		@if($evento->fecha_inicio != $evento->fecha_fin)<!-- Compara si las fechas son diferentes -->	
			<?php $cont = 1 ?> <!-- inicia un contador -->
			<?php do{ ?>			<!-- Comienza el ciclo cuando las fechas son diferentes -->
				@if($cont == 1)		<!-- contador es igual a 1, agregara 1 dia a la fecha inicial creando una nueva fecha -->
					<?php $nuevafecha = strtotime ( '+1 day' , strtotime ( $fecha ) ) ; ?>
				@else 				<!-- agregara dia a la nueva fecha mientras siga el ciclo -->
					<?php $nuevafecha = strtotime ( '+1 day' , strtotime ( $nuevafecha ) ) ; ?>
				@endif
                <?php $nuevafecha = date ( 'Y-m-d' , $nuevafecha ); ?><!-- Crea y da formato a la nueva fecha -->
				<div class="form-group">
                {!! Form::label('fecha',$nuevafecha,['class'=>'control-label col-sm-2']) !!}
					<div class="col-sm-8">
                		{!! Form::textarea('actividad['.$cont.']',NUll,['class'=>'form-control']) !!}
                		{!! Form::hidden('fechas['.$cont.']',$nuevafecha) !!}
                	</div>
                </div>
                <?php $cont++ ?>
          <?php }while($nuevafecha != $fecha2); ?>
		@endif
		
		<div class="form-group">
			<div class="col-sm-3"></div>
			<div class="col-sm-3">
				{!! Form::submit('Guardar Actividades',['class'=>'btn btn-success']) !!}
			</div>
		</div>

	{!! Form::close() !!}
@stop