<!-- Generamos las E*T*I*Q*U*E*T*A*S de cada alumno -->
	
		
<div class="panel panel-warning"><!-- ******* Inicio Panel ******** -->
           
            
	<?php $g=$compis;	?>
	
	<?php $matricula= $alumno['Matricula']?>


	<div class="panel-heading"><!-- ******* Cabecera del Panel ******** -->	
		<h5 class="glyphicon glyphicon-equalizer"> Grupos de referencia: </h5>
	</div>

	
	<div class="panel-body small"> <!-- ******* Cuerpo del Panel ******** -->
	
		<?php foreach ($matricula as $m): ?> <!-- /// Revisamos cada año académico /// -->

				<div class="col-md-12"><h5>Grupo:   <strong class='label label-default'><?php echo $grupos[$m['grupo_id']]; ?></strong><?php echo '   (Año '.$cursoacademico[$m['cursoacademico_id']].')'; ?></h5>

			<?php foreach ($compis as $c): ?> <!-- /// Para cada compañero matriculado /// -->

	
				<!-- /// Si coinciden el id del grupo y el id del curso academico generamos un div para ese Grupo /// -->

				<?php if ($m['grupo_id']===$c['Matricula']['grupo_id'] && $m['cursoacademico_id']===$c['Matricula']['cursoacademico_id']): ?> 
										
					

						<!-- ///Generamos un boton por cada alumno del grupo /// -->
						<?php

							//foreach ($compis as $i) {	

								//if ($matricula['id']===$i['Matricula']['id']) {
								
									$dni= $c['Alumno']['dni'];
									$grupo = $c['Matricula']['grupo_id'];
									$nombre_foto= $dni.'.jpg';
									$foto = $dir->find($nombre_foto, true);
									

									
									$image= $this->Html->image('fotos/default-h.png', array(
																			'alt' => 'foto',
																				//'width'=> '65px',
																				'height'=> '40 px',
																				'class'=> 'img-circle'));
										
										if (!empty($foto)) {
											
										$image=$this->Html->image('fotos/'.$dni.'.jpg', array(
																				'alt' => 'foto',
																				//'width'=> '65px',
																				'height'=> '40 px',
																				'class'=> 'img-circle'));	
										}
										
										$clase= 'btn small btn-default col-md-6 ';
										if ($c['Alumno']['id']===$alumno['Alumno']['id']) {
											$clase= 'btn small btn-primary col-md-6';
										}

										$nombre= $c['Alumno']['nombre'];
										$apellidos= $c['Alumno']['apellidos'];
										$contenido=$image.'<br>'.$nombre.'<br>'.$apellidos;

										$div = $this->Html->div(null, $contenido, array('class' => $clase,
																							)); 

										echo $this->Html->link($div, array(
																		'controller' => 'alumnos', 
																		'action'=>'ver', 
																		$c['Alumno']['id']),array(
																				'class' => 'light_blue', 
																				'escape' => false)); 
								//} // END IF
							
							//}	//END FOREACH
						?>


				<?php endif ?>  

		
		<?php endforeach ?>	
	
		</div>
		
	<?php endforeach ?>

	<?php //exit(); ?>
	</div>
</div>





