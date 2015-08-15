
<?php echo $this->Html->script(array('pestañas.js'),array('inline'=>false)); ?>



<!-- ***************** HEADER DE LA PÁGINA ********************* -->


<div class="container row">
	<div class="col-lg-12 center-block">
		<div class="row">
			<div class="col-lg-7 ">
				<h1><span class="label label-info titulo-grupo"><?php echo $grupo['Grupo']['nombre']; ?></span><small class='titulo-grupo'> Gestión de eventos.</small></h1> 
			</div>
		
			<div class="btn-group col-lg-5">

				<h3 class="text-primary text-right ">
					<?php echo $this->Html->link('Gestión de Grupos', array(
									'controller' => 'grupos', 
									'action'=>'index'),array(
									'class'=> '')); ?>
				</h3><hr>
					<div class="text-right">
						<?php echo $this->Form->postLink('Asistencias de '.$grupo['Grupo']['nombre'], array('controller' => 'grupos', 'action'=>'asistencias_por_grupo', $grupo['Grupo']['id']), array('class'=>"btn btn-info")); ?>	
						<?php echo $this->Html->link('Volver a Ficha de '.$grupo['Grupo']['nombre'], array('controller' => 'grupos', 'action'=>'ver', $grupo['Grupo']['id'], $cursopasado), array('class'=>"btn btn-info")); ?>	
						<?php echo $this->Html->link('Crear evento', array('controller' => 'eventos', 'action'=>'add', $grupo['Grupo']['id']), array('class'=>"btn btn-info")); ?>	

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

	<?php foreach ($curso_academico as $id_c=>$c): ?>

				<h1><?php echo '20'.$c; ?></h1>
				<?php $n=1; ?>
		  <!-- Generamos los cuadros con pestañas -->
		
		<div class="tabs">
			
		<ul>	
			
			<?php foreach ($meses as $id=>$mes): ?>
				
				<li><a href="#tabs-<?php echo $n++.'-'.$id_c; ?>"><?php echo $mes; ?></a></li>
			
			<?php endforeach ?>

		</ul>	
				<?php $n=1; ?>	
			<?php foreach ($meses as $id=>$mes): ?>
			<?php //debug($curso_academico);exit(); ?>
				
				<div id="tabs-<?php echo $n.'-'.$id_c;$n++; ?>">	

					<table class="table table-striped">
						<thead>
							
							<th>Fecha</th>
							<th>Evento</th>
							<th>Tipo</th>
							<th>Descripción</th>
							<th class="text-center">Hora Inicio</th>
							<th class="text-center">A</th>
							<th class="text-center">J</th>
							<th class="text-center">F</th>
							<th class="text-center">Total</th>
							<th class="text-center">Asistencias</th>
							<th class="text-center">Editar</th>
							<th class="text-center">Borrar</th>

						</thead>
						
						<tbody>

							<?php foreach ($eventos as $evento): ?>

								<?php $num_mes= explode("-", $evento['Evento']['fecha']); ?>
								<?php //debug($num_mes);exit(); ?>
								<?php $a=0;$f=0;$j=0; ?>

								<?php if ($evento['Evento']['cursoacademico_id']==$id_c && $num_mes[1]==$id): ?>

											<?php foreach ($evento['Asistencia'] as $asistencia): ?> <?php //debug($asistencia['asistencia']);exit(); ?>
													<?php if ($asistencia['asistencia']=='A'): ?>
														<?php $a++; ?>
													<?php elseif ($asistencia['asistencia']=='J'): ?>
														<?php $j++; ?>
													<?php elseif ($asistencia['asistencia']=='F'): ?>
														<?php $f++; ?>
													<?php endif ?>
																		
											<?php endforeach ?>

									<tr>
										<th><?php echo $evento['Evento']['fecha']; ?></th>
										<td><?php echo $evento['Evento']['evento']; ?></td>
										<td><?php echo $evento['Tipoevento']['tipoevento']; ?></td>
										<td><?php echo $evento['Tipoevento']['descripcion']; ?></td>
										<td class="text-center"><?php echo $evento['Evento']['horainicio']; ?></td>
										<td class="text-center alert-success"><?php echo $a; ?></td>
										<td class="text-center alert-warning"><?php echo $j; ?></td>
										<td class="text-center alert-danger"><?php echo $f; ?></td>
										<td class="text-center"><?php echo count($evento['Asistencia']); ?></td>
										<td class="text-center"><?php echo $this->Form->postLink(' ', array('controller'=>'asistencias', 'action'=>'asistencia_por_evento',$evento['Evento']['id'],$evento['Evento']['grupo_id']), array('class'=>'label label-info glyphicon glyphicon-check')); ?></td>
										<td class="text-center"><?php echo $this->Html->link(' ', array('controller'=>'eventos', 'action'=>'edit',$evento['Evento']['id']), array('class'=>'label label-primary glyphicon glyphicon-pencil')); ?></td>
										<td class="text-center"><?php echo $this->Form->postLink(' ', array('controller' => 'eventos','action'=>'delete', $evento['Evento']['id'],$evento['Evento']['grupo_id']), array('class'=>"label label-danger glyphicon glyphicon-remove",'confirm'=> '¿Estás seguro de que quieres eliminar este evento?')); ?></td>
									</tr>	
								<?php endif ?>
								
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				
			<?php endforeach ?>
		</div> <!-- FIN cuadros con pestañas -->
	<?php endforeach ?>

</div>