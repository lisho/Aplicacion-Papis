<?php echo $this->Html->script(array('horario.js'),array('inline'=>false)) ?>

<!-- ***************** HEADER DE LA PÁGINA ********************* -->


<div class="container">
	<div class="col-lg-12 center-block">
		<div class="row titulo-participante">
			<div class="col-lg-7 ">
				<h1 class="text-center"><span class="label titulo-grupo "> <?php echo $titulo_pagina; ?></span><small class='titulo-grupo nombre-alumno'> <?php echo $alumno['Alumno']['nombre'].' '.$alumno['Alumno']['apellidos']; ?></small></h1> 
			</div>
		
			<div class="btn-group col-lg-5">

				<h3 class="text-primary text-right ">
					<?php echo $this->Html->link('Gestión de Grupos', array(
									'controller' => 'grupos', 
									'action'=>'index'),array(
									'class'=> '')); ?>
				</h3><hr>

				<div class="text-right">

					<?php echo $this->Form->postLink(' Asistencias', array('controller' => '', 'action'=>'',), array('class'=>"btn glyphicon glyphicon-eye-open btn-info")); ?>	

					<?php echo $this->Html->link('   Incidencia', array(
								'controller' => 'incidencias', 
								'action'=>'nuevo',
								$alumno['Alumno']['id']),array(
								//'div'=>true,
								'class'=>'btn btn-info glyphicon glyphicon-plus',
								//'type'=>'button'
								)); ?>

					<button id="" class="btn btn-info glyphicon glyphicon-calendar boton_horario" >  Mi Horario</button>
					<?php //echo $this->Html->link('Mi Horario', array('controller' => '', 'action'=>''), array('class'=>"btn btn-info")); ?>
				</div>	

				
			</div>
		
		</div>	

								<!-- ***************** ZONA MENSAJE ********************* -->

				<?php // Para que se nois muestren todos los mensajes
					echo $this->Session->flash();
					echo $this->Flash->render(); ?>

	</div>
	
<hr>


<!-- ***************** Barra lateral de navegación ********************* -->

<div class="nav col-md-3">

	

			<!-- ***************** HORARIO ********************* -->
	
	<div id="horario">	
			<!-- Lanzado desde element perfil-papis -->
		<?php echo $this->element('horario_por_alumno'); ?>

	</div>
	<!-- ***************** FIN HORARIO ********************* -->

		<?php //echo $this->element('acciones'); ?>

		<?php //echo $this->element('compis'); ?>

		<?php echo $this->element('perfil_papis'); ?>
	

		<!-- Leyenda de iconos -->
<div id="navbar" class="navbar-collapse collapse">
		<div class="navbar navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
			
		</div>
		<div class="panel panel-warning ">
            <div class="panel-heading">Leyenda de iconos</div>
            <div class="panel-body small">
			
				<p class='glyphicon glyphicon-hand-up'> El alumno promociona.</p>
				<p class='glyphicon glyphicon-ok'> Justifica una ausencia.</p>
				<p class='glyphicon glyphicon-stop'> Baja en el Programa.</p>
				<p class='glyphicon glyphicon-play'> Se incorpora al programa.</p>
				<p class='glyphicon glyphicon-refresh'> Evaluacion/seguimiento.</p>
				<p class='glyphicon glyphicon-warning-sign'> Aviso/Alerta.</p>
			</div>
		</div>

	</div>
</div>

<!-- ***************** Contenedor principal ********************* -->

<div class="col-md-9"> 

<!-- ** E*L*E*M*E*N*T Notas ESO *** -->
	<?php if (!empty($grupos_cepa)): ?>
		
		<?php echo $this->element('notas_eso'); ?> 
	<?php endif ?>

<!-- ** E*L*E*M*E*N*T Lista de Incidencias *** -->

		<?php echo $this->element('incidencias_list'); ?> 

<!-- ** E*L*E*M*E*N*T Panel de línea de tiempo *** -->
		
		<?php echo $this->element('incidencias_timeline'); ?> 
		
</div>
</div> <!-- ******* Fin contenedor principal ******** -->
