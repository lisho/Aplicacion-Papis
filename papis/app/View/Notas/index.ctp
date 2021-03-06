
<!-- ***************** Listado de notas ********************* -->

<div class="jumbotron">	
<h1>Listado de Notas</h1>
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
					Listado completo de Notas...
				</div>
							
				<div class="text-right col-md-4">
						<?php echo $this->Html->link('', array(
							'controller' => 'notas', 
							'action'=>'nuevo'),array(
							'class'=>'btn btn-success btn-xs glyphicon glyphicon-plus')); ?> 
				</div>								  
			</div>
		</div> <!-- *** Fin Cabecera del Panel *** -->

		<div class="panel-body"> <!-- *** Cuerpo del Panel *** -->

			<table class="table table-striped">
				
				<thead>  
					<tr>

						<th>Nota</th>
						<th>Alumno</th>
						<th>Asignatura</th>
						<th>Curso</th>
						<th>Curso Academico</th>
						<th>Convocatoria</th>
						<th>Ver</th>
						<th>Editar</th>
						<th>Eliminar</th>


					</tr>
				</thead>
					<!-- Recorremos el array con los datos de cada alumno -->
				<?php foreach ($notas as $nota): ?>

					<tr>
						
						<th> <?php echo $nota['Nota']['nota']; ?> </th>
						<td> <?php echo $nota['Alumno']['dni']; ?> </td>
						<td> <?php echo $nota['Asignatura']['asignatura']; ?> </td>
						<td> <?php echo $nota['Cursoacademico']['cursoacademico']; ?> </td>
						<td> <?php echo $nota['Convocatoria']['convocatoria']; ?> </td>
						
						
						<td> <?php echo $this->Html->link('', array('controller' => 'notas', 'action'=>'ver', $nota['Nota']['id']), array('class'=>"btn btn-primary glyphicon glyphicon-eye-open")); ?> </td>
						<td> <?php echo $this->Html->link('', array('controller' => 'notas', 'action'=>'editar', $nota['Nota']['id']), array('class'=>"btn btn-info glyphicon glyphicon-pencil")); ?> </td>
						<td> <?php echo $this->Form->postlink('', array('action'=>'eliminar', $nota['Nota']['id']), array('class'=>"btn btn-danger glyphicon glyphicon-trash", 'confirm'=> '¿Estás seguro de que quieres eliminar esta nota?')); ?> </td>
					</tr>	

				<?php endforeach ?>

			</table>
		</div> <!-- *** Fin del Cuerpo del Panel *** -->

	

	</div> <!-- *** FIN Panel *** -->
		
	
</div> <!-- *** FIN Contenedor principal *** -->