<div class="text-center nube-grupos">

	<?php foreach ($todos_grupos as $g): ?>
					
		<!-- # ***** Sacamos listado de los grupos de este curso ********************* -->

		<?php $lista_grupos=array(); ?>

		<?php foreach ($g['Matricula'] as $matricula_por_curso): ?>
			
			<?php if ($matricula_por_curso['cursoacademico_id']===$curso_actual['Cursoacademico']['id']): ?>
				<?php $lista_grupos[]=$matricula_por_curso['grupo_id']; ?>
			<?php endif ?>
			

		<?php endforeach ?>
			
		<!-- # ************************* -->

		<?php if (!empty($g['Matricula']&&
			in_array($g['Grupo']['id'],$lista_grupos))): ?>
			
			<div class="btn">

				<?php echo $this->Html->link($g['Grupo']['nombre'], array('controller' => 'grupos', 'action'=>'ver', $g['Grupo']['id'],$curso_actual['Cursoacademico']['id']), array('class'=>"btn btn-xs btn-info")); ?>

			</div>

		<?php endif ?>
		
	<?php endforeach ?>

</div>