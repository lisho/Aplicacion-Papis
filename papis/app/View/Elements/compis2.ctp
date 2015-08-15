<!-- Generamos las E*T*I*Q*U*E*T*A*S de cada alumno -->
	
		
<div class="panel panel-warning"><!-- ******* Inicio Panel ******** -->
           
            

	<?php $g=$todos_grupos;	?>

	<?php foreach ($g as $a): ?>

<pre>
	
	<?php //echo $alumno['Matricula'];exit(); ?>
</pre>



		<?php if ($alumno['Matricula']['Grupo']['id']===$a['Grupo']['id']): ?>

			<div class="panel-heading"><!-- ******* Cabecera del Panel ******** -->
				<h5 class="glyphicon glyphicon-equalizer"> Alumnos de <strong class='label label-success'><?php echo $alumno['Grupo']['nombre']; ?></strong></h5>
			</div>

			<div class="panel-body small"> <!-- ******* Cuerpo del Panel ******** -->

		<?php	

			foreach ($a['Alumno'] as $i) {	
		?>	

			<?php 
				$dni= $i['dni'];
				$grupo = $i['grupo_id'];
				$nombre_foto= $dni.'.jpg';
				$foto = $dir->find($nombre_foto, true);
				

				
				$image= $this->Html->image('fotos/default-h.png', array(
														'alt' => 'foto',
														//'width'=> '65px',
														'height'=> '40 px',
														'class'=> 'img-circle'));
				
				if (!empty($foto)) {
					
				$image=$this->Html->image('fotos/'.$dni.'.jpg', array(
														'alt' => 'foto',
														//'width'=> '65px',
														'height'=> '40 px',
														'class'=> 'img-circle'));	
				}
				
				$clase= 'btn small btn-default col-md-6 ';
				if ($i['id']===$alumno['Alumno']['id']) {
					$clase= 'btn small btn-primary col-md-6';
				}

				$nombre= $i['nombre'];
				$apellidos= $i['apellidos'];
				$contenido=$image.'<br>'.$nombre.'<br>'.$apellidos;

				$div = $this->Html->div(null, $contenido, array('class' => $clase,
																	)); 

				echo $this->Html->link($div, array(
												'controller' => 'alumnos', 
												'action'=>'ver', 
												$i['id']),array(
														'class' => 'light_blue', 
														'escape' => false)); 
		
		}	
		?>
		<?php endif ?>  
	<?php endforeach ?>
	<?php //exit(); ?>

	</div>
</div>