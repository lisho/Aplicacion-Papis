<div class="tipoeventos view">
<h2><?php echo __('Tipoevento'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tipoevento['Tipoevento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipoevento'); ?></dt>
		<dd>
			<?php echo h($tipoevento['Tipoevento']['tipoevento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($tipoevento['Tipoevento']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tipoevento['Tipoevento']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tipoevento['Tipoevento']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tipoevento'), array('action' => 'edit', $tipoevento['Tipoevento']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tipoevento'), array('action' => 'delete', $tipoevento['Tipoevento']['id']), array(), __('Are you sure you want to delete # %s?', $tipoevento['Tipoevento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipoeventos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoevento'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Eventos'), array('controller' => 'eventos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evento'), array('controller' => 'eventos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Eventos'); ?></h3>
	<?php if (!empty($tipoevento['Evento'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Evento'); ?></th>
		<th><?php echo __('Horainicio'); ?></th>
		<th><?php echo __('Tipoevento Id'); ?></th>
		<th><?php echo __('Grupo Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tipoevento['Evento'] as $evento): ?>
		<tr>
			<td><?php echo $evento['id']; ?></td>
			<td><?php echo $evento['fecha']; ?></td>
			<td><?php echo $evento['evento']; ?></td>
			<td><?php echo $evento['horainicio']; ?></td>
			<td><?php echo $evento['tipoevento_id']; ?></td>
			<td><?php echo $evento['grupo_id']; ?></td>
			<td><?php echo $evento['created']; ?></td>
			<td><?php echo $evento['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'eventos', 'action' => 'view', $evento['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'eventos', 'action' => 'edit', $evento['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'eventos', 'action' => 'delete', $evento['id']), array(), __('Are you sure you want to delete # %s?', $evento['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Evento'), array('controller' => 'eventos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
