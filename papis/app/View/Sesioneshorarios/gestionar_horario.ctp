
<?php 
	$estado= 'no_activo'; 
	$div_id=1;
	?>
	
<br><br><br><br><br>

			
			
			<?php // Para que se nois muestren todos los mensajes
							echo $this->Session->flash();
							echo $this->Flash->render(); ?>
			
<?php foreach ($nombres_horarios as $nh): ?>


	<div class="panel panel-info"><!-- Inicio del Panel -->
		<!-- 
		*
		*  Cabecera del Panel 
		*
		*-->
		<div class="panel-heading text-left">
			<div class="row"><div class="col-md-12">
				
					<div class="col-md-2">
						<?php echo $this->Html->image('calendario.png', array(
												//'class'=>'thumbnail foto',
												'alt' => 'pdf',
												//'width'=> '65px',
												'height'=> '50 px'));
						?>
					</div>

					<div class="col-md-7 text-center">
						<h4>Horario <?php echo $nh['Nombrehorario']['nombre']?> 
							del Grupo <?php echo $this->Form->postLink($grupo_actual[0]['Grupo']['nombre'], array(
																						'controller'=>'grupos',
																						'action'=>'ver',
																						$grupo_actual[0]['Grupo']['id'],
																						$cursopasado), array(
																								'class'=>'btn btn-xs btn-primary')
																						); ?>
							para el Curso Académico <?php echo $cursopasado_nombre[$cursopasado]; ?>.</h4>
					</div>
					<div class="col-md-3 text-right">
						<?php echo $this->Form->postLink(' Volver a '.$grupo_actual[0]['Grupo']['nombre'], array(
																						'controller'=>'grupos',
																						'action'=>'ver',
																						$grupo_actual[0]['Grupo']['id'],
																						$cursopasado), array(
																								'class'=>'btn btn-primary glyphicon glyphicon-log-out')
																						); ?>
					</div>
				</div>
			</div>
		</div> <!-- *** FIN de la cabecera del panel *** -->

		<!-- 
		*
		* Cuerpo del Panel 
		* 
		* -->	
		<div class="panel-body">
			
			<table class="table table-striped table-bordered text-center">						
				<thead >
						<th class="text-center">Horario</th>		
							
						<?php foreach ($dias_semana as $id_ds=>$dia_semana): ?> <!-- Recorremos los dias de la semana para sacar los titulos de columna -->

							<th class="text-center"><?php echo $id_ds; ?></th>
							
						<?php endforeach ?>
				</thead>

				<tbody>
					<?php foreach ($horas_sesion as $id_hora=>$hora_sesion): ?> <!-- Recorremos los bloques de horas -->

						<tr>
							<th><?php echo $hora_sesion; ?></th>
							
							<?php foreach ($dias_semana as $dia_semana): ?> <!-- Recorremos los dias para cada bloque de horas -->
						
								<td>
									
									<?php foreach ($datos_sesiones as $dato): ?> <!-- Recorremos los datos de todas las sesiones -->
										

																					
										<?php if($dato['Sesioneshorario']['dia']==$dia_semana && 
													$dato['Sesioneshorario']['hora']==$hora_sesion && 
													$dato['Sesioneshorario']['cursoacademico_id']==$cursopasado): ?>
											

											<?php echo $this->Form->postLink(' ', array(
													'controller'=>'sesioneshorarios',
													'action'=>'borra_sesion',
													$dato['Sesioneshorario']['id'],
													$grupo_actual[0]['Grupo']['id'],
													$cursopasado
													), array(
															'class'=>'btn glyphicon glyphicon-ok btn-success')); 
											?>
											<?php $estado= 'activo' ?>


										<?php endif ?>
										
									<?php endforeach ?>
											<?php if ($estado== 'no_activo'): ?>
											
												<?php echo $this->Form->postLink(' ', array(
													'controller'=>'sesioneshorarios',
													'action'=>'crea_sesion',
												
													$dia_semana,
													$id_hora,
													$grupo_actual[0]['Grupo']['id'],
													$cursopasado,
													$nh['Nombrehorario']['id']
													), array(
															'class'=>'btn glyphicon glyphicon-remove btn-danger')); 
											?>
<?php //debug($nh['Nombrehorario']['id']); ?>	
											<?php else: ?>	
												<?php $estado= 'no_activo'; ?>
											<?php endif ?>
											

								</td>
							<?php endforeach ?>									
						</tr>	
						
					<?php endforeach ?>

				</tbody>

			</table>

		</div><!-- *** FIN del cuerpo del panel *** -->

	</div><!-- *** FIN del panel *** -->

<?php endforeach ?>
