

<!-- *** E*L*E*M*E*N*T LINEA DE TIEMPO DE INCIDENCIAS *** -->

<div class="panel panel-info">

	<div class="panel-heading"> <!-- *** Cabecera del Panel *** -->
		<div class="row">	
			<div class="glyphicon glyphicon-time col-md-8">
				Línea de tiempo.
			</div>
			<div class="col-md-4 text-right">
				<!--<?php echo $this->Html->link('', array(
								'controller' => 'incidencias', 
								'action'=>'nuevo',
                                $alumno['Alumno']['id']),array(
								'class'=>'btn btn-success btn-xs glyphicon glyphicon-plus'
                                )); ?> -->
			</div> 
		</div>
	</div> <!-- *** Fin Cabecera del Panel *** -->


	<div class="panel-body"> <!-- *** Cuerpo del Panel *** -->

		<?php if (!$alumno['Incidencia']):?>
					
			<p><strong>"No existen incidencias para mostrar en la línea de tiempo de este alumno"</strong></p>
		
		<?php else : ?>

	    <ul class="timeline">

        	<?php $lado='izquierdo'; ?>



        	
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
        				$time_point= 'alert glyphicon glyphicon-warning-sign' ;
        				$color= 'warning';
        				break;
        			
        			default:
        				$time_point= 'glyphicon glyphicon-pencil';
        				$color= 'primary';
        				break;
        		}

        		# Seleccionamos el lado del cuadro de texto.
        		
					if ($lado=='izquierdo') {
						$ubicacion='';
						$lado='derecho';
					}else{
						$ubicacion='timeline-inverted';
						$lado='izquierdo';
					}

				 ?>

                <li class='<?php echo $ubicacion;?>'>

                	<div class=" <?php echo 'timeline-badge'.' '.$color; ?> ">
						<i class="<?php echo $time_point; ?>"></i>
                	</div>

                    <div class='timeline-panel'>
                        <div class="timeline-heading">
                            
                            <h4 class="imeline-title"><?php echo $this->Time->format('d-m-Y', $a['Incidencia']['fecha']); ?></h4>
                            <p><small class="text-muted"><i class=""></i> 11 hours ago via Twitter</small></p>
                           
                        </div>
                        
                        <div class="timeline-body">
                            <p class="text-muted"><strong><?php echo $a['Tipoincidencia']['nombre']; ?></strong></p>
                            <p><strong><?php echo $a['Incidencia']['titulo']; ?></strong></p>
                            <p><?php echo $a['Incidencia']['descripcion']; ?></p>
                            
                        </div>
                    </div>

                </li>
            
            <?php endforeach ?>

        </ul>
        <?php endif ?>
    </div> <!-- *** Fin Cuerpo del Panel *** -->
</div>
