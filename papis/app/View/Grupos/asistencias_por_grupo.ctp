<?php echo $this->Html->script(array('pestañas.js'),array('inline'=>false)); ?>



<!-- ***************** HEADER DE LA PÁGINA ********************* -->


<div class="container row">
	<div class="col-lg-12 center-block">
		<div class="row">
			<div class="col-lg-7 ">
				<h1><span class="label label-info titulo-grupo"><?php echo $nombre_grupo; ?></span><small class='titulo-grupo'> Seguimiento de Asistencias.</small></h1> 
				<h3 class="text-right">Gestión por Grupo.</h3>
			</div>
		
			<div class="btn-group col-lg-5">

				<h3 class="text-primary text-right ">
					<?php echo $this->Html->link('Gestión de Grupos', array(
									'controller' => 'grupos', 
									'action'=>'index'),array(
									'class'=> '')); ?>
				</h3><hr>
					<div class="text-right">
						<?php echo $this->Html->link('Eventos de '.$nombre_grupo, array('controller' => 'eventos', 'action'=>'evento_de_grupo', $grupo['Grupo']['id'], $cursopasado), array('class'=>"btn btn-xs btn-info")); ?>	
						<?php echo $this->Html->link('Volver a Ficha de '.$nombre_grupo, array('controller' => 'grupos', 'action'=>'ver', $grupo['Grupo']['id'], $cursopasado), array('class'=>"btn btn-xs btn-info")); ?>	
						<?php echo $this->Html->link('Crear evento', array('controller' => 'eventos', 'action'=>'add', $grupo['Grupo']['id']), array('class'=>"btn btn-xs btn-info")); ?>	

					</div>	
			</div>
		</div>		
	</div>
</div>	

<!-- ***************** ZONA MENSAJE ********************* -->
<?php // Para que se nois muestren todos los mensajes
				echo '<br>'.$this->Session->flash(); ?>

<!-- ***************** BODY DE LA PAGINA ********************* -->

	
<div class="container">	
	<div class="row">
		<div class="col-md-5">
			
			<div class="list-group">
				
				<h4 class="list-group-item-heading">Leyenda de nomenclatura:</h4>
				<p class="list-group-item-text"><small><strong>'A':</strong> <b>A</b>siste. Ha asistido.</small></p>
				<p class="list-group-item-text"><small><strong>'F':</strong> <b>F</b>alta. No ha asistido, y no ha justificado la ausencia.</small></p>
				<p class="list-group-item-text"><small><strong>'J':</strong> <b>J</b>ustifica. No ha asistido, pero ha justificado la ausencia.</small></p>
				<p class="list-group-item-text"><small><strong>'E':</strong> <b>E</b>xento. No tenía obligación de asistir.</small></p>
				
			</div>

		</div>
		<div class="col-md-7">

			<legend class="text-right">

			<p>Seguimiento de Asistencia de los participantes en el grupo: <?php echo $nombre_grupo; ?></p>
			<h2 class="color-primary"><small><strong> Todas las asistencias de los Alumnos del grupo</strong></small></h2> 
			
			</legend>
		</div>
	</div>	
</div> <!-- FIN Container -->

<div class="container">

	<?php foreach ($curso_academico as $id_c=>$c): ?> <!-- Generamos un bucle para cada curso académico -->

				<h1><?php echo '20'.$c; ?></h1>
				<?php $n=1; ?>
		  
	<!-- Generamos los cuadros con pestañas -->
