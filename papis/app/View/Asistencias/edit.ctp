<div class="asistencias form">
<?php echo $this->Form->create('Asistencia'); ?>
	<fieldset>
		<legend><?php echo __('Edit Asistencia'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('asistencia');
		echo $this->Form->input('observaciones');
		echo $this->Form->input('evento_id');
		echo $this->Form->input('matricula_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Asistencia.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Asistencia.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Asistencias'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Eventos'), array('controller' => 'eventos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evento'), array('controller' => 'eventos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matriculas'), array('controller' => 'matriculas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Matricula'), array('controller' => 'matriculas', 'action' => 'add')); ?> </li>
	</ul>
</div>
