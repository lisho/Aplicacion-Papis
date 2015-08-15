

<!-- ******* Panel de datos generales ******** -->
<div class=" text-center">

</div>	
	<div class="panel panel-info"> <!-- ******* Inicio Panel ******** -->
	  <!-- Default panel contents -->

	  	<div class="panel-heading"> <!-- *** Cabecera del Panel *** -->

	  		<div class="row text-center">
					

					<p><?php //echo '&nbsp;'.$alumno['Alumno']['nombre']?></p>
					<p><?php //echo '&nbsp;'.$alumno['Alumno']['apellidos']; ; ?></p>

					
						<?php echo $this->Html->link('  Editar Alumno', array(
	  								'controller' => 'alumnos', 
	  								'action'=>'editar', 
	  								$alumno['Alumno']['id']), array(
	  													'class'=>"btn btn-warning btn-xs glyphicon glyphicon-pencil")); ?>
						

						<?php /*echo $this->Html->image('calendario.png', array(
												'class'=>'btn boton_horario',
												'alt' => 'pdf',
												'id' => 'boton_horario',
												//'width'=> '65px',
												'height'=> '45 px'));*/?>


	  		
	  					<?php //echo $this->Html->link('', array(
	  							//	'controller' => 'matriculas', 
	  							//	'action'=>'nuevo', 
	  							//	$alumno['Alumno']['id']), array(
	  							//						'class'=>"btn btn-warning btn-xs glyphicon glyphicon-check")); ?>
				
			</div>
		</div>	<!-- *** Fin Cabecera del Panel *** -->

		<div class="panel-body"> <!-- *** Cuerpo del Panel *** -->
				

			<!-- *** Inicio Modulo FOTO *** -->		

				<?php 
					$dni= $alumno['Alumno']['dni'];
					$nombre_foto= $alumno['Alumno']['foto'].'.jpg';
					$foto = $dir->find($nombre_foto, true);

					$image= $this->Html->image('fotos/default-h.png', array(
															'class'=>'thumbnail foto',
															'alt' => 'foto',
															'width'=> '150 px',
															'url' => array(
										  								'controller' => 'alumnos', 
										  								'action'=>'editar', 
										  								$alumno['Alumno']['id']),
															//'height'=> '85 px'
															));
					if (!empty($foto)) {
						
					$image=$this->Html->image('fotos/'.$nombre_foto, array(
															'class'=>'thumbnail',
															'alt' => 'foto',
															'width'=> '150 px',
															'url' => array(
										  								'controller' => 'alumnos', 
										  								'action'=>'editar', 
										  								$alumno['Alumno']['id']),
															//'height'=> '85 px'
															));	
					}

					echo $this->Html->div(null, $image, array('class' => 'btn well well-lg col-md-12',
																	));
				 ?>
			<!-- *** Fin Modulo FOTO *** -->


				<p>DNI:<strong> <?php echo $alumno['Alumno']['dni'] ?></strong></p>
				<p>NOMBRE:<strong> <?php echo $alumno['Alumno']['nombre'] ?></strong></p>
				<p>APELLIDOS:<strong> <?php echo $alumno['Alumno']['apellidos'] ?></strong></p>
				<p>TELÉFONO:<strong> <?php echo $alumno['Alumno']['telefono'] ?></strong></p>
				<hr>
				<p><strong>Matriculas en PAPIS: </strong></p>
				
				<!-- *** Botón Nueva matrícula *** -->

				<p class="text-center"><?php echo $this->Html->link('  Matricular', array(
		  								'controller' => 'matriculas', 
		  								'action'=>'nuevo', 
		  								$alumno['Alumno']['id']), array(
		  													'class'=>" btn btn-warning btn-xs glyphicon glyphicon-plus text-right")); ?>

				<?php echo $this->Html->link('  Asistencias', array(
		  								'controller' => 'asistencias', 
		  								'action'=>'asistencia_por_alumno', 
		  								$alumno['Alumno']['id']), array(
		  													'class'=>" btn btn-warning btn-xs glyphicon glyphicon-info-sign text-right")); ?>	
		  		</p>
				

				<table class="table table-striped table-bordered">
					
					<th class="text-center">Curso</th>
					<th class="text-center">Grupo</th>
					<th class="text-center">Borrar</th>
					
				
					<?php foreach ($matricula as $m): ?>
					
					
						<tr>
						<th><?php echo $cursoacademico[$m['Matricula']['cursoacademico_id']] ?> </th>
						<td class="text-center"><?php echo $this->Html->link($grupos[$m['Matricula']['grupo_id']], array('controller'=>'grupos', 'action'=>'ver',$m['Matricula']['grupo_id'],$m['Matricula']['cursoacademico_id']), array('class'=>'label label-success')); ?></td>
						<td class="text-center"><?php echo $this->Form->postlink(' ', array('controller' => 'matriculas','action'=>'eliminar', $m['Matricula']['id']), array('class'=>"label label-danger glyphicon glyphicon-remove",'confirm'=> '¿Estás seguro de que quieres eliminar esta matrícula?')); ?> </td>
						</tr>
					
					<?php endforeach ?>





					</table>
				
					
				
				<p><strong>OBSERVACIONES:</strong> <?php echo $alumno['Alumno']['observaciones'] ?> </p>
				
				
				<!--
				<p><strong>CREADO:</strong> <?php echo $this->Time->format('d-m-Y ; h:i A', $alumno['Alumno']['created']) ?> </p>
				<p><strong>MODIFICADO:</strong> <?php echo $this->Time->format('d-m-Y ; h:i A', $alumno['Alumno']['modified']) ?> </p>
				-->
			



		</div>
	</div>
