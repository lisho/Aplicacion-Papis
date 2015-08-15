
<?php echo $this->Html->script(array('addasistencia.js'),array('inline'=>false)) ?>
<?php $tabindex=1; ?>
<!-- ***************** HEADER DE LA PÁGINA ********************* -->


<div class="container row">
	<div class="col-lg-12 center-block">
		<div class="row">
			<div class="col-lg-7 ">
				<h1><span class="label label-info titulo-grupo"><?php echo $nombre_grupo; ?></span><small class='titulo-grupo'> Seguimiento de Asistencias.</small></h1> 
				<h3 class="text-right">Gestión por Evento.</h3>
			</div>
		
			<div class="btn-group col-lg-5">

				<h3 class="text-primary text-right ">
					<?php echo $this->Html->link('Gestión de Grupos', array(
									'controller' => 'grupos', 
									'action'=>'index'),array(
									'class'=> '')); ?>
				</h3><hr>
					<div class="text-right">

						<?php echo $this->Form->postLink('Asistencias de '.$nombre_grupo, array('controller' => 'grupos', 'action'=>'asistencias_por_grupo', $grupo), array('class'=>"btn btn-xs btn-info")); ?>	
						<?php echo $this->Html->link('Ficha de '.$nombre_grupo, array('controller' => 'grupos', 'action'=>'ver', $grupo, $cursopasado), array('class'=>"btn btn-xs btn-info")); ?>	
						<?php echo $this->Html->link('Crear evento', array('controller' => 'eventos', 'action'=>'add', $grupo), array('class'=>"btn btn-xs btn-info")); ?>
						<?php echo $this->Form->postLink(' ', array('controller' => 'asistencias', 'action'=>'asistencia_por_evento', $evento_id, $grupo), array('class'=>"btn btn-primary glyphicon glyphicon-share")); ?>		

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
				<p class="list-group-item-text"><strong><small>'A':</strong> <b>A</b>siste. Ha asistido.</small></p>
				<p class="list-group-item-text"><strong><small>'F':</strong> <b>F</b>alta. No ha asistido, y no ha justificado la ausencia.</small></p>
				<p class="list-group-item-text"><strong><small>'J':</strong> <b>J</b>ustifica. No ha asistido, pero ha justificado la ausencia.</small></p>
				<p class="list-group-item-text"><strong><small>'E':</strong> <b>E</b>xento. No tenía obligación de asistir.</small></p>
				
			</div>

		</div>
		<div class="col-md-7">
			<legend class="text-right">
			<p>Seguimiento de Asistencia al evento:</p>
			<?php 
				echo '<h2 class="color-primary">'.$asistencias[0]['Evento']['evento']; 
				echo '<small><strong> del día '.$asistencias[0]['Evento']['fecha'].'</strong>'; 
				echo '  ('.$asistencias[0]['Evento']['horainicio'].').</small></h2>'; 
			?>
			</legend>
		</div>
	</div>	

	<table class="table">
		
		<thead>
			<th></th>
			<th>Alumno</th>
			<th class="text-center">Asistencia</th>
			<th class="text-center">Observaciones</th>
			<th>Ultima modificación</th>

		</thead>

		<tbody>
<?php foreach ($asistencias as $a): ?>
			
			<tr>
			<td>

				<?php $nombre_foto= $dni_alumnos[$a['Matricula']['alumno_id']].'.jpg'?>
				<?php echo $image=$this->Html->image('fotos/'.$nombre_foto, array(
															'class'=>'',
															'alt' => 'foto',
															'width'=> '25 px',
															'url' => array(
										  								'controller' => 'alumnos', 
										  								'action'=>'ver', 
										  								$a['Matricula']['alumno_id']),
															//'height'=> '85 px'
															));	 ?>
<?php //debug($a);exit(); ?>
			</td>
			<td><?php echo $nombres_alumnos[$a['Matricula']['alumno_id']]; ?></td>
			<td class="text-center">
				<?php //echo $a['Asistencia']['asistencia']; ?>
				<?php echo $this->Form->input($a['Asistencia']['id'], array(
															'div'=>false,
															'class'=> 'form-control input-small text-center asist',
															'label'=> false,
															'size'=> 2,
															'maxlength'=> 2,
															'tabindex' => $tabindex++,
															'data-id' => $a['Asistencia']['id'],
															'value' => $a['Asistencia']['asistencia']
									)); ?>
			</td>
			<td class="text-center">
				<?php //echo $a['Asistencia']['observaciones']; ?>
				<?php echo $this->Form->input($a['Asistencia']['id'], array(
															'div'=>false,
															'class'=> 'form-control input-small text-center observ',
															'type'=>'textarea',
															'label'=> false,
															'rows' => '2',
															'cols' => '50',
															//'size'=> 2,
															//'maxlength'=> 2,
															'tabindex' => $tabindex++,
															'data-id' => $a['Asistencia']['id'],
															'value' => $a['Asistencia']['observaciones']
									)); ?>
			</td>
			<td><?php echo $a['Asistencia']['modified']; ?></td>

			</tr>
			
<?php endforeach ?>

		</tbody>
	
	</table>
</div>	
