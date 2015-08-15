

<h1> <small class='titulo-grupo'> <?php echo __('Crear una nueva acción grupal...'); ?></small></h1>
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

		echo $this->Form->create('Grupo'); 
	?>

	<div class="col-md-12">

		<?php echo $this->Form->input('nombre',array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							'text' => 'Nombre del Grupo'
							),
					)); ?>

	
		<?php echo $this->Form->input('sede',array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							'text' => 'Ubicación'
							),
					)); ?>


		<?php echo $this->Form->input('descripcion',array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							'text' => 'Descripción de la actividad'
							),
					)); ?>

		<?php echo $this->Form->input('user_id',array(
					'class'=>'input has-success form-control',
					'label'=> array(
							'class'=>'control-label has-success',
							'text'=>'Responsable del grupo'
							),
					)); ?>

		<?php echo $this->Form->input('cepa',array(
					'class'=>'input has-success form-control',
					'label'=> array(
							'class'=>'control-label has-success',
							'text'=>'¿Requiere matrícula en el Centro de Educación de Presonas Adultas?'
							),
					)); ?>

					
		<div class="btn">
				<?php echo $this->Form->end(array(
							'label'=>'Crear Nuevo',
							'class'=>'btn btn-success btn-success',
						
							)); ?>
		</div>	

	</div>
</div>