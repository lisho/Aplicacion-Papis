
<br><br>
<div class="col-md-12 alert alert-warning">

	<div class="col-md-3">
	
		<h3 class="alert alert-success">Insertar Incidencia</h3>
		
		<h3><small>Si has relizado algún cambio relevante en la <?php echo $titulo_pagina; ?> sería interesante que lo dejaras recogido. ¿Quieres añadir una incidencia para este alumno y dejar constancia de la acción que has efectuado?</small></h3>

		<div class="btn">
			<?php echo $this->Form->postlink('No, gracias', $url, array('class'=>'btn btn-info')); ?>
		</div>
	
	</div>

	<div class="col-md-9 alert alert-success">

		<div class="">

			<?php 

			echo $this->Form->create('Incidencia' ,array(
			    'url' => array(
			        		'controller' => 'incidencias', 
			        			'action' => 'nuevo',
			        			$alumno['Alumno']['id']),
			    'inputDefaults' => array(
			        'label' => false,
			        'div' => true,           
			    )
			)); 

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

			echo $this->Form->radio('tipoincidencia_id', $options, array(
							'legend' =>'¿Qué Tipo de incidencia quieres registrar?',
							'separator'=>'<br>',
						
						));

			?> 
				 	
			<div class="btn">
				<?php echo $this->Form->end(array(
												'label'=>'Crear Incidencia',
												'class'=>'btn btn-info'));?>
			</div>
		</div>
	</div>

</div>