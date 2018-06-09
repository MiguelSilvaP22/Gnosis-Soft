<div class="row">
	<div class="col-md-5">
		<h4>Evaluacion de Colaborador</h4>
	</div>
</div>

<div class="row">
	@foreach($roldesempenos as $roldesempeno)
	<div class="col-md-12">
		{!! Form::label('', $roldesempeno->nombre_roldesempeno) !!}
		<div class="row">
		<div class="col-md-12">

		<p>

		@foreach($tiponivel as $nivel)

		{!! $nivel->nombre_tiponivel !!}	 
		
			{!! Form::radio("prueba[$roldesempeno->id_roldesempeno]", $roldesempeno->id_roldesempeno."-".$nivel->id_tiponivel, null) !!} 

		@endforeach
		</p>
		</div>
</div>
	</div>
	@endforeach
</div>





