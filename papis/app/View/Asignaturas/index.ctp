
<!-- ***************** Listado de notas ********************* -->

<div class="jumbotron">	
<h1>Panel de Gestión de Asignaturas</h1>
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

	<div class="bg-info">

		<h4>Añadir Asignatura:</h4>
		<?php 

			echo $this->Form->create('Asignatura');

			echo $this->Form->input('asignatura',array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							'text' => 'Asignatura'
							),
					));

			echo $this->Form->input('curso',array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							'text' => 'Curso'
							),
					));

			echo $this->Form->input('cod',array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							'text' => 'Codigo'
							),
					));
		?>

		<div class="btn">
			<?php echo $this->Form->end(array(
						'label'=>'Guardar los cambios',
						'class'=>'btn btn-success btn-success',
					
						)); ?>
		</div>	

	</div>
</div>

<!-- ***************** Contenedor principal ********************* -->

<div class="col-md-9"> 

	<div class="panel panel-info"> <!-- ******* Panel de datos generales ******** -->
	  <!-- Default panel contents -->
	  
		<div class="panel-heading">  <!-- *** Cabecera del Panel *** -->

		  	<div class="row">
				
				<div class="glyphicon glyphicon-th-list col-md-8">
					Listado completo de Asignaturas...
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

						<th><?php echo $this->Paginator->sort('asignatura','Asignatura');?></th>
						<th><?php echo $this->Paginator->sort('curso','Curso');?></th>
						<th><?php echo $this->Paginator->sort('cod','Código');?></th>
						<th>Eliminar</th>



					</tr>
				</thead>
					<!-- Recorremos el array con los datos de cada alumno -->
				<?php foreach ($lista_asignaturas as $a): ?>

					<tr>
						
						<th> <?php echo $a['Asignatura']['asignatura']; ?> </th>
						<td> <?php echo $a['Asignatura']['curso']; ?> </td>
						<td> <?php echo $a['Asignatura']['cod']; ?> </td>
						
						<td> <?php echo $this->Form->postlink('', array('action'=>'eliminar', $a['Asignatura']['id']), array('class'=>"btn btn-danger glyphicon glyphicon-trash", 'confirm'=> '¿Estás seguro de que quieres eliminar esta asignatura?')); ?> </td>
					</tr>	

				<?php endforeach ?>

			</table>
		</div> <!-- *** Fin del Cuerpo del Panel *** -->

	

	</div> <!-- *** FIN Panel *** -->
		
	
</div> <!-- *** FIN Contenedor principal *** -->