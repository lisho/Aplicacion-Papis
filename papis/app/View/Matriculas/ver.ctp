
<!-- ***************** NOMBRE DEL GRUPO ********************* -->

	<div class="jumbotron">
		<h1>Grupo <spam class="label label-primary"><?php echo $grupo['Grupo']['nombre']; ?></spam>	</h1>	
			<h4>Año Académico:
			<?php foreach ($matriculas as $m): ?>
				
					<?php //foreach ($m['Matricula'] as $key => $value): ?>
						
					<?php //endforeach ?>

				<?php 
					//echo "<pre>";
					//print_r($m);
					
					//echo "</pre>";

					echo $this->Html->link($m['Cursoacademico']['cursoacademico'], array('controller' => 'matriculas', 'action'=>'ver'), array('class'=>"btn btn-xs btn-info"));

					//echo "<small>".$m['Cursoacademico']['cursoacademico'].'</small>';
				?>


			<?php endforeach ?><h4>

			<?php //exit(); ?>
			
			curso activo: <?php echo $grupo['Matricula']['cursoacademico_id'] ?>
		
	</div>
		<?php // Para que se nois muestren todos los mensajes
					echo $this->Session->flash(); ?>

<!-- ***************** Barra lateral de navegación ********************* -->

	<div class="nav col-md-3">

		<div id="navbar" class="navbar-collapse collapse">
			<div class="navbar navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				
			</div>

			<?php echo $this->element('acciones'); ?>

			<h2>Grupos:</h2>

		</div>

			<?php foreach ($todos_grupos as $g): ?>
				
				<div class="btn col-lg-2">

					<?php echo $this->Html->link($g['Grupo']['nombre'], array('controller' => 'grupos', 'action'=>'ver', $g['Grupo']['id']), array('class'=>"btn btn-xs btn-info")); ?>
		
				</div>
				
			<?php endforeach ?>
		
	</div>

<!-- ***************** Contenedor principal ********************* -->

	<div class="col-md-9"> 

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

		<div class="panel panel-info"> <!-- ******* Inicio Panel ******** -->
		  <!-- Default panel contents -->

		  	<div class="panel-heading"> <!-- *** Cabecera del Panel *** -->
				
				<div class="row">
		  			<div class="col-md-12 glyphicon glyphicon-user">
						Participantes de esta Acción Grupal
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
							<th>Eliminar</th>
						</tr>
					</thead>

						<!-- Recorremos el array con los datos de cada grupo -->
					<?php foreach ($alumno as $a): ?>
							<?php if ($a['Alumno']['grupo_id']===$grupo['Grupo']['id']): ?>
								
							
						<tr>
							
							<td> <?php echo $a['Alumno']['dni']; ?> </td>
							<td> <?php echo $a['Alumno']['nombre']; ?> </td>
							<td> <?php echo $a['Alumno']['apellidos']; ?> </td>
							<td> <?php echo $grupo['Grupo']['nombre']; ?> </td>
							<td> <?php echo $this->Html->link('', array('controller' => 'alumnos', 'action'=>'ver', $a['Alumno']['id']), array('class'=>"btn btn-primary  glyphicon glyphicon-file ")); ?> </td>
							<td> <?php echo $this->Html->link('', array('controller' => 'alumnos', 'action'=>'editar', $a['Alumno']['id']), array('class'=>"btn btn-info glyphicon glyphicon-pencil")); ?> </td>
							<td> <?php echo $this->Form->postlink('', array('controller' => 'alumnos', 'action'=>'eliminar', $a['Alumno']['id']), array('class'=>"btn btn-danger glyphicon glyphicon-trash",'confirm'=> '¿Estás seguro de que quieres eliminar a '.$a['Alumno']['nombre'].' '.$a['Alumno']['apellidos'].'?')); ?> </td>
						</tr>	

						<?php endif ?>
					<?php endforeach ?>

				</table>

				<?php if (empty($alumno)): ?>
					<div class='alert alert-danger'>
						<p>No hay alumnos en este grupo</p>
					</div>
				<?php endif ?><!-- *** FIN del if para mensaje de NO HAY ALUMNOS *** -->

			</div> <!-- *** Fin del Cuerpo del Panel *** -->
		</div> <!-- *** FIN Panel *** -->


<!-- Generamos las E*T*I*Q*U*E*T*A*S de cada alumno -->
	
		<?php foreach ($alumno as $a): ?>

			<?php if ($a['Alumno']['grupo_id']===$grupo['Grupo']['id']): ?>

				<div class="col-md-3 text-center">
				
					<?php 

					$dni= $a['Alumno']['dni'];
					$nombre_foto= $dni.'.jpg';
					$foto = $dir->find($nombre_foto, true);
					
					
					$image= $this->Html->image('fotos/default-h.png', array(
															'alt' => 'foto',
															//'width'=> '65px',
															'height'=> '85 px'));
					if (!empty($foto)) {
						
					$image=$this->Html->image('fotos/'.$dni.'.jpg', array(
															'alt' => 'foto',
															//'width'=> '65px',
															'height'=> '85 px'));	
					}
					
					$nombre= $a['Alumno']['nombre'];
					$apellidos= $a['Alumno']['apellidos'];
					$contenido=$image.'<br>'.$dni.'<br>'.$nombre.'<br>'.$apellidos;

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
		
</div> <!-- *** FIN Contenedor principal *** -->
	

