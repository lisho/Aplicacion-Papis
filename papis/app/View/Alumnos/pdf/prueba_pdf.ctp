
	
	<h1>Esto es un pdf de prueba</h1>
	
	
<div class="row">		
	<table class="table table-striped">


	<?php foreach ($alumnos as $alumno): ?>
	

<tr>
	<td>
			<?php 
				
				$nombre_alumno= $alumno['Alumno']['nombre_completo'];
				$nombre_foto=$alumno['Alumno']['foto'].'.jpg';

				$image=$this->Html->image('/img/fotos/'.$nombre_foto, array(
															//	'class'=>'thumbnail',
																'alt' => 'foto',
																'width'=> '50 px',
																//'height'=> '85 px'
																));	

				echo $image;
			?>
	</td>			
	<td>
			<?php echo $nombre_alumno; ?>

	</td>
</tr>

	
	<?php endforeach ?>
</table>
</div>	