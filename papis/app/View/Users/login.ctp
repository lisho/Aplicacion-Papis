
<!-- BOOTSTRAP NAVBAR - BARRA DE NAVEGACIÓN-->

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Bienvenidos al Programa de Inclusión Social del Ayuntamiento de León</a>
        </div>

	<?php if (isset($current_user)): ?>

		 <div id="navbar" class="navbar-right">
		 	
 			<ul class="nav navbar-nav">
 				
				<li class="">
					
					<?php echo $this->Html->link('  '.$current_user['nombre_user'],array(
											'controller'=>'users', 
											'action'=>'login'), array(
											'class'=>' glyphicon glyphicon-user')); ?>

					<?php //echo " ".$current_user['nombre_user']; ?>
				</li>

				<li class=''>
					<div class="navbar-form navbar-right">
					
					<?php echo $this->Html->link('Salir',array(
											'controller'=>'users', 
											'action'=>'logout'), array(
											'type'=>'button',
											'class'=>'btn btn-success'
											)
									); ?>
					</div>
				</li>

 			</ul>
 		</div> <!-- Fin //navbar-right -->
				
	<?php else: ?>


        <div id="navbar" class="navbar-collapse collapse">
			
			<?php echo $this->Form->create('User', array('class'=>'navbar-form navbar-right')); ?>
			<div class="form-group">
			<?php echo $this->Form->input('username', array(
														'label'=>false,
														'class'=>'form-control',
														'placeholder'=>'Usuario')); ?>
			</div>

			<div class="form-group">
			<?php echo $this->Form->input('password', array(
														'label'=>false,
														'class'=>'form-control',
														'placeholder'=>'Contraseña')); ?>
			</div>

			<?php echo $this->Form->button('Entrar', array('class'=>'btn btn-success')); ?>

			<?php echo $this->Form->end(); ?>

        </div> <!-- Fin //navbar-collapse -->

	<?php endif ?>

    </div> <!-- Fin container -->
</nav> <!-- Fin navbar-inverse -->



<br><br><br><br><br>


<!-- PANELES DE LOS PROGRAMAS-->


	<div dir="row">

	<?php if (!isset($current_user)): ?>

		<div class="jumbotron">
			<h2>Bienvenidos a la Aplicación Informática para la Gestión de los Programas del Área de Inclusión Social del Ayuntamiento de León.</h2>

			<p>Para continuar debes loguearte como usuario de la aplicación...</p>

		</div>

		<!-- ***************** ZONA MENSAJE ********************* -->
			<?php // Para que se nois muestren todos los mensajes
						echo '<br>'.$this->Session->flash(); ?>

		<!-- ***************** BODY DE LA PAGINA ********************* -->

	<?php endif; ?>

		
	<!-- Panel PAPIS-->

		<div class="col-md-4 col-xs-12 panel">
			
			<div class="panel panel-primary">
			
				<div class="panel panel-heading">
							
					<p> PAPIS - Programa de Apoyo a los Procesos de Inclusión Social </p>
					
				</div> 

				<div class="panel panel-body">
					
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

				</div> 

				<div class="panel panel-footer">
						<?php if ($current_user['role']==='Profesor PAPIS' || $current_user['role']==='Administrador'): ?>
							
							<?php echo $this->Html->link('Entrar', array('controller'=>'grupos', 'action'=>'index')) ?>

						<?php endif ?>
						

				</div> 
			</div>
		</div>		<!-- FIN Panel PAPIS-->


	<!-- Panel PROGRAMA DE ABSENTISMO-->	

		<div class="col-md-4 col-xs-12 panel">
			
			<div class="panel panel-primary">
			
				<div class="panel panel-heading">
									
					<p> PMPSCAE - Programa Municipal de Prevención, Seguimiento y Control del Absentismo Escolar</p>
	
				</div> 

				<div class="panel panel-body">
					
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

				</div> 

				<div class="panel panel-footer">
						
						<?php if ($current_user['role']==='Profesor PAPIS' || $current_user['role']==='Administrador'): ?>
							
							<?php echo $this->Html->link('Entrar', array('controller'=>'grupos', 'action'=>'index')) ?>

						<?php endif ?>

				</div> 
			</div>
		</div> <!-- FIN Panel PROGRAMA DE ABSENTISMO-->	


	<!-- Panel programa de inclusión-->

		<div id="effect" class="col-md-4 col-xs-12 panel">
			
			<div class="panel panel-primary">
			
				<div class="panel panel-heading">
							
					<p> Programa Municipal de Inclusión Social - Equipos de Inclusión Social EDIS </p>					

				</div> 

				<div class="panel panel-body">
					
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

				</div> 

				<div class="panel panel-footer">
						
						<?php if ($current_user['role']==='TEDIS' || $current_user['role']==='Administrador'): ?>
							
							<?php echo $this->Html->link('Entrar', array('controller'=>'grupos', 'action'=>'index')) ?>

						<?php endif ?>

				</div> 
			</div>
		</div>	
	</div> <!-- FIN Panel programa de inclusión-->




