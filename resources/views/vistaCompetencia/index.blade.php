
@extends('admin.layout')
@section ('content')
<body> 
	@foreach ($competencias as $competencia)

		{!! $competencia->nombre_comp !!}

	@endforeach

</body>

@stop

@section('script-js')
<script>

</script>
@stop