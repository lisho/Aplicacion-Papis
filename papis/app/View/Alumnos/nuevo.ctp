

<h1> <small class='titulo-grupo'> <?php echo __('Crear un nuevo alumno...'); ?></small></h1>
		<hr>

	<?php // Para que se nois muestren todos los mensajes
				echo $this->Session->flash(); ?>

<div class="col-md-3">

	<div id="navbar" class="navbar-collapse collapse">
		<div class="navbar navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			
		</div>
	<?php echo $this->element('acciones'); ?>

	</div>
</div>


<div class="col-md-9 has-success jumbotron">

	<?php 

		echo $this->Form->create('Alumno', array(
											//'enctype' => 'multipart/form-data',
											//'type' => 'file',
											'enctype'=>'multipart/form-data',
										 	'novalidate' => 'novalidate')); 
	?>
	
	<div class="col-md-12">

		<?php echo $this->Form->input('Alumno.dni',array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							'text' => 'DNI/NIE'
							),
					)); ?>

	
		<?php echo $this->Form->input('Alumno.nombre',array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							'text' => 'Nombre'
							),
					)); ?>


		<?php echo $this->Form->input('Alumno.apellidos',array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							'text' => 'Apellidos'
							),
					)); ?>

		<?php echo $this->Form->input('Alumno.telefono',array(
					'class'=>'input has-success form-control',
					'label'=> array(
							'class'=>'control-label has-success',
							'text'=>'Teléfono de contacto'
							),
					)); ?>

		<?php echo $this->Form->input('Alumno.observaciones',array(
					'class'=>'input has-success form-control',
					'label'=> array(
							'class'=>'control-label has-success',
							'text'=>'Observaciones:'
							),
					)); ?>

<!-- Subimos la foto -->

		

		<?php echo $this->Form->file('foto'); ?>

</div>


<div class="btn">
		<?php echo $this->Form->end(array(
					'label'=>'Añadir Alumno',
					'class'=>'btn btn-success',
				
					)); ?>
</div>	

</div>




