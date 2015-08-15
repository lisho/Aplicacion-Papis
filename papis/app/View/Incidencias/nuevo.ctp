

<h1><span class="label titulo-grupo">Crear una nueva incidencia para: </span></h1>
<h1 class="text-center"><small class=' titulo-grupo'><?php echo $nombre_alumno; ?></small></h1><hr>

	<?php // Para que se nois muestren todos los mensajes
				echo $this->Session->flash(); ?>

<div class="col-md-3">

	<div id="navbar" class="navbar-collapse collapse">
		<div class="navbar navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			
		</div>
	<?php echo $this->element('acciones'); ?>
	</div>	
	<div class="text-center">
		<?php echo $this->Form->postLink('Volver a la ficha' , array(
																'controller'=>'alumnos',
																'action'=>'ver',
																$alumno_id), array(
																	"class"=>"btn btn-xs btn-info")
								); ?>
		<p><?php echo 'de <b>'.$nombre_alumno.'</b> sin crear incidencia'; ?></p>
	</div>

				
</div>

<div class="col-md-9 has-success jumbotron">
	
	<?php echo $this->Form->create('Incidencia',array(
    'inputDefaults' => array(
        'label' => false,
        'div' => true
    )
)); ?> 

	<div class="row">

	<?php
		
		echo $this->Form->input('fecha', array(
					'class'=>'datetime  has-success',
					'dateFormat' => 'DMY',
					'label'=> array(
							'class'=>'control-label has-success',
							'text' => 'Fecha de la Incidencia'
							),
					));

		echo $this->Form->input('titulo', array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							'text' => 'Dale un título a la incidencia.'
							),
					));

		echo $this->Form->input('descripcion', array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							'text' => 'Describe la incidencia'
							),
					));
		
		
			
		echo $this->Form->input('alumno_id', array(
					'class'=>'input form-control has-success',
					'label'=> array(
								),
					'type' => 'hidden',
					));

		$options= array(
						'Promociona'=>'Promociona',
						'Justifica'=>'Justifica',
						'Baja'=>'Baja',
						'Incorpora'=>'Incorpora',
						'Evaluacion'=>'Evaluacion',
						'Aviso'=>'Aviso',
						);

		?>



		

			<?php /*

				echo $this->Form->radio('tipo', $options, array(
					
					'class'=>'btn btn-default has-success',
					//'multiple' =>'checkbox',
					'type' => 'button',
					
					'multiple' =>true,
					'text' => 'Tipo de Incidencia',
					//'div' => true,
					'div'=> array('class'=>'btn-default'),
	
				));*/
			 ?>

		<br>
		<div class="btn-group panel">
			<?php /*
				echo $this->Form->select('tipo', $options, array(	
						//'class'=>'btn-group',
						//'multiple' =>'checkbox',
						//'options'=> '',
						//'before' => '<div class="btn btn-default">',
						//'between'=>'</div><div class="btn btn-default">',
    					//'after' => '<span class="toggle"></span></div>',
						//'multiple' =>true,
						// 'options'=>$options,
						//'text' => 'Tipo de Incidencia',
						//'div' => true,
						//'div'=> array('class'=>'btn-group-group'),
						//'div'=> 'btn-group-group',
						'label'=>'¿Qué Tipo de incidencia quieres registrar?'
		
					));
				*/
			
			echo $this->Form->radio('tipoincidencia_id', $tipo_incidencia, array(
						'legend' =>'¿Qué Tipo de incidencia quieres registrar?',
						'separator'=>'<br>',
						//'before' => '<div class="btn btn-default">',
						//'between'=>'</div><div class="btn btn-default">',
    					//'after' => '</div>',
					));

			 ?> 
		</div>

	</div>
	
	<div class="btn">
		<?php echo $this->Form->end('Crear Incidencia');?>
	</div>	

</div>
