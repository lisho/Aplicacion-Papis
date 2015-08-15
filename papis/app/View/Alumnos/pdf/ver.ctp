

<!-- ***************** Titulo de la Ficha ********************* -->

<div class="jumbotron">
	<h1 class="glyphicon glyphicon-modal-window">  <?php echo $titulo_pagina; ?> </h1>
</div>
	<?php // Para que se nois muestren todos los mensajes
				echo $this->Session->flash();
				echo $this->Flash->render(); ?>


<!-- ***************** Barra lateral de navegación ********************* -->

<div class="nav col-md-3">

	

	<div id="navbar" class="navbar-collapse collapse">
		<div class="navbar navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
			
		</div>

		<?php //echo $this->element('acciones'); ?>

		<?php //echo $this->element('compis'); ?>

		<?php echo $this->element('perfil_papis'); ?>

		<!-- Leyenda de iconos -->

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
		

</div> <!-- ******* Fin contenedor principal ******** -->
