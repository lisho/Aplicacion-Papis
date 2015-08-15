

<h1><span class="label titulo-grupo">Crear una nueva matrícula para: </span></h1>
<h1 class="text-center"><small class=' titulo-grupo'><?php echo $alumnos[$alumno]; ?></small></h1><hr>

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

		echo $this->Form->create('Matricula'); 
	?>

	<div class="col-md-12">

	
		<?php echo $this->Form->input('cursoacademico_id',array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							'text' => '¿Para que curso deseas hacer la matrícula?'
							),
					)); ?>
	
		<?php echo $this->Form->input('grupo_id',array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							'text' => '¿En que grupo quieres matricular al participante?'
							),
					)); ?>

		<?php echo $this->Form->input('alumno_id',array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							'text' => 'Participante'
							),
					)); ?>

		<?php /*echo $this->Form->input('grupo_id',array(
					'class'=>'input has-success form-control',
					'label'=> array(
							'class'=>'control-label has-success',
							'text'=>'Grupo'
							),
					)); */?>
</div>


<div class="btn">
		<?php echo $this->Form->end(array(
					'label'=>'Completar Matrícula',
					'class'=>'btn btn-success btn-success',
				
					)); ?>
</div>	

</div>