-		
		<div class="tabs">
			
			<ul>	
				
				<?php foreach ($meses as $id_m=>$mes): ?> <!-- Una pestaña para cada mes -->
					
					<li><a href="#tabs-<?php echo $n++.'-'.$id_c; ?>"><?php echo $mes; ?></a></li>
				
				<?php endforeach ?>

			</ul>		
	
	<!-- Iniciamos la extracción de datos -->

			<?php $n=1; ?>
			<?php $mis_eventos=array(); ?>	
			
			<?php foreach ($meses as $id_m=>$mes): ?> <!-- para cada mes... -->
				<?php $e=array(); ?>
				<div id="tabs-<?php echo $n.'-'.$id_c;$n++; ?>"> <!-- creamos un div con un id que asociamos a cada pestaña -->

				<!-- CREAMOS UNA TABLA Y COMENZAMOS A EXTRAER LOS DATOS -->

					<table class="table table-striped"> <!-- CABECERA DE LA TABLA -->
						
						<thead >
							
							<th class="text-center"></th>
							<th class="text-center">Participante</th>
								
							<?php foreach ($lista_eventos_grupo as $evento): ?>  <!-- Iteramos la lista de EVENTOS... -->
								
								<?php if ($evento['Evento']['cursoacademico_id']==$id_c): ?> <!-- Filtramos los eventos por curso academico -->

									<?php $num_mes= explode("-", $evento['Evento']['fecha']); ?>
									
									<?php if ($num_mes[1]==$id_m): ?> <!-- Filtramos los eventos por mes -->
										
	<?php //debug($evento);exit(); ?>	
											<?php $e[]=$evento['Evento']['id'];?>
											<th class="text-center">
											
											<?php 
												$texto= $evento['Evento']['evento'];
												echo '<big>'.$num_mes[2].'</big><br>';
												echo $this->Form->postLink($texto, array('controller' => 'asistencias', 'action'=>'asistencia_por_evento', $evento['Evento']['id'], $grupo['Grupo']['id']), array('class'=>"btn btn-xs btn-warning")); ?>
												<?php //echo '<small><br>('.$evento['Evento']['fecha'].')</small>' ?>
											<?php //echo $evento['Evento']['evento'].'<br>('.$evento['Evento']['fecha'].')' ?>

											</th>

												

									<?php else: ?>
										
										<?php if (empty($evento)): ?>
											
											<div class="alert alert-warning">No hay eventos este curso</div>
										
										<?php endif ?>
									
									<?php endif ?> <!-- FIN filtro por mes -->

								<?php endif ?> <!-- FIN filtro por curso academico -->

							<?php endforeach ?> <!-- FIN Iteramos la lista de EVENTOS... -->

						</thead>
<?php //debug($mis_eventos);exit(); ?>
						<tbody>  <!-- CUERPO DE LA TABLA -->
							
							<?php foreach ($nombres_alumnos as $alumno): ?>
								
								<?php if ($alumno['Matricula']['cursoacademico_id']==$id_c): ?>
									
									<tr> <!-- extraemos los datos de cada alumno -->
									
									<td class="text-center"> <!-- Foto -->
										<?php $mis_asistencias=array(); ?>
										<?php $num_matricula=$alumno['Matricula']['id'] ?>
										<?php $nombre_foto= $alumno['Alumno']['foto'].'.jpg'?>
										<?php echo $image=$this->Html->image('fotos/'.$nombre_foto, array(
															'class'=>'',
															'alt' => 'foto',
															'width'=> '25 px',
															'url' => array(
										  								'controller' => 'alumnos', 
										  								'action'=>'ver', 
										  								$alumno['Alumno']['id']),
															//'height'=> '85 px'
															));	 ?>
									</td>
<?php //debug($alumno);exit(); ?>
									<td ><?php echo $alumno['Alumno']['nombre_completo']; ?></td><!-- Nombre -->

									<?php foreach ($e as $event): ?>
											
										
										<?php foreach ($alumno['Asistencia'] as $asistencia): ?>

											<?php if ($asistencia['evento_id']==$event): ?>
												
												<?php $dato= $asistencia['asistencia']; ?>
											
											<?php endif ?>

										<?php endforeach ?>
											<?php 
												switch ($dato) {
													case 'F':
														$alerta='label label-danger';
														break;
													case 'A':
														$alerta='label label-success';
														break;
													case 'J':
														$alerta='label label-warning';
														break;
													case 'E':
														$alerta='label label-primary';
														break;
													
													default:
														# code...
														break;
												}

											 ?>
											<td class="text-center"><span class="<?php echo $alerta; ?>"><?php echo $dato; ?></span></td>
											<?php $dato=''; ?>

									<?php endforeach ?>	
								
								<?php endif ?>

							<?php endforeach ?>
							
						</tbody>
					
					</table>

				</div>
				
			<?php endforeach ?> <!-- FIN enforeach para los meses en los datos -->
		</div> <!-- FIN cuadros con pestañas -->
	<?php endforeach ?>
</div> <!-- FIN Container -->


