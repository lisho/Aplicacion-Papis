
<!-- ***************** Listado de alumnos ********************* -->
<h1><span class="label titulo-grupo">Horario Completo.</span></h1>
<h1 class="text-center"><small class=' titulo-grupo'>Todos los grupos por año académico.</small></h1><hr>

	<?php // Para que se nois muestren todos los mensajes
				echo $this->Session->flash(); ?>

<?php foreach ($nombres_horarios as $nh): ?> <!-- Recorremos los nombres de calendario -->
	
	<?php foreach ($cursos_academicos as $id=>$curso_academico): ?> <!-- Recorremos los cursos academicos -->
	
		<?php if (in_array($curso_academico['Cursoacademico']['id'], $cursos_existen)): ?> <!-- *** IF que comprueba si existe un curso academico *** -->
					
			<div class="panel panel-info"> <!-- Inicio del Panel -->
				
				<!-- 
				*
				*  Cabecera del Panel 
				*
				*-->
				<div class="panel-heading"> 
					<div class="row">
						<div class="glyphicon glyphicon-object-align-bottom col-md-8">  Horario Integrado: Tipo: <?php echo $nh['Nombrehorario']['nombre']; ?>. Año Académico: <?php echo $curso_academico['Cursoacademico']['cursoacademico']; ?> </div>
					</div>
				</div><!-- FIN de la Cabecera del Panel -->
				
				<!-- 
				*
				* Cuerpo del Panel 
				* 
				* -->	
				<div id="" class="panel-body persiana"> 

					<table class="table table-striped table-bordered">						
						<thead>
								<th>Horario</th>		
									
								<?php foreach ($dias_semana as $dia_semana): ?> <!-- Recorremos los dias de la semana para sacar los titulos de columna -->

									<th><?php echo $dia_semana; ?></th>
									
								<?php endforeach ?>
						</thead>

						<tbody>
							
							<?php foreach ($horas_sesion as $hora_sesion): ?> <!-- Recorremos los bloques de horas -->

								<tr>
									<th><?php echo $hora_sesion; ?></th>
									
									<?php foreach ($dias_semana as $dia_semana): ?> <!-- Recorremos los dias para cada bloque de horas -->
								
										<td>
											
											<?php foreach ($datos_sesiones as $dato): ?> <!-- Recorremos los datos de todas las sesiones -->

<?php /* debug(array($dato['Sesioneshorario']['hora'],
					$hora_sesion,
					$dato['Sesioneshorario']['dia'],
					$dia_semana,
					$dato['Cursoacademico']['curso'],
					$curso_academico['Cursoacademico']['cursoacademico'],
					$dato['Nombrehorario']['nombre'],
					$nh['Nombrehorario']['nombre']
					)); */?>
												<?php if ($dato['Cursoacademico']['curso']== $curso_academico['Cursoacademico']['cursoacademico']): ?>
																					
													<div class="list-group">							
														<!-- Comparamos con los correctos para esta casilla y pintamos -->
														<?php if ($dato['Sesioneshorario']['hora']== $hora_sesion &&
																	$dato['Sesioneshorario']['dia']== $dia_semana &&
																	//$dato['Cursoacademico']['curso']== $curso_academico['Cursoacademico']['cursoacademico'] && 
																	$dato['Nombrehorario']['nombre']==$nh['Nombrehorario']['nombre']): ?>
															
					<!-- *** *********** Generamos cada enlace al grupo que corresponda ********* *** -->								
						<?php echo $this->Html->link($dato['Grupo']['nombre'], array(
																					'controller' => 'grupos',
																					'action'=>'ver',
																					$dato['Grupo']['id'],
																					$dato['Cursoacademico']['id']),
																				array(
																					'class'=>'list-group-item')) ?>

					<!-- *** ************************************************************** *** -->
															
														<?php endif ?>
													</div>	

												<?php endif ?>
											<?php endforeach ?>
										<?php endforeach ?>	
									</td>									
								</tr>	
								
							<?php endforeach ?>

						</tbody>

					</table>
<?php //exit(); ?>				
				</div> <!-- *** FIN del cuerpo del panel *** -->
			</div> <!-- *** FIN del panel *** -->
		<?php endif ?> <!-- *** FIN IF que comprueba si existe un curso academico *** -->
	<?php endforeach ?> <!-- *** FIN foreach que nos recorre los cursos academicos *** -->
<?php endforeach ?> <!-- *** FIN foreach que recorre los nombres de Horario *** -->

