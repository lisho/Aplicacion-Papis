
	

	<?php foreach ($nombres_horarios as $nh): ?>
	<div class="panel panel-info"><!-- Inicio del Panel -->
		<!-- 
		*
		*  Cabecera del Panel 
		*
		*-->
		<div class="panel-heading text-left">
			
			<div class="row">

				<div class="col-md-2">
					<?php echo $this->Html->image('calendario.png', array(
														//'class'=>'col-md-2',
														'div'=>true,
														'alt' => 'calendario',
														//'width'=> '65px',
														'height'=> '35 px'));
					?>
				</div>
					
				<div class="col-md-8">	
					Horario <?php echo strtoupper($nh['Nombrehorario']['nombre']); ?> del alumno para 20<?php echo $cursoacademico[$current_cursoacademico['Matricula']['cursoacademico_id']] ?><span class="glyphicon glyphicon-delete boton_horario"> </span>
				</div>	
				<div class="col-md-2 text-right"><span class="btn glyphicon glyphicon-remove-sign boton_horario"></span></div>
				
				
			</div>
		</div> <!-- *** FIN de la cabecera del panel *** -->
		<!-- 
		*
		* Cuerpo del Panel 
		* 
		* -->	
		<div class="panel-body">
			
			<table class="table table-striped table-bordered">						
				<thead>
						<th>Horario</th>		
							
						<?php foreach ($dias_semana as $id_ds=>$dia_semana): ?> <!-- Recorremos los dias de la semana para sacar los titulos de columna -->

							<th><?php echo $id_ds; ?></th>
							
						<?php endforeach ?>
				</thead>

				<tbody>
					<?php foreach ($horas_sesion as $hora_sesion): ?> <!-- Recorremos los bloques de horas -->

						<tr>
							<th><small><?php echo $hora_sesion; ?></small></th>
							
							<?php foreach ($dias_semana as $dia_semana): ?> <!-- Recorremos los dias para cada bloque de horas -->
						
								<td>
						<?php //debug($alumno_sesiones);exit();	 ?>			
									<?php foreach ($alumno_sesiones as $dato): ?> <!-- Recorremos los datos de todas las sesiones -->
										<?php foreach ($mis_grupos as $g): ?>
											
										
											<?php if ($dato['Sesioneshorario']['dia']==$dia_semana && $dato['Sesioneshorario']['hora']==$hora_sesion && $dato['Sesioneshorario']['cursoacademico_id']==$current_cursoacademico['Matricula']['cursoacademico_id'] && $dato['Sesioneshorario']['grupo_id']==$g['Grupo']['id']
												): ?>

												<small><?php echo $this->Html->link($dato['Grupo']['nombre'], array('controller'=>'grupos', 'action'=>'ver',$dato['Grupo']['id'],$dato['Sesioneshorario']['cursoacademico_id']), array('class'=>'label label-xs label-info'));?></small>
											<?php endif ?>

										<?php endforeach ?>

										<?php //debug($dato);exit(); ?>
									<?php endforeach ?> 

								<?php endforeach ?>	
							</td>									
						</tr>	
						
					<?php endforeach ?>

				</tbody>

			</table>

		</div><!-- *** FIN del cuerpo del panel *** -->

	</div><!-- *** FIN del panel *** -->

<?php endforeach ?>
