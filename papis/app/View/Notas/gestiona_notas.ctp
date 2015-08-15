

<?php echo $this->Html->script(array('addnota.js'),array('inline'=>false)) ?>

<br><br><br><br>


			<!-- *** Inicio Modulo FOTO *** -->		

				<?php 

					$tabindex=1;
					$dni= $alumno_completo['Alumno']['dni'];
					$nombre_foto= $alumno_completo['Alumno']['foto'].'.jpg';
					$foto = $dir->find($nombre_foto, true);
/*
					$image= $this->Html->image('fotos/default-h.png', array(
															'class'=>'thumbnail foto',
															'alt' => 'foto',
															'width'=> '75 px',
															//'height'=> '85 px'
															));
					if (!empty($foto)) {
*/						
					$image=$this->Html->image('fotos/'.$dni.'.jpg', array(
															'id'=>'foto',
															'class'=>'thumbnail foto',
															'alt' => 'foto',
															'width'=> '120 px',
															//'height'=> '85 px'
															));	
				//	}

					
				 ?>
			<!-- *** Fin Modulo FOTO *** -->



<div id='panel' class="panel panel-info"> <!-- Inicio del Panel -->

	
<!-- 
*
*  Cabecera del Panel 
*
*-->
	<div class="panel-heading"> 

		<div class="row">
			
			<div class="glyphicon glyphicon-object-align-bottom col-md-6">  Gestión de Notas de <?php echo $curso; ?> (<?php echo '20'.$current_cursoacademico['Cursoacademico']['cursoacademico']; ?>)</div>

			<div class="text-center col-md-6"><strong>Alumn@: <?php echo $alumno_completo['Alumno']['nombre'].' '.$alumno_completo['Alumno']['apellidos'] ?></strong></div>

		</div>

	</div> <!-- FIN de la Cabecera del Panel -->

	
<!-- 
*
* Cuerpo del Panel 
* 
* -->	

	<div class="panel-body"> 


		<!-- GENERAMOS UNA TABLA PARA CADA CURSO --> 
	

			<div class="panel-title alert-info"> 

			</div> 


		<div class="col-md-10">

			<table class="table table-striped table-bordered">
			
				<thead>  
					<tr>
						<th>Convoc.</th>
						<?php foreach ($asignaturas[$curso] as $asignatura): ?>
							<th>
								<?php echo $asignatura; ?>

							</th>		
						<?php endforeach ?>
					</tr>
				</thead> <!-- FIN Cabecera de la tabla --> 

				<?php foreach ($convocatorias as $c=>$convocatoria): ?>
					<tr>
						<th><?php echo $convocatoria; ?></th> <!-- Columna convocatorias --> 

						<!-- 
						*
						* Recorremos las asignaturas y las notas de cada asignatura y validamos que 
						* sea correcto:
						* 		- Asignatura
						* 		- Convocatoria
						* 		- Curso
						* 		- y el curso académico...
						* 
						* -->	


						
						<?php foreach ($asignaturas[$curso] as $a => $asignatura): ?>

						<td>
							
			<!-- GENERAMOS UN CAMPO INPUT PARA CADA CASILLA--> 

							
				<?php foreach ($alumno_completo['Nota'] as $nota): ?> 
						
					<?php if ($nota['cursoacademico_id']== $cursoacademico &&
								$nota['asignatura_id']== $a &&
								$nota['convocatoria_id']== $c): ?>

								<?php  $nota_nota = $nota['nota']; ?>

								<?php 

									
									switch ($nota_nota) {
										case (int)$nota_nota>=5:
											$color=' alert-success';
											break;

										case ((int)$nota_nota<5 && (int)$nota_nota>=1):
											$color=' alert-danger';
											break;

										case ($nota_nota=='np'):
											$color=' alert-warning';
											break;

										case ($nota_nota==='cv'):
											$color=' alert-info';
											break;

										case $nota_nota==='sc':
											$color='';
											break;
										
										default:
											$color='';
											break;
									}

									$nota_class = 'form-control input-small text-center numeric'.$color;

								echo $this->Form->input($nota['id'], array(
															'div'=>false,
															'class'=> $nota_class,
															'label'=> false,
															'size'=> 2,
															'maxlength'=> 2,
															'tabindex' => $tabindex++,
															'data-id' => $nota['id'],
															'value' => $nota_nota
									));

							 ?>

					<?php endif ?>

				<?php endforeach ?>
							

							

				<!-- FIN CAMPO INPUT PARA CADA CASILLA--> 			 
			
				

						</td>


						<?php endforeach ?>
					
					</tr>	

				<?php endforeach ?>

			</table>
			
		</div>

			<?php echo $this->Html->div(null, $image, array('class' => 'col-md-2 text-center',)); ?>

			<div class="row ">

				<div class="text-center">

				<br><br><br>
				<?php echo $this->Html->link('  Volver a la Ficha del Alumn@ ', array(
															'controller'=>'alumnos',
															'action'=>'ver',
															$alumno_completo['Alumno']['id'],
															), array(
																	'class'=>'btn btn-primary btn-xs glyphicon glyphicon-share')) ?>
				</div>	
			</div>


	</div> <!-- FIN del Cuerpo del Panel -->
</div> <!-- FIN del Panel -->


<!--
<?php echo $this->Html->link('  Editar', array(
															'controller'=>'notas',
															'action'=>'gestiona_notas',
															$alumno['Alumno']['id'],
															$c,
															$cursoacademico), array(
																					'class'=>'btn btn-success btn-xs glyphicon glyphicon-edit')) ?>	
-->

