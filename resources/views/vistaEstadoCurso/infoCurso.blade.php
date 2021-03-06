
	<div class="row">
		<div class="col-xs-12">
			<div class="box">			
				<div class="box-header">
					<h1 class="box-title">Infomación de Curso</h1>
				</div>
				<div class="box-body">
					<div class="col-xs-6">
						<div class="table-responsive">	
							<table class="table">
								<thead>
									<tr>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td >Nombre</td>
										<td >{{$infoCurso[0]->nombre_curso}}</td>
									</tr>	
									<tr>
										<td >Código SENCE</td>
										<td >{{$infoCurso[0]->cod_sence_curso}}</td>
									</tr>	
									<tr>
										<td >Código Interno</td>
										<td >{{$infoCurso[0]->cod_interno_curso}}</td>
									</tr>	
									<tr>
										<td >Objetivo</td>
										<td >{{$infoCurso[0]->objetivo_curso}}</td>
									</tr>	
									<tr>
										<td >Competencias</td>
										<td >
										
										@foreach(App\Curso::findOrFail($infoCurso[0]->id_curso)->listacompetencias as $competencia)
										<a href="../vistacompetencia?categoria={{$competencia->id_categoriacomp}}&competencia={{$competencia->id_comp}}">{{$competencia->nombre_comp}},</a>
										@endforeach
										</td>
									</tr>		
								</tbody>
							</table>
						</div>	
					</div>
					<div class="col-xs-12">
						<div class="table-responsive">	
							<table class="table">
								<thead>
									<tr>
										<th>RUN</th>
										<th>Nombre </th>
										<th>Fecha de Inicio </th>
										<th>Fecha de Termino </th>
										<th>Estado</th>
									</tr>
								</thead>
								<tbody>
									@foreach($infoCurso as $colaborador)
									<tr>
										<td ><a href="{{route('encuesta.VerColaborador', ['id' => $colaborador->id_usuario])}}">{{$colaborador->run_usuario}}</a></td>
										<td >{{$colaborador->nombre_usuario." ".$colaborador->apellidopat_usuario." ".$colaborador->apellidomat_usuario}}</td>
										<td >{{date('d/m/Y',strtotime($colaborador->fecha_inicio_actividad))}}</td>
										<td >{{date('d/m/Y',strtotime($colaborador->fecha_termino_actividad))}}</td>
										@if(date('d/m/Y',strtotime($colaborador->fecha_termino_actividad)) > date('d/m/Y'))
											<td >Finalizado</td>
										@else
											<td> En Proceso</td>
										@endif
									</tr>	
									@endforeach		
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
