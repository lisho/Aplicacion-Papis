<br><br><br>
<br><br><br>

<h1>Listado de tipos de horario:</h1>
<?php // Para que se nois muestren todos los mensajes
				echo $this->Session->flash(); ?>
<table class="table table-hover ">



<thead>
	<th>Horario</th>
	<th>Descripción</th>
	<th>Creado</th>
	<th>Modificado</th>
	<th>Editar</th>
	<th>Eliminar</th>
</thead>
<?php foreach ($nombrehorarios as $horario): ?>
<tbody>
	<td><?php echo $horario['Nombrehorario']['nombre'] ?></td>
	<td><?php echo $horario['Nombrehorario']['definicion'] ?></td>
	<td><?php echo $horario['Nombrehorario']['created'] ?></td>
	<td><?php echo $horario['Nombrehorario']['modified'] ?></td>
	<td> <?php echo $this->Html->link('', array('action'=>'editar', $horario['Nombrehorario']['id']), array('class'=>"btn btn-info glyphicon glyphicon-pencil")); ?> </td>
	<td> <?php echo $this->Form->postlink('', array('action'=>'eliminar', $horario['Nombrehorario']['id']), array('class'=>"btn btn-danger glyphicon glyphicon-trash", 'confirm'=> '¿Estás seguro de que quieres eliminar el tipo de horario: '.$horario['Nombrehorario']['nombre'].', junto con todas las sesiones asociadas a él?')); ?> </td>
</tbody>

	
<?php endforeach ?>

</table>