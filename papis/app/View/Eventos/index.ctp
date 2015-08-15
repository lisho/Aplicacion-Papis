<div class="eventos index">
	<h2><?php echo __('Eventos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th><?php echo $this->Paginator->sort('evento'); ?></th>
			<th><?php echo $this->Paginator->sort('horainicio'); ?></th>
			<th><?php echo $this->Paginator->sort('tipoevento_id'); ?></th>
			<th><?php echo $this->Paginator->sort('grupo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($eventos as $evento): ?>
	<tr>
		<td><?php echo h($evento['Evento']['id']); ?>&nbsp;</td>
		<td><?php echo h($evento['Evento']['fecha']); ?>&nbsp;</td>
		<td><?php echo h($evento['Evento']['evento']); ?>&nbsp;</td>
		<td><?php echo h($evento['Evento']['horainicio']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($evento['Tipoevento']['tipoevento'], array('controller' => 'tipoeventos', 'action' => 'view', $evento['Tipoevento']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($evento['Grupo']['id'], array('controller' => 'grupos', 'action' => 'view', $evento['Grupo']['id'])); ?>
		</td>
		<td><?php echo h($evento['Evento']['created']); ?>&nbsp;</td>
		<td><?php echo h($evento['Evento']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $evento['Evento']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $evento['Evento']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $evento['Evento']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $evento['Evento']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Evento'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipoeventos'), array('controller' => 'tipoeventos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoevento'), array('controller' => 'tipoeventos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grupos'), array('controller' => 'grupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grupo'), array('controller' => 'grupos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asistencias'), array('controller' => 'asistencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asistencia'), array('controller' => 'asistencias', 'action' => 'add')); ?> </li>
	</ul>
</div>
