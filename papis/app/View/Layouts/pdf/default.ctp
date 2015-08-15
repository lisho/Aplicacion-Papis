<?php 

/**
 * @copyright
 *
 * @var 
 */

 ?>


 <!DOCTYPE html>
 <html lang="es">
	<head>
	 	
	<?php echo $this->Html->charset(); ?>
		<title>
			<?php echo $cakeDescription ?>:
			<?php echo $this->fetch('title'); ?>
		</title>
		<?php
			echo $this->Html->meta('icon');

			echo $this->Html->css(array( 'timeline', 'jquery-ui.min', 'bootstrap', 'bootstrap.min','bootstrap-theme','docs.min','font-awesome.min','mis-estilos'));
			echo $this->Html->script(array('jquery-1.11.3', 'jquery.min','bootstrap.min','docs.min', 'jquery-ui.min', 'search', 'persiana'));

			

			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		?>

	</head>


	<body>
		
			<div class="content bs-docs-container">
				<?php
					//Ubica el contenido que nosotros generamos dentro del layout
					echo $this->fetch('content');	
				 ?> 
			</div>
		<footer>
			<hr>
		</footer>
	 </body>
 </html>