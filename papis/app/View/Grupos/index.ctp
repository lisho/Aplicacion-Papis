
<div class="col-lg-12">
	<div class="col-lg-10 row">
		<h1 class="text-center"><span class="label titulo-grupo">Panel de Acceso a los Grupos</span></h1> 
		<h3 class="text-center">Acciones grupales con participantes matriculados por años académicos.</h3>
		<hr>
	
	

<!-- ***************** ZONA MENSAJE ********************* -->

	<?php // Para que se nois muestren todos los mensajes
				
				echo $this->Session->flash();
				echo $this->Flash->render(); ?>
	</div>
</div>

<!-- # *************** Para cada año academico ********************* -->
<?php foreach ($curso_academico as $c_a): ?>


	<!-- # ***** Sacamos listado de los grupos de este curso ********************* -->
			<?php $lista_grupos=array(); ?>

	<?php foreach ($c_a['Matricula'] as $matricula_por_curso): ?>

		<?php $lista_grupos[]=$matricula_por_curso['grupo_id']; ?>

	<?php endforeach ?>

	<!-- # *********************** -->


			<h1><small class='titulo-grupo nombre-alumno'><?php echo 'Año Académico 20'.$c_a['Cursoacademico']['cursoacademico']; ?></small></h1>
	
<div class="panel panel-primary">
	
		
	<div class='panel panel-body'>				

			<!-- # *************** Revisamos cada grupo ********************* 
					y almacena,mos en $g los datos de:
					- El grupo
					- El User
					- Las matriculas asociadas (en un array) 
			-->

			<?php foreach ($grupos as $g): ?>	


				<!-- 
					Revisamos si existe alguna matrícula en ese grupo y revisamos si
					corresponde al curso que estamos desplegando.
				 -->

					
				<?php if (!empty($g['Matricula']&&
							in_array($g['Grupo']['id'],$lista_grupos))): ?>

					<div class="col-lg-3 col-xs-12">

						<div class="">
							
						
						<?php 
							
							$paisanin='';
							$num_paisanin=0;
							

							foreach ($g['Matricula'] as $m){

								if ($m['grupo_id']===$g['Grupo']['id']&&
										$m['cursoacademico_id']===$c_a['Cursoacademico']['id']){

									$num_paisanin=$num_paisanin+1;
									$paisanin= $paisanin."<h5><div class='col-xs-1 glyphicon glyphicon-user'></div></h5>";

								}
							}

							$contenido='<div class="panel-heading">
											<div class="row">
												<div class="col-lg-12">
													<h3><strong>'.$g['Grupo']['nombre'].'</strong></h3>
												</div>
											</div>
										</div>

										<div class="panel-body">
												<h5><button class="btn btn-info" type="button"> <div class="glyphicon glyphicon-user"> <span class="badge">'.$num_paisanin.'</span></h5>

										</div>';
						?>
							
	

						<?php 				

							$curso_actual=$c_a['Cursoacademico']['id'];
							$grupo_actual=$g['Grupo']['id'];

							//echo $curso_actual.'<br>'.$grupo_actual;exit();
							
							$div = $this->Html->div(null, $contenido, array('class' => ' btn panel panel-primary col-lg-12 col-md-12 col-xs-12 ',
																				)); 

							echo $this->Html->link($div, array(
															'controller' => 'grupos', 
															'action'=>'ver', 
															$grupo_actual,$curso_actual), array(
																	'class' => 'light_blue', 
																	'escape' => false)); 

		 				?>
								
		 					
						</div>
					</div>

				<?php endif ?>

			<?php endforeach ?> <!-- Fin de $g -->
			
	</div>
</div>
<?php endforeach ?> <!-- Fin de $c_a -->



<!-- <pre><?php print_r($g['Matricula']); ?></pre> -->

