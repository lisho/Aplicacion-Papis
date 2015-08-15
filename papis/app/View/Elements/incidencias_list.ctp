
<!-- ******* Panel de listado de incidencias ******** -->

<div class="panel panel-info"> 

	<div class="panel-heading"> <!-- *** Cabecera del Panel *** -->
		<div class="row">		
			<div class="glyphicon glyphicon-th-list col-md-8">
				Listado de incidencias.
			</div>
						
			<div class="text-right col-md-4">
				<!--	<?php echo $this->Html->link('', array(
								'controller' => 'incidencias', 
								'action'=>'nuevo',
								$alumno['Alumno']['id']),array(
								'class'=>'btn btn-success btn-xs glyphicon glyphicon-plus')); ?> -->
			</div>
		</div>
	</div>	

	<div class="panel-body"> <!-- *** Cuerpo del Panel *** -->

		<?php if (!$alumno['Incidencia']):?>
				
			<p><strong>"No existen incidencias para este alumno"</strong></p>
		
		<?php else : ?>



			<table class="table table-striped">
				<thead>
					
					<th></th>
					<th>Fecha</th>
					<th>Titulo</th>
					<th>Descripción</th>
					<th>Creado por...</th>
					<th></th>
					<th></th>
				</thead>
				
				<?php foreach ($incidencias as $a): ?>

			<?php 

				# Evaluamos el tipo de incidencia para color del time-point.

				switch ($a['Tipoincidencia']['nombre']) {
        			case 'Promociona':
        				$time_point= 'glyphicon glyphicon-hand-up' ;
        				$color= 'success';
        				break;

        			case 'Justifica':
        				$time_point= 'glyphicon glyphicon-ok' ;
        				$color= 'info';
        				break;

        			case 'Baja':
        				$time_point= 'glyphicon glyphicon-stop' ;
        				$color= 'danger';
        				break;

        			case 'Incorpora':
        				$time_point= 'glyphicon glyphicon-play' ;
        				$color= 'success';
        				break;

        			case 'Evaluacion':
        				$time_point= 'glyphicon glyphicon-refresh' ;
        				$color= 'primary';
        				break;

        			case 'Aviso':
        				$time_point= 'glyphicon glyphicon-warning-sign' ;
        				$color= 'warning';
        				break;
        			
        			default:
        				$time_point= 'glyphicon glyphicon-pencil';
        				$color= 'primary';
        				break;
        		}
			 ?>

				<tr>
					<th class="<?php echo $time_point; ?> btn-<?php echo $color; ?> btn-circle">
						
					</th>

					
					<th> <?php echo $this->Time->format('d-m-Y',$a['Incidencia']['fecha']); ?> </th>
					<td> <?php echo $a['Incidencia']['titulo']; ?> </td>
					<td> <?php echo $a['Incidencia']['descripcion']; ?> </td>
					
					<td> <?php echo $a['User']['nombre'].' '.$a['User']['apellidos']?> </td>
				
					<td> <?php echo $this->Html->link('', array('controller' => 'incidencias', 'action'=>'editar', $a['Incidencia']['id']), array('class'=>"btn btn-info glyphicon glyphicon-pencil btn-xs")); ?> </td>
					
					<td> <?php echo $this->Form->postlink('', array('controller' => 'incidencias','action'=>'eliminar', $a['Incidencia']['id']), array('class'=>"btn btn-danger glyphicon glyphicon-trash btn-xs",'confirm'=> '¿Estás seguro de que quieres eliminar la incidencia de fecha '.$a['Incidencia']['fecha'].'?')); ?> </td>
				</tr>	

				<?php endforeach ?>

			</table>

		<?php endif ?>

		<hr>

	</div>
</div> <!-- ******* Fin Panel de listado de incidencias ******** -->
		