
<body> 

		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Crear Colaborador</h3>
				</div>

				<div class="box-body">
					<div class="row">
					{!! Form::open(['action' => 'EvaluacionController@store','id'=>'formEvaluacion']) !!}
						<div class="col-md-6">
							<div class='form-group'>
								{!! Form::label('', 'Colaborador:') !!}
								{!! Form::select('id_usuario', $colaboradores,null ,['id'=>'listaColaboradores', 'style'=>'width:100%']) !!}
							</div>
						</div>
				

					<div class='form-group'  id="datosColaborador"></div>
					<div class='form-group'  id="datosEvaluacion"></div>

				<div class='form-group'>
					{!! Form::submit("Agregar Evaluación", ['class' => 'form-control btn btn-success ']) !!}
				</div>

				{!! Form::close() !!}
				<div class='form-group'>
					<div id="btnVolver" class="form-control btn btn-success " > Volver </div>
				</div>
				</div>
				
			</div>
		</div>
	</div>

</body>

<script type="text/javascript">
	$(document).ready(function() {
		
		$('#listaColaboradores').select2({
			placeholder: "Ingresar RUN Colaborador"
		}).val('').trigger('change');	

	});

	$('#listaColaboradores').on('select2:select', function (e) {
		
		if(e.params.data.id!=null){

			$.ajax({
				url: "/infoColaborador/"+e.params.data.id,
				type: "GET",
				success: function (datos) {
					$("#datosColaborador").html(datos);		

					$('#listaCompetencias').select2({
						placeholder: "Seleccione una Competencia"
					}).val('').trigger('change');	
				}
				});
		}
	});		


	$(document).on('change', '#listaCompetencias', function () {
		
		if(this.value!='')
		{	

			$.ajax({
			url: "/datosEvaluacion/"+this.value,
			type: "GET",
			success: function (datos) {
				$("#datosEvaluacion").html(datos);
			}

			});
	}
		
	});


</script>