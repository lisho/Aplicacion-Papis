
<!--[CDATA[
	<h1 class="text-center"><span class="label titulo-grupo">Editar la ficha de </span></h1> 
	<h3 class="text-center"><?php echo $alumno['Alumno']['nombre'].' '.$alumno['Alumno']['apellidos']; ?></h3>
	<hr> -->

	<h1><span class="label titulo-grupo">Editar la ficha de </span><small class='titulo-grupo'><?php echo $alumno['Alumno']['nombre'].' '.$alumno['Alumno']['apellidos']; ?></small></h1><hr>

	<?php // Para que se nois muestren todos los mensajesclass='titulo-grupo'
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


	<div class="col-md-12 bg-info">
		<br>
		<div class="col-md-6">
<!-- Mostramos la foto -->

		<?php 

			$dni= $alumno['Alumno']['dni'];
			$nombre_foto= $dni.'.jpg';
			$foto_actual = $alumno['Alumno']['foto'];
			$image= $this->Html->image('fotos/default-h.png', array(
															'alt' => 'foto',
															'width'=> '150 px',
															//'height'=> '85 px'
															));
			if (!empty($foto_actual)) {
					
				$image=$this->Html->image('fotos/'.$foto_actual.'.jpg', array(
														'alt' => 'foto',
														'width'=> '150 px',
														//'height'=> '85 px'
														));	
			}
			echo $this->Html->div(null, $image, array('class' => 'btn well well-lg col-md-12',
																	));
		?>

		</div>

		<div class="col-md-6">

			<h4>¿Quieres cambiar la foto?</h4>

			
			<?php echo $this->Form->file('foto'); ?>
		</div>
	</div>
</div>


<div class="btn">
		<?php echo $this->Form->end(array(
					'label'=>'Guardar los cambios',
					'class'=>'btn btn-success btn-success',
				
					)); ?>
</div>	

</div>