
<?php $color=''; ?>
<?php $lista_cursos=array('1 ESO','2 ESO','3 ESO','4 ESO'); ?>

<div class="panel panel-info"> <!-- Inicio del Panel -->

	
<!-- 
*
*  Cabecera del Panel 
*
*-->
	<div class="panel-heading"> 

		<div class="row">
			
			<div class="glyphicon glyphicon-object-align-bottom col-md-8">  Gestión de Notas:</div>

			<div class="text-right col-md-4"><button id="" class="persiana_button btn btn-primary btn-xs glyphicon glyphicon-eye-close"></button></div>

		</div>

	</div> <!-- FIN de la Cabecera del Panel -->

	
<!-- 
*
* Cuerpo del Panel 
* 
* -->	

	<div id="" class="persiana panel-body"> 

		<?php foreach ($lista_cursos as $c): ?>

		<!-- GENERAMOS UNA TABLA PARA CADA CURSO --> 

		<div class="col-md-6">

			<div class="panel-title alert-info"> 

				<div class="col-md-4">
					<?php echo '&nbsp;&nbsp;'.$c; ?>
				</div>

				<div class="col-md-8 text-right">

					<?php 

						$current_alumno = $alumno['Alumno']['id'];
						$current_curso =$c;
						$cursoacademico = $current_cursoacademico['Matricula']['cursoacademico_id'];
						$txt=' Crear';
						$class= 'btn btn-info btn-xs glyphicon glyphicon-edit';

					 ?>

					<!-- 
					*
					* Validamos si existen notas y generamos el boton:
					* 	- Editar si existen
					* 	- Crear si no existen
					* 
					* -->	
				
					<?php if ($notas): ?>

						<?php foreach ($notas as $nota): ?>

							<?php if ($nota['Asignatura']['curso']===$c && 
										$cursoacademico==$nota['Nota']['cursoacademico_id']): ?>

								<?php  
									$txt=' Editar';
									$class= 'btn btn-success btn-xs glyphicon glyphicon-edit'
								?>
								
							<?php else: ?>

								
							<?php endif ?>

						<?php endforeach ?>
					<?php endif ?>


					<?php echo $this->Form->postlink($txt, array(
																	'controller'=>'notas',
							 										'action'=>'gestiona_notas',
																	$current_alumno,
																	$current_curso,
																	$cursoacademico), array(
																							'class'=>$class)) ?>
					<?php if ($txt==' Editar'): ?>
						
						<?php echo $this->Form->postlink('', array(
																	'controller'=>'notas',
							 										'action'=>'borra_boletin',
																	$current_alumno,
																	$current_curso,
																	$cursoacademico), array(
																							'class'=>'btn btn-danger btn-xs glyphicon glyphicon-trash','confirm'=> '¿Estás seguro de que quieres eliminar este Boletín de Notas?')) ?>	
					<?php endif ?>
				
				</div>

			</div> 

		

			<!-- 
				*
				* Generamos la tabla con las notas para este curso
				* 
				* -->	


			<table class="table table-striped table-bordered">
			
				
				<thead>  <!-- Cabecera de la tabla --> 
					<tr>
						<th>Convoc.</th>

						<?php foreach ($asignaturas[$c] as $asignatura): ?>

							<th>
								<?php echo $asignatura; ?>

							</th>	

						<?php endforeach ?>
					</tr>
				</thead> <!-- FIN Cabecera de la tabla --> 



				<?php foreach ($convocatorias as $convocatoria): ?>
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

						<?php foreach ($asignaturas[$c] as $asignatura): ?>

							
									<?php $muestra_nota='--'; ?>

								<?php foreach ($notas as $nota): ?>
									
									<?php if ($nota['Asignatura']['cod'] == $asignatura &&
												$nota['Convocatoria']['cod'] == $convocatoria &&
												$nota['Asignatura']['curso'] == $current_curso &&
												$nota['Cursoacademico']['id'] == $cursoacademico): ?>

									
									<?php $muestra_nota = $nota['Nota']['nota']; ?> <!-- Imprimimos la nota --> 	
	
										<?php 

											switch ($muestra_nota) {
										case $muestra_nota>=5 && $muestra_nota!=0:
											$color=' alert-success';
											break;

										case ($muestra_nota<5 && $muestra_nota>=1):
											$color=' alert-danger';
											break;

										case ($muestra_nota=='np'):
											$color=' alert-warning';
											break;

										case ($muestra_nota==='cv'):
											$color=' alert-info';
											break;

										case $muestra_nota==='sc':
											$color='';
											break;
										
										default:
											$color='';
											break;
									}	

										 ?>


									<?php endif ?> <!-- FIN Validación nota --> 
																
								<?php endforeach ?> <!-- FIN ciclo  Notas-->

							<td class="<?php echo $color; ?>">	
									<?php echo $muestra_nota ?>
							</td>

							
									
							

						<?php endforeach ?> <!-- FIN ciclo  Asignaturas-->
					
					</tr>	


				<?php endforeach ?> <!-- FIN ciclo  Convocatorias-->

			</table> <!-- FIN TABLA-->

		</div>	<!-- FIN de grilla col-6-->

		<?php endforeach ?> <!-- FIN ciclo Cursos-->

	</div> <!-- FIN del Cuerpo del Panel -->
</div> <!-- FIN del Panel -->
