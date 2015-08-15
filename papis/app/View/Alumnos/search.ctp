
<?php if ($ajax !=1): ?>
<br><br><br><br>
	<h1>Buscador de Participantes</h1>

	<div class="row">

		<?php echo $this->Form->create('Alumno', array('type'=>'GET')); ?>	

		<div class="col-sm-4">
			
			<?php echo $this->Form->input('search', array(
														'label'=>false,
														'div'=>false,
														'class'=>'form-control',
														'autocomplet'=>'off',
														'value'=> $search)); ?>
		</div>

		<div class="col-sm-4">

			<?php echo $this->Form->button('Buscar', array(
															'div'=>false,

															'class'=>'btn btn-primary')); ?>

		</div>
			
			<?php echo $this->Form->end(); ?>

	</div>
	<br><br>
<?php endif ?>


<?php if (!empty($search)): ?>

	<?php if (!empty($alumnos)): ?>
		
		<div class="row foto_alumno">

			<?php foreach ($alumnos as $alumno): ?>
				
				<div class='col-sm-2 text-center'>

				<br>
					
						<figure class=''>
						<?php echo $this->Html->image('fotos/'.$alumno['Alumno']['foto'].'.jpg', array(
																									'div'=>false,
																									'alt' => 'foto',
																									'height'=> '70 px',
																									'id'=>'slide',
																									'class' => 'thumbnail foto',
																									'url'=>array(
																											'controller'=>'alumnos',
																											'action'=>'ver',
																											$alumno['Alumno']['id']
																									))); ?>				
						</figure>
					
						<?php echo $alumno['Alumno']['dni'] ?> <br>

						<?php echo $this->Html->link($alumno['Alumno']['nombre_completo'], array(
																							'action'=>'ver',
																							$alumno['Alumno']['id'])); ?>
					
					<br><br>
				</div>

			<?php endforeach ?>
			
		</div><br>

	<?php else: ?>

		<h3>No se han encontrado alumnos con los criterios enviados...</h3>	

	<?php endif ?>
	
<?php endif ?>