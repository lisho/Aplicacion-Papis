<h2>CREAR USUARIO:</h2>


<div class="col-md-9 has-success jumbotron">
<div class="users form">
<div class="row">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Crear un nuevo Usuario'); ?></legend>
	<?php
		echo $this->Form->input('nombre', array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							)));
		echo $this->Form->input('apellidos', array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							)));

		$roles= array(
						'Administrador'=>'Administrador',
						'TEDIS'=>'TEDIS',
						'PAPIS'=>'PAPIS',
						'Invitado'=>'Invitado',
						//'Evaluacion'=>'Evaluacion',
						//'Aviso'=>'Aviso',
						);

		echo $this->Form->input('entidad', array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							)));
		echo $this->Form->input('telefono', array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							)));
		echo $this->Form->input('username', array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							)));
		echo $this->Form->input('password', array(
					'class'=>'input form-control has-success',
					'label'=> array(
							'class'=>'control-label has-success',
							)));
		echo "<b>Selecciona un ROL:</b>";
		echo $this->Form->select('role', $roles, array(
					'class'=>'input form-control has-success',
					
							));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Crear')); ?>
</div>
</div>
</div>