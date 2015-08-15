
<?php echo $this->Html->script(array('horario.js'),array('inline'=>false)) ?>

<div class="container">
<!-- ***************** NOMBRE DEL GRUPO ********************* -->

<div class="col-lg-12 ">
	<div class="row">
		<div class="col-lg-8 ">
		<h1><span class="label label-info titulo-grupo "><?php echo $grupo['Grupo']['nombre']; ?></span><small class='titulo-grupo'>      Ficha de Grupo</small></h1>
		<div class="text-right">
					<button id="" class="btn btn-primary glyphicon glyphicon-calendar boton_horario" > Horario <?php echo $grupo['Grupo']['nombre']; ?></button>
					<?php //echo $this->Html->link('Mi Horario', array('controller' => '', 'action'=>''), array('class'=>"btn btn-info")); ?>
					
							<?php echo $this->Form->postLink('  Asistencias', array(
									  								'controller' => 'grupos', 
									  								'action'=>'asistencias_por_grupo',
									  								$grupo['Grupo']['id'] ), 
																array(
																		'class'=>" btn btn-primary  glyphicon glyphicon-eye-open text-right")); 
							?>
							<?php echo $this->Html->link('  Eventos', array(
									  								'controller' => 'eventos', 
									  								'action'=>'evento_de_grupo',
									  								$grupo['Grupo']['id'],
									  								$cursopasado ), 
																array(
																		'class'=>" btn btn-primary  glyphicon glyphicon-eye-open text-right")); 
							?>
				
				</div>	
		</div>
			
		<div class="btn-group col-lg-4">

			<h3 class="text-primary text-right ">
				<?php echo $this->Html->link('Gestión de Grupos', array(
								'controller' => 'grupos', 
								'action'=>'index'),array(
								'class'=> '')); ?>
			</h3><hr>		
			
			<h2>
			<?php if (!empty($matricula)): ?>
				
				<ul class='nav nav-tabs '>
			
					<?php foreach ($curso as $id=>$c): ?>
						
					<?php 
							
						$color='';	
						if ($c===$curso_actual['Cursoacademico']['cursoacademico']) {
							$color='active';
							}
							
							$cursopasado=$id;
							echo '<li class="'.$color.'">'.$this->Html->link($c, array('controller' => 'grupos', 'action'=>'ver',$grupo['Grupo']['id'],$cursopasado)
								, array('class'=>'btn btn-lg')).'</li>';				
					?>
						
					<?php endforeach ?>


				</ul>
			<?php else: ?>
				<br>
			<?php endif ?>

			</h2>


		</div>


	</div>		

</div>
	
		<?php //echo $this->element('todos_grupos'); ?>
		<?php // Para que se nois muestren todos los mensajes
					//echo $this->Session->flash(); ?>

<!-- ***************** Barra lateral de navegación ********************* -->
<div class="col-lg-12">

 
<div class="row">

	<div class="nav col-md-3"> <!-- ** Inicio columna Lateral** -->
 
		<?php if (!empty($curso_actual)): ?>

			
	  <?php echo $this->element('todos_grupos'); ?>
		
		<nav class="navbar navbar-default">
		  	
		  	<div class="container-fluid">

				<div class="navbar-header">

					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#lateral" aria-expanded="false" aria-controls="navbar">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          	</button>
		       
				</div>

				<div id="lateral" class="navbar-collapse collapse">
	        
					<div class="row">
				        <br>
						<!--
						<div class="navbar navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							
						</div> 

							<?php echo $this->Html->image('calendario.png', array(
														//'class'=>'thumbnail foto',
														'alt' => 'pdf',
														//'width'=> '65px',
														'height'=> '45 px'));
							?>-->
									
			<!-- ***************** HORARIO ********************* -->
						
							<?php echo $this->element('horario_por_grupo'); ?>

			<!-- ***************** FIN HORARIO ********************* -->
							<?php echo $this->element('acciones'); ?>

			<!-- ***************** Botones PDF ********************* -->
						<hr>
								
						<div class="bloque-pdf">
						<?php  

						echo $this->Html->image('PDFicon.png', array(
															//'class'=>'thumbnail foto',
															'alt' => 'pdf',
															//'width'=> '65px',
															'height'=> '45 px'));
				?>
			
				<?php 

				$activo= (($this->params['controller']==='grupos')&& ($this->params['action']=='nuevo') )?'active' :'';


				echo $this->Html->link('    Lista de participantes', array(
											'controller' => 'matriculas', 
				  								'action'=>'lista_alumnos_pdf',
				  								$grupo['Grupo']['id'], 
												$curso_actual['Cursoacademico']['id'],
												'ext'=> 'pdf', ),array(
											'class'=>$activo.' glyphicon glyphicon-list-alt list-group-item')); 

				echo $this->Html->link('    Control de firmas', array(
											'controller' => 'matriculas', 
				  								'action'=>'control_asistencia_pdf',
				  								$grupo['Grupo']['id'], 
												$curso_actual['Cursoacademico']['id'],
												'ext'=> 'pdf', ),array(
											'class'=>$activo.' glyphicon glyphicon-list-alt list-group-item')); 
				?> 
				<br>
			</div>		
			<!-- ***************** FIN Botones PDF ********************* -->
		
		</div>
			
		<?php endif ?>	
		</div>
	</div>	
	</div></nav>
