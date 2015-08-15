

<div class="list-group">

	
	<?php 

	$activo= (($this->params['controller']==='grupos')&& ($this->params['action']=='index') )?'active' :'';

	echo $this->Html->link('   Gestionar Grupos', array(
								'controller' => 'grupos', 
								'action'=>'index'),array(
								'class'=> $activo.' glyphicon glyphicon-edit list-group-item')); ?>

	<?php 

	$activo= (($this->params['controller']==='alumnos')&& ($this->params['action']=='index') )?'active' :'';

	echo $this->Html->link('   Listado de usuarios', array(
								'controller' => 'alumnos',
								'action'=>'index'),array(
								'class'=>$activo.' glyphicon glyphicon-list list-group-item')); ?>

	<hr>

	<?php 

	$activo= (($this->params['controller']==='alumnos')&& ($this->params['action']=='nuevo') )?'active' :'';

	echo $this->Html->link('    Añadir Alumno', array(
								'controller' => 'alumnos', 
								'action'=>'nuevo'),array(
								'class'=>$activo.' glyphicon glyphicon-plus list-group-item')); ?> 

	<?php 

	$activo= (($this->params['controller']==='grupos')&& ($this->params['action']=='nuevo') )?'active' :'';

	echo $this->Html->link('    Añadir Grupo', array(
								'controller' => 'grupos', 
								'action'=>'nuevo'),array(
								'class'=>$activo.' glyphicon glyphicon-plus list-group-item')); ?> 


</div>

