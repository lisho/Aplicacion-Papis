
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
</div>

<div class="col-md-9 has-success jumbotron">
	
	<?php echo $this->Form->create('Incidencia',array(
    'inputDefaults' => array(
        'label' => false,
        'div' => true
    )
)); ?> 

	<div class="row">

	
		<div class="form-group">
	<?php
				


		echo $this->Form->hidden('alumno_id', array(
					'class'=>'input form-control has-success',
					'label'=> array(
								)
					));

	?>
		</div>

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
							'text' => 'Modifica el título de la incidencia.'
							),
					));

		echo $this->Form->input('descripcion', array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							'text' => 'Puedes añadir o modificar datos de la descripción de la inicdencia.'
							),
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
<br>
<div class="'btn-group panel'">
	
			<?php 
	/*		
				echo $this->Form->radio('tipoincidencia_id', $tipo_incidencia,  array(	
					//'radio' => false,	
    				//'type' => 'button',
     				//'before' => '<div class="btn btn-default">',
     				'separator'=>'</div><br><div class="btn btn-default">',
     				//'between'=>'</div><div class="btn btn-default">',
     				//'after' => '</div>',
        			'legend' => false,

        			//'class' => 'btn btn-default',
        			//'legend' => false,
        			//'class' => 'radio-btn',
					'class'=>'btn btn-default',
					//'multiple' =>'checkbox',
					//'options'=> '',
					//'before' => '<div class="btn btn-default">',
					//'between'=>'</div><div class="btn btn-default">',
					//'after' => '<span class="toggle"></span></div>',
					///'multiple' =>false,
					// 'options'=>$options,
					//'text' => 'Tipo de Incidencia',
					//'div' => true,
					//'div'=> array('class'=>'btn-group-group'),
					//'div'=> 'btn btn-default',
		
					)); 

					echo $this->Form->input('tipoincidencia_id',  array(	//'div' => true,
		    				'type' => 'radio',
		    				'label' => true,
		     				//'before' => '<div class="btn btn-default">',
		     				//'separator'=>'</div><div class="btn btn-default">',
		     				//'between'=>'</div><div class="btn btn-default">',
		     				//'after' => '</div>',
		     				'hiddenField' => false,
		        			'legend' => false,
		        			//'class' => 'btn btn-default',
		        			'options' => $options,
							//'div'=> 'btn btn-default'

							));
 					*/

		echo $this->Form->radio('tipoincidencia_id', $tipo_incidencia, array(
						'legend' => '¿Quieres modificar el Tipo de incidencia?',
						'separator'=>'<br>',
						//'before' => '<div class="btn btn-default">',
						//'between'=>'</div><div class="btn btn-default">',
    					//'after' => '</div>',
					));
		
			 ?>
	
		</div>

	</div>
	
	<div class="btn">
		<?php echo $this->Form->end('Guardar Cambios');?>
	</div>	

</div>
