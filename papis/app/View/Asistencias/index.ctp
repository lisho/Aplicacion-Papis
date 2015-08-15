<div class="asistencias index">
	<h2><?php echo __('Asistencias'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('asistencia'); ?></th>
			<th><?php echo $this->Paginator->sort('observaciones'); ?></th>
			<th><?php echo $this->Paginator->sort('evento_id'); ?></th>
			<th><?php echo $this->Paginator->sort('matricula_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($asistencias as $asistencia): ?>
	<tr>
		<td><?php echo h($asistencia['Asistencia']['id']); ?>&nbsp;</td>
		<td><?php echo h($asistencia['Asistencia']['asistencia']); ?>&nbsp;</td>
		<td><?php echo h($asistencia['Asistencia']['observaciones']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($asistencia['Evento']['id'], array('controller' => 'eventos', 'action' => 'view', $asistencia['Evento']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($asistencia['Matricula']['id'], array('controller' => 'matriculas', 'action' => 'view', $asistencia['Matricula']['id'])); ?>
		</td>
		<td><?php echo h($asistencia['Asistencia']['created']); ?>&nbsp;</td>
		<td><?php echo h($asistencia['Asistencia']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $asistencia['Asistencia']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $asistencia['Asistencia']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $asistencia['Asistencia']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $asistencia['Asistencia']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Asistencia'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Eventos'), array('controller' => 'eventos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evento'), array('controller' => 'eventos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matriculas'), array('controller' => 'matriculas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Matricula'), array('controller' => 'matriculas', 'action' => 'add')); ?> </li>
	</ul>
</div>
