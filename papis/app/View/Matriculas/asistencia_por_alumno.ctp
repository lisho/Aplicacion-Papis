

<?php echo $this->Html->script(array('pestañas.js'),array('inline'=>false)); ?>

<?php 

	$image=$this->Html->image('fotos/'.$nombre_foto, array(
											'class'=>'thumbnail',
											'alt' => 'foto',
											'width'=> '130 px',
											'url' => array(
						  								'controller' => 'alumnos', 
						  								'action'=>'ver', 
						  								$asistencias_por_alumno[0]['Alumno']['id']),
											//'height'=> '85 px'
											));	
?>

<!-- ***************** HEADER DE LA PÁGINA ********************* -->


<div class="container row">
	<div class="col-lg-12 center-block">
		<div class="row">
			<div class="col-lg-2"><?php echo $image; ?></div>
			<div class="col-lg-5 ">
				<h1 class="text-left"><span class="label titulo-grupo ">Mis Asistencias</span></h1>
				<h1 class=" text-center"><small class='titulo-grupo nombre-alumno'><?php echo $nombre_alumno; ?></small></h1> 
				
			</div>
		
			<div class="btn-group col-lg-5">

				<h3 class="text-primary text-right ">
					<?php echo $this->Html->link('Gestión de Grupos', array(
									'controller' => 'grupos', 
									'action'=>'index'),array(
									'class'=> '')); ?>
				</h3><hr>

				<div class="text-right">

				<!--
					<?php echo $this->Form->postLink(' Asistencias', array('controller' => '', 'action'=>'',), array('class'=>"btn glyphicon glyphicon-eye-open btn-info")); ?>	

					<?php echo $this->Html->link('   Incidencia', array(
								'controller' => 'incidencias', 
								'action'=>'nuevo',
								$alumno['Alumno']['id']),array(
								//'div'=>true,
								'class'=>'btn btn-info glyphicon glyphicon-plus',
								//'type'=>'button'
								)); ?>

					<button id="" class="btn btn-info glyphicon glyphicon-calendar boton_horario" >  Mi Horario</button>
					<?php //echo $this->Html->link('Mi Horario', array('controller' => '', 'action'=>''), array('class'=>"btn btn-info")); ?>
					-->
				</div>	

				
			</div>
		</div>		
	</div>
</div>	<hr>


<!-- ***************** ZONA MENSAJE ********************* -->
<?php // Para que se nois muestren todos los mensajes
				echo '<br>'.$this->Session->flash(); ?>

<!-- ***************** BODY DE LA PAGINA ********************* -->


