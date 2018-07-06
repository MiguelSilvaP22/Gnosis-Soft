@extends('admin.layout')

@section ('content')

<h1>Bienvenido a GnosisSoft - Admin Dashboard</h1>
<body>
	<!-- Calendario -->
	<div class="col-md-10">
    <div class="box box-primary">
      <div class="box-body no-padding">
				<div id='calendar'></div>		
			</div>
		</div>
	</div>
</body>
@stop
@section ('script-js')
<script type="text/javascript">
$(document).ready(function() {

$('#calendar').fullCalendar({
	defaultView: 'agendaWeek',
      defaultDate: Date.now(),
			contentHeight: 'auto',
      eventLimit: true, // allow "more" link when too many events
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'agendaDay,agendaTwoDay,agendaWeek,month'
      },
      views: {
				agendaWeek:{
				},
        agendaTwoDay: {
          type: 'agenda',
          duration: { days: 2 },
					slotDuration: '02:00:00',

          // views that are more than a day will NOT do this behavior by default
          // so, we need to explicitly enable it
          groupByResource: true

          //// uncomment this line to group by day FIRST with resources underneath
          //groupByDateAndResource: true
        }
      },
  events: [
		@foreach($actividades as $actividad) 
				@foreach($actividad->horarios as $horario)
						@if($horario->fecha_horario!=null)
						{
							title: '{{$actividad->curso->nombre_curso}}',
							start: '{{date('Y-m-d',strtotime($horario->fecha_horario))}}T{{$horario->hora_inicio_horario}}',
							end: '{{date('Y-m-d',strtotime($horario->fecha_horario))}}T{{$horario->hora_termino_horario}}'
						},
						@endif
				@endforeach
		@endforeach
	{
	  title: 'Todo el dia',
	  start: '2018-04-23'
	}

  ]
});

});

</script>
@stop