<!-- ***************** Contenedor principal ********************* -->

	<div class="col-md-9"> <!-- ** Inicio columna Principal ** -->

		
		<!-- ***************** ZONA MENSAJE ********************* -->

				<?php // Para que se nois muestren todos los mensajes
							echo $this->Session->flash();
							echo $this->Flash->render(); ?>

<!-- ******* Panel de Datos Generales ******** -->		

		<div class="panel panel-info"> <!-- ******* Inicio Panel ******** -->
			  <!-- Default panel contents -->

		  	<div class="panel-heading"> <!-- *** Cabecera del Panel *** -->
		  		<div class="row">
		  			<div class="glyphicon glyphicon-paperclip col-md-8">
						Datos Generales
					</div>

					<div class="text-right col-md-4">
						<?php echo $this->Html->link('', array(
	  								'controller' => 'grupos', 
	  								'action'=>'editar', 
	  								$grupo['Grupo']['id']), array(
	  													'class'=>"btn btn-warning btn-xs glyphicon glyphicon-pencil")); ?>
					</div>
		  		</div>
		  	
		  	</div> <!-- *** Fin Cabecera del Panel *** -->

			<div class="panel-body"> <!-- *** Cuerpo del Panel *** -->	  	
				<p class="glyphicon glyphicon-map-marker"><strong >  UBICACIÓN:</strong> <?php echo $grupo['Grupo']['sede'] ?> </p><br>
				<p class="glyphicon glyphicon-info-sign" ><strong>  DESCRIPCIÓN:</strong> <?php echo $grupo['Grupo']['descripcion'] ?> </p><br>
				<p class="glyphicon glyphicon-education" ><strong>  DOCENTE DE REFERENCIA:</strong> <?php echo $grupo['User']['nombre_user'] ?> </p>
			</div>  <!-- *** Fin del Cuerpo del Panel *** -->
		</div> <!-- *** FIN Panel *** -->


