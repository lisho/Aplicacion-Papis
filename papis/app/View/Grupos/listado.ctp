
<!-- ***************** Listado de Grupos ********************* -->
<h1> <small class='titulo-grupo'> <?php echo __('Gestión de Grupos.'); ?></small></h1>
		<hr>

	<?php // Para que se nois muestren todos los mensajes
				echo $this->Session->flash(); ?>

<!-- ***************** Barra lateral de navegación ********************* -->

<div class="col-md-3">
		
	<div id="navbar" class="navbar-collapse collapse">
		<div class="navbar navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			
		</div>

		<?php echo $this->element('acciones'); ?>

		<h2>Grupos:</h2>

	</div>

		<?php foreach ($todos_grupos as $grupo): ?>
		
			<div class="btn col-lg-2">

				<?php echo $this->Html->link($grupo['Grupo']['nombre'], array('controller' => 'grupos', 'action'=>'ver', $grupo['Grupo']['id']), array('class'=>"btn btn-xs btn-info")); ?>
	
			</div>
			
		<?php endforeach ?>
</div>

<!-- ***************** Contenedor principal ********************* -->

<div class="col-md-9"> 

	<div class="panel panel-info">
	  <!-- Default panel contents -->
		<div class="panel-heading"> <!-- *** Cabecera del Panel *** -->

	 		<div class="row">		
				
				<div class="glyphicon glyphicon-th-list col-md-8">
					Acciones Grupales de P.A.P.I.S.
				</div>
							
				<div class="text-right col-md-4">
						<?php echo $this->Html->link('', array(
							'controller' => 'grupos', 
							'action'=>'nuevo'),array(
							'class'=>'btn btn-success btn-xs glyphicon glyphicon-plus')); ?> 
				</div>
			</div>
	   	</div> <!-- *** Fin Cabecera del Panel *** -->

		<div class="panel-body"> <!-- *** Cuerpo del Panel *** -->

			<table class="table table-hover">
				
				<thead>           
					<tr>
						<th><?php echo $this->Paginator->sort('nombre', null, array('direction' => 'desc'));?></th>
						<th><?php echo $this->Paginator->sort('sede');?></th>
						<th><?php echo $this->Paginator->sort('descripcion');?></th>
						<th>Ver</th>
						<th>Editar</th>
						<th>Eliminar</th>
						
					</tr>
				</thead>
					<!-- Recorremos el array con los datos de cada grupo -->
				<?php foreach ($grupos as $grupo): ?>

					<tr>
						
						<th> <?php echo $grupo['Grupo']['nombre']; ?> </th>
						<td> <?php echo $grupo['Grupo']['sede']; ?> </td>
						<td> <?php echo $grupo['Grupo']['descripcion']; ?> </td>
						<td> <?php echo $this->Html->link('', array('controller' => 'grupos', 'action'=>'ver', $grupo['Grupo']['id']), array('class'=>"btn btn-primary glyphicon glyphicon-eye-open")); ?> </td>
						<td> <?php echo $this->Html->link('', array('controller' => 'grupos', 'action'=>'editar', $grupo['Grupo']['id']), array('class'=>"btn btn-info glyphicon glyphicon-pencil")); ?> </td>
						<td> <?php echo $this->Form->postlink('', array('action'=>'eliminar', $grupo['Grupo']['id']), array('class'=>"btn btn-danger glyphicon glyphicon-trash",'confirm'=> '¿Estás seguro de que quieres eliminar el Grupo '.$grupo['Grupo']['nombre'].'?')); ?> </td>
						
					</tr>	

				<?php endforeach ?>

			</table>
		</div> <!-- *** Fin del Cuerpo del Panel *** -->

		<div class="panel-footer"> <!-- *** Pie del Panel *** -->

			 <?php 
				// Shows the next and previous links
				echo $this->Paginator->prev(
				  '« Anterior    ',
				  null,
				  null,
				  array('class' => 'disabled')
				);

				// Shows the page numbers
				echo $this->Paginator->numbers();

				// Shows the next and previous links
				echo $this->Paginator->next(
				  '    Siguiente »   ',
				  null,
				  null,
				  array('class' => 'disabled')
				);

				// prints X of Y, where X is current page and Y is number of pages
				echo "&nbsp &nbsp &nbsp &nbsp &nbsp       ";
				echo $this->Paginator->counter();
			  ?>
			
		</div> <!-- *** Pie del Panel *** -->
	</div>	<!-- *** FIN Panel *** -->
		<?php echo $this->Paginator->counter(
		    'Página {:page} de {:pages}, mostrando {:current} de un total de
		     {:count} resultados, comenzando en el elemento {:start}, y terminando en el {:end}.');
		 ?>

</div> <!-- *** FIN Contenedor principal *** -->

