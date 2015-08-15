<br><br><br>

<?php echo $this->Form->create('Nombrehorario',array(
    'inputDefaults' => array(
        'label' => false,
        'div' => true
    )
)); ?> 

<?php echo $this->Form->input('nombre', array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							'text' => 'Nombre del horario:'
							),
					)); ?>

<?php echo $this->Form->input('definicion', array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							'text' => 'Describe el uso que va a tener el horario'
							),
					)); ?>


<div class="btn">
		<?php echo $this->Form->end('Guardar cambios');?>
</div>	