<!-- ******* Panel Listado de Grupos ******** -->	
	

	<?php if (empty($matricula)): ?> <!-- ******* Solicitamos un año académico si no hay matrículas ******** -->	
		
		<div class="jumbotron text-center">

		<?php 

			if (empty($curso_actual)&&empty($matricula)) {
				echo '<h2>Debes seleccionar un año académico para ver los participantes en este grupo durante ese año...</h2>';
			}
			elseif (empty($matricula)) {
				echo '<h2>No hemos encontrado participantes para el año académico  '.$curso_actual['Cursoacademico']['cursoacademico'].'.<h2>';
				echo "(Es posible que este grupo no existiera ese año.)";

				echo '<h2><small>Selecciona otro año académico:</small></h2>';
			}
		?>
			
			
				<?php foreach ($curso as $id=>$c): ?>
				
					<?php 				
							$cursopasado=$id;
							echo $this->Html->link($c, array('controller' => 'grupos', 'action'=>'ver',$grupo['Grupo']['id'],$cursopasado)
								, array('class'=>"btn btn-lg btn-info"));
					?>		
				<?php endforeach ?>
		</div>



	<?php else: ?><!-- ******* Cuando si hay matrículas desplegamos los datos******** -->

	


		<div class="panel panel-info"> <!-- ******* Inicio Panel ******** -->
		  <!-- Default panel contents -->

		  	<div class="panel-heading"> <!-- *** Cabecera del Panel *** -->
				
				<div class="row">
		  			<div class="col-md-9 glyphicon glyphicon-user ">
						Participantes de esta Acción Grupal durante el curso <strong>20<?php echo $curso_actual['Cursoacademico']['cursoacademico'] ?></strong>
					</div>

					<div class="text-right col-md-3">
						<?php echo $this->Html->link('', array(
	  								'controller' => 'matriculas', 
	  								'action'=>'lista_alumnos',
	  								$grupo['Grupo']['id'], 
									$curso_actual['Cursoacademico']['id'],
									'ext'=> 'pdf', 
									),array(
	  													'class'=>"btn btn-warning btn-xs glyphicon glyphicon-list-alt")); ?>
					</div>


		  		</div>

			</div> <!-- *** Fin Cabecera del Panel *** -->

			<div class="panel-body"> <!-- *** Cuerpo del Panel *** -->

				<table class="table table-striped">
					
					<thead>           
						<tr>
							<th>DNI</th>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Grupo</th>
							<th>Ficha</th>
							<th>Editar</th>
							<th>Desmatricular</th>
						</tr>
					</thead>

						<!-- Recorremos el array con los datos de cada grupo -->
					<?php foreach ($matricula as $a): ?>
							
						<?php //foreach ($a['Matricula'] as $m): ?>
							
						

							<?php//f ($a['Alumno']['grupo_id']===$m['grupo_id']): ?>
								
							
						<tr>
							
							<td> <?php echo $a['Alumno']['dni']; ?> </td>
							<td> <?php echo $a['Alumno']['nombre']; ?> </td>
							<td> <?php echo $a['Alumno']['apellidos']; ?> </td>
							<td> <?php echo $grupo['Grupo']['nombre'].'  ('.$a['Cursoacademico']['cursoacademico'].')'; ?> </td>
							<td class="text-center"> <?php echo $this->Html->link('', array('controller' => 'alumnos', 'action'=>'ver', $a['Alumno']['id'],$cursopasado), array('class'=>"btn btn-primary  glyphicon glyphicon-file btn-xs")); ?> </td>
							<td class="text-center"> <?php echo $this->Html->link('', array('controller' => 'alumnos', 'action'=>'editar', $a['Alumno']['id']), array('class'=>"btn btn-info glyphicon glyphicon-pencil btn-xs")); ?> </td>
							<td class="text-center"> <?php echo $this->Form->postlink('', array('controller' => 'matriculas', 'action'=>'eliminar', $a['Matricula']['id']), array('class'=>"btn btn-danger glyphicon glyphicon-trash btn-xs",'confirm'=> '¿Estás seguro de que quieres eliminar la matrícula de '.$a['Alumno']['nombre'].' '.$a['Alumno']['apellidos'].' en este grupo?')); ?> </td>
						</tr>	

						<?php //dif ?>

						<?php //endforeach ?>
					<?php endforeach ?>

				</table>

				<?php if (empty($alumno)): ?>
					<div class='alert alert-danger'>
						<p>No hay alumnos en este grupo</p>
					</div>
				<?php endif ?><!-- *** FIN del if para mensaje de NO HAY ALUMNOS *** -->

			</div> <!-- *** Fin del Cuerpo del Panel *** -->
		<?php endif ?>		
		</div> <!-- *** FIN Panel *** -->


<!-- Generamos las E*T*I*Q*U*E*T*A*S de cada alumno -->
	
		<?php foreach ($matricula as $a): ?>

			<?php if ($a['Matricula']['grupo_id']===$grupo['Grupo']['id']): ?>

				<div class="col-md-3 text-center">
				
					<?php 

					$dni= $a['Alumno']['dni'];
					$nombre_foto= $a['Alumno']['foto'].'.jpg';
					$foto = $dir->find($nombre_foto, true);
					
					/*
					$image= $this->Html->image('fotos/default-h.png', array(
															'alt' => 'foto',
															//'width'=> '65px',
															'height'=> '85 px'));
					if (!empty($foto)) {
					*/	
					$image=$this->Html->image('fotos/'.$nombre_foto, array(
															'class'=>'thumbnail foto img-circle',
															'alt' => 'foto',
															//'width'=> '65px',
															'height'=> '85 px'));	
					//}
					
					$nombre= $a['Alumno']['nombre'];
					$apellidos= $a['Alumno']['apellidos'];
					$contenido=$image.$dni.'<br>'.$nombre.'<br>'.$apellidos;

					$div = $this->Html->div(null, $contenido, array('class' => 'btn well well-lg col-md-12',
																		)); 

					echo $this->Html->link($div, array(
													'controller' => 'alumnos', 
													'action'=>'ver', 
													$a['Alumno']['id']),array(
															'class' => 'light_blue', 
															'escape' => false)); ?>
				</div>
			<?php endif ?>
		<?php endforeach ?> <!-- FIN ETIQUETAS -->
		</div>
	</div>
</div> <!-- *** FIN Contenedor principal *** -->

