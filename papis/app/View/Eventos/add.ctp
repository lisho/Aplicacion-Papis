
<?php echo $this->Html->script(array('calendario.js'),array('inline'=>false)) ?>


<div class="eventos form form-group">

<?php echo $this->Form->create('Evento'); ?>
	
		<h1> <small class='titulo-grupo'> <?php echo __('Crear nuevo evento...'); ?></small></h1>
		<hr>


	<div class="jumbotron">
		<fieldset>
		<?php

			echo $this->Form->input('evento', array(
						'class'=>'input form-control has-success',
						'div'=>'form-group',
						'label'=> array(
								'class'=>'control-label has-success',
								'text' => 'Nombre del evento.'
								),
				));
			echo "<div class='input-group fecha-form'>";
			echo $this->Form->input('fecha', array(
						'class'=>'  has-success',
						'type'=>"text",
						//'dateFormat' => 'DMY',
						'div'=>'form-group',
						'id' =>'datepicker',
						'label'=> array(
								'class'=>'control-label has-success',
								'text' => 'Fecha del evento:'
								),
				));
			echo "</div>";

			echo $this->Form->input('horainicio', array(
						'class'=>'',
						//'type'=>"text",
						//'dateFormat' => 'DMY',
						'div'=>'form-group',
						//'id' =>'datepicker',
						'label'=> array(
								'class'=>'control-label has-success',
								'text' => 'Hora de inicio:'
								)
				));
				?>
			
		<?php
			
			echo "<div class='input-group'>";
			echo $this->Form->input('grupo_id', array(
						'class'=>'form-control',
						'id'=>"grupo",
						'type'=>"select",
						'selected' => $current_grupo,
						//'dateFormat' => 'DMY',
						'div'=>'input-group',
						//'value'=>'grupo_id',
						'label'=> array(
								'class'=>'input-group-addon',
								'text' => 'Grupo que va a asistir:',
								"aria-describedby"=>"grupo"),
						
						));
			echo "</div><br><div class='input-group'>";
			echo $this->Form->input('tipoevento_id', array(
						'class'=>'form-control',
						'id'=>"tipo_evento",
						//'type'=>"text",
						//'dateFormat' => 'DMY',
						'div'=>'input-group',
						//'id' =>'datepicker',
						'label'=> array(
								'class'=>'input-group-addon',
								'text' => 'Tipo de evento:',
								"aria-describedby"=>"tipo_evento"

								)));
			echo "</div><br><div class='input-group'>";
			echo $this->Form->input('cursoacademico_id', array(
						'class'=>'form-control',
						'id'=>"curso",
						//'type'=>"text",
						//'dateFormat' => 'DMY',
						'div'=>'input-group',
						//'id' =>'datepicker',
						'label'=> array(
								'class'=>'input-group-addon',
								'text' => 'Curso Académico:',
								"aria-describedby"=>"curso"

								)));
			echo "</div>";
		?>
		</fieldset>	
		
		<div class="btn">
				<?php echo $this->Form->end(array(
							'label'=>'Crear Evento',
							'class'=>'btn btn-success btn-success',
						
							)); ?>
		</div>	
	</div>
		
</div>


<!--
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Eventos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipoeventos'), array('controller' => 'tipoeventos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoevento'), array('controller' => 'tipoeventos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grupos'), array('controller' => 'grupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grupo'), array('controller' => 'grupos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asistencias'), array('controller' => 'asistencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asistencia'), array('controller' => 'asistencias', 'action' => 'add')); ?> </li>
	</ul>
</div> -->
