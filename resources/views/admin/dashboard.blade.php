@extends('admin.layout')

@section ('content')
<body>
	<!-- Calendario -->
	<div class="col-md-12">
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
  header: {
	left: 'prev,next today',
	center: 'title',
	right: 'month,basicWeek,basicDay'
  },
  defaultDate: '2018-04-24',
  navLinks: true, // can click day/week names to navigate views
  editable: true,
  eventLimit: true, // allow "more" link when too many events
  events: [
	{
	  title: 'Todo el dia',
	  start: '2018-04-23',
	  backgroundColor: 'red', 
      borderColor    : 'red' 
	},
	{
	  title: 'Evento largo',
	  start: '2018-04-07',
	  end: '2018-04-10',
	  backgroundColor: '#00a65a', //Success (green)
      borderColor    : '#00a65a' //Success (green)
	},
	{
	  id: 999,
	  title: 'Evento',
	  start: '2018-04-09T16:00:00',
	  backgroundColor: '#00c0ef', //Info (aqua)
      borderColor    : '#00c0ef' //Info (aqua)
	},
	{
	  id: 999,
	  title: 'Evento',
	  start: '2018-04-16T16:00:00',
	  backgroundColor: '#00c0ef', //Info (aqua)
      borderColor    : '#00c0ef' //Info (aqua)
	},
	{
	  title: 'Conferencia',
	  start: '2018-04-11',
	  end: '2018-04-13',
	  backgroundColor: 'red', 
      borderColor    : 'red'
	},
	{
	  title: 'Cita',
	  start: '2018-04-12T10:30:00',
	  end: '2018-04-12T12:30:00',
	  backgroundColor: 'orange', 
      borderColor    : 'orange'
	},
	{
	  title: 'Almuerzo',
	  start: '2018-04-12T12:00:00',
	  backgroundColor: 'brown', 
      borderColor    : 'brown'
	},
	{
	  title: 'Cita',
	  start: '2018-04-12T14:30:00',
	  backgroundColor: 'orange', 
      borderColor    : 'orange'
	},
	{
	  title: 'Happy Hour',
	  start: '2018-04-12T17:30:00',
	  backgroundColor: 'blue', 
      borderColor    : 'blue'
	},
	{
	  title: 'Cena',
	  start: '2018-04-12T20:00:00'
	},
	{
	  title: 'Fiesta de cumpleaños',
	  start: '2018-04-13T07:00:00',
	  backgroundColor: 'blue', 
      borderColor    : 'red'
	},
	{
	  title: 'Google',
	  url: 'http://google.com/',
	  start: '2018-04-28'
	}
  ]
});

});

</script>
@stop

