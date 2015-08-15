
<?php $datos_sesiones= $grupo['Sesioneshorario'] ?>
	

	<?php foreach ($nombres_horarios as $nh): ?>
	<div id='horario' class="panel panel-info"><!-- Inicio del Panel -->
		<!-- 
		*
		*  Cabecera del Panel 
		*
		*-->
		<div class="panel-heading text-left">
			
			<div class="row">
				<div class="col-12" >
					
					<div class="col-md-2">
					<?php echo $this->Html->image('calendario.png', array(
														//'class'=>'col-md-2',
														'div'=>true,
														'alt' => 'calendario',
														//'width'=> '65px',
														'height'=> '35 px'));
					?>
					</div>

					<div class="col-md-8 text-center">
					Horario: <?php echo strtoupper($nh['Nombrehorario']['nombre']); ?>
					&nbsp;&nbsp;&nbsp;
					<?php echo $this->Html->link('', array(
							  								'controller' => 'sesioneshorarios', 
							  								'action'=>'gestionar_horario', 
							  								$grupo['Grupo']['id'], 
															$curso_actual['Cursoacademico']['id'],
															), 
														array(
																'class'=>"btn glyphicon glyphicon-pencil text-right")); ?>
					</div>
					
					<div class="col-md-2 text-left">

					<span class="btn glyphicon glyphicon-remove-sign boton_horario"></span></div>

				</div>
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
									
									<?php foreach ($datos_sesiones as $dato): ?> <!-- Recorremos los datos de todas las sesiones -->
								
										<?php if ($dato['dia']==$dia_semana && $dato['hora']==$hora_sesion && $dato['cursoacademico_id']==$cursopasado): ?>
											<span class="glyphicon glyphicon-ok text-success"></span>
										<?php endif ?>
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
