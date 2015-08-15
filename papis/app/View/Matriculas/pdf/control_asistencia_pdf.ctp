
	<p class="text-right"><small>(Curso Académico <?php echo $alumnos[0]['Cursoacademico']['cursoacademico'] ?>)</small></p>
	<h3>Hoja de Firmas. Grupo <?php echo $alumnos[0]['Grupo']['nombre']; ?></h3>

	
<div class=" panel-body">
	
	<table class="table table-bordered">

	<thead>
		
		<th>Foto</th>
		<th>Nombre</th>
		<td class="table_pdf"><small>Fecha:</small></td>
		<td class="table_pdf"><small>Fecha:</small></td>
		<td class="table_pdf"><small>Fecha:</small></td>
	</thead>

	<tbody>
		<tr>
			<?php foreach ($alumnos as $alumno): ?>
					<?php 
						
						$dni= $alumno['Alumno']['dni'];
						$nombre_alumno= $alumno['Alumno']['nombre_completo'];
						$telefono= $alumno['Alumno']['telefono'];
						$observaciones= $alumno['Alumno']['observaciones'];
						$nombre_foto=$alumno['Alumno']['foto'].'.jpg';

						$image=$this->Html->image('/img/fotos/'.$nombre_foto, array(
																		'class'=>'',
																		'alt' => 'foto',
																		'width'=> '30 px',
																		//'height'=> '85 px'
																	));	
					?>
			
			<td class="text-center"><small>	
					<?php echo $image; ?>
			</small></td>			
			<th class="table_pdf"><small><?php
					echo $dni.'<br>'; 
					echo $nombre_alumno; ?></small></th>
			<td class="table_pdf"><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small></td>
			<td class="table_pdf"><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small></td>
			<td class="table_pdf"><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small></td>

		</tr>
	</tbody>
			
			<?php endforeach ?>
</table>

</div>	
