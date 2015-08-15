
<!-- ***************** Listado de alumnos ********************* -->

<div class="jumbotron">	
<h1>Listado de Alumnos</h1>
</div>
	<?php // Para que se nois muestren todos los mensajes
				echo $this->Session->flash(); ?>

<!-- ***************** Barra lateral de navegación ********************* -->

<div class="col-md-3">

	<div id="navbar" class="navbar-collapse collapse">
		<div class="navbar navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			
		</div>

		<?php echo $this->element('acciones'); ?>

	</div>
</div>

<!-- ***************** Contenedor principal ********************* -->

<div class="col-md-9"> 

	<div class="panel panel-info"> <!-- ******* Panel de datos generales ******** -->
	  <!-- Default panel contents -->
	  
		<div class="panel-heading">  <!-- *** Cabecera del Panel *** -->

		  	<div class="row">
				
				<div class="glyphicon glyphicon-th-list col-md-8">
					Listado completo de los Alumnos...
				</div>
							
				<div class="text-right col-md-4">
						<?php echo $this->Html->link('', array(
							'controller' => 'alumnos', 
							'action'=>'nuevo'),array(
							'class'=>'btn btn-success btn-xs glyphicon glyphicon-plus')); ?> 
				</div>								  
			</div>
		</div> <!-- *** Fin Cabecera del Panel *** -->

		<div class="panel-body"> <!-- *** Cuerpo del Panel *** -->

			<table class="table table-hover ">
				
				<thead>  
					<tr>

						<th><?php echo $this->Paginator->sort('dni','DNI/NIE');?></th>
						<th><?php echo $this->Paginator->sort('nombre');?></th>
						<th><?php echo $this->Paginator->sort('apellidos', null, array('direction' => 'desc'));?></th>
						<th>Matrícula/Grupo</th>
						<th>Ver</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
					<!-- Recorremos el array con los datos de cada alumno -->
				<?php foreach ($alumnos as $alumno): ?>

					<tr>
						
						<th> <?php echo $alumno['Alumno']['dni']; ?> </th>
						<td> <?php echo $alumno['Alumno']['nombre']; ?> </td>
						<td> <?php echo $alumno['Alumno']['apellidos']; ?> </td>
				
						<td>
							<?php foreach ($alumno['Matricula'] as $m): ?>
								<p>
								<?php echo '&nbsp &nbsp<strong>'.$curso_academico[$m['cursoacademico_id']].'</strong>&nbsp &nbsp &nbsp &nbsp &nbsp' ?> 
								
								 <?php echo $this->Html->link($grupos[$m['grupo_id']], array(
								 												'controller' => 'grupos',
								 												'action'=>'ver', 
								 												$m['grupo_id'],
								 												), 
								 									array('class'=>"label label-default",)); ?>
								 </p>
							<?php endforeach ?>	
						</td>	
						
						<td> <?php echo $this->Html->link('', array('controller' => 'alumnos', 'action'=>'ver', $alumno['Alumno']['id']), array('class'=>"btn btn-primary glyphicon glyphicon-eye-open")); ?> </td>
						<td> <?php echo $this->Html->link('', array('controller' => 'alumnos', 'action'=>'editar', $alumno['Alumno']['id']), array('class'=>"btn btn-info glyphicon glyphicon-pencil")); ?> </td>
						<td> <?php echo $this->Form->postlink('', array('action'=>'eliminar', $alumno['Alumno']['id']), array('class'=>"btn btn-danger glyphicon glyphicon-trash", 'confirm'=> '¿Estás seguro de que quieres eliminar a '.$alumno['Alumno']['nombre'].' '.$alumno['Alumno']['apellidos'].', junto con el historial de incidencias asociadas a él?')); ?> </td>
					</tr>	

				<?php endforeach ?>

			</table>
		</div> <!-- *** Fin del Cuerpo del Panel *** -->

		<div class="panel-footer"> <!-- *** Pie del Panel *** -->

			<?php 

			// Shows the next and previous links
			echo $this->Paginator->prev(
			  '« Anterior    ',
			  null,
			  null,
			  array('class' => 'disabled')
			);

			// Shows the page numbers
			echo $this->Paginator->numbers();

			// Shows the next and previous links
			echo $this->Paginator->next(
			  '    Siguiente »   ',
			  null,
			  null,
			  array('class' => 'disabled')
			);

			// prints X of Y, where X is current page and Y is number of pages
			echo "&nbsp &nbsp &nbsp &nbsp &nbsp       ";
			echo $this->Paginator->counter();


			  ?>
			
		</div> <!-- *** Pie del Panel *** -->
	</div> <!-- *** FIN Panel *** -->
		<?php echo $this->Paginator->counter(
		    'Página {:page} de {:pages}, mostrando {:current} de un total de
		     {:count} resultados, comenzando en el elemento {:start}, y terminando en el {:end}.');
		 ?>
	
</div> <!-- *** FIN Contenedor principal *** -->