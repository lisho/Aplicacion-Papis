<div class="asistencias view">
<h2><?php echo __('Asistencia'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($asistencia['Asistencia']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Asistencia'); ?></dt>
		<dd>
			<?php echo h($asistencia['Asistencia']['asistencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observaciones'); ?></dt>
		<dd>
			<?php echo h($asistencia['Asistencia']['observaciones']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evento'); ?></dt>
		<dd>
			<?php echo $this->Html->link($asistencia['Evento']['id'], array('controller' => 'eventos', 'action' => 'view', $asistencia['Evento']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Matricula'); ?></dt>
		<dd>
			<?php echo $this->Html->link($asistencia['Matricula']['id'], array('controller' => 'matriculas', 'action' => 'view', $asistencia['Matricula']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($asistencia['Asistencia']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($asistencia['Asistencia']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Asistencia'), array('action' => 'edit', $asistencia['Asistencia']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Asistencia'), array('action' => 'delete', $asistencia['Asistencia']['id']), array(), __('Are you sure you want to delete # %s?', $asistencia['Asistencia']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Asistencias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asistencia'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Eventos'), array('controller' => 'eventos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evento'), array('controller' => 'eventos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matriculas'), array('controller' => 'matriculas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Matricula'), array('controller' => 'matriculas', 'action' => 'add')); ?> </li>
	</ul>
</div>
