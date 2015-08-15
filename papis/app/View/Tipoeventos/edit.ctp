<div class="tipoeventos form">
<?php echo $this->Form->create('Tipoevento'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tipoevento'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tipoevento');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tipoevento.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Tipoevento.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tipoeventos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Eventos'), array('controller' => 'eventos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evento'), array('controller' => 'eventos', 'action' => 'add')); ?> </li>
	</ul>
</div>
