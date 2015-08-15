<div class="eventos view">
<h2><?php echo __('Evento'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($evento['Evento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($evento['Evento']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evento'); ?></dt>
		<dd>
			<?php echo h($evento['Evento']['evento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Horainicio'); ?></dt>
		<dd>
			<?php echo h($evento['Evento']['horainicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipoevento'); ?></dt>
		<dd>
			<?php echo $this->Html->link($evento['Tipoevento']['tipoevento'], array('controller' => 'tipoeventos', 'action' => 'view', $evento['Tipoevento']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grupo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($evento['Grupo']['id'], array('controller' => 'grupos', 'action' => 'view', $evento['Grupo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($evento['Evento']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($evento['Evento']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Evento'), array('action' => 'edit', $evento['Evento']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Evento'), array('action' => 'delete', $evento['Evento']['id']), array(), __('Are you sure you want to delete # %s?', $evento['Evento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Eventos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evento'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipoeventos'), array('controller' => 'tipoeventos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoevento'), array('controller' => 'tipoeventos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grupos'), array('controller' => 'grupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grupo'), array('controller' => 'grupos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asistencias'), array('controller' => 'asistencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asistencia'), array('controller' => 'asistencias', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Asistencias'); ?></h3>
	<?php if (!empty($evento['Asistencia'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Asistencia'); ?></th>
		<th><?php echo __('Observaciones'); ?></th>
		<th><?php echo __('Evento Id'); ?></th>
		<th><?php echo __('Matricula Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($evento['Asistencia'] as $asistencia): ?>
		<tr>
			<td><?php echo $asistencia['id']; ?></td>
			<td><?php echo $asistencia['asistencia']; ?></td>
			<td><?php echo $asistencia['observaciones']; ?></td>
			<td><?php echo $asistencia['evento_id']; ?></td>
			<td><?php echo $asistencia['matricula_id']; ?></td>
			<td><?php echo $asistencia['created']; ?></td>
			<td><?php echo $asistencia['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'asistencias', 'action' => 'view', $asistencia['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'asistencias', 'action' => 'edit', $asistencia['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'asistencias', 'action' => 'delete', $asistencia['id']), array(), __('¿Estás seguro de que quieres eliminar este evento?', $asistencia['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Asistencia'), array('controller' => 'asistencias', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
