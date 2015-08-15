<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
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

		echo $this->Html->css(array( 'timeline', 'jquery-ui.min', 'jquery-ui.structure.min', 'jquery-ui.theme.min','bootstrap', 'bootstrap.min','bootstrap-theme','docs.min','font-awesome.min','mis-estilos'));
		echo $this->Html->script(array('jquery-1.11.3', 'jquery.min','bootstrap.min','docs.min', 'jquery-ui.min', 'search', 'persiana'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body role="document">


	<div class="header-contenedor" >

	<?php echo $this->element('menu'); ?>
 

 <div class="container theme-showcase" role="main">

			

			<?php //Ubica el contenido que nosotros generamos dentro del layout
				
				echo $this->fetch('content'); ?>

	<div id="footer">
		<?php echo $this->Html->link(
				$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
				'http://www.cakephp.org/',
				array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
			);
		?>
		<p>
			<?php echo $cakeVersion; ?>
		</p>
	</div>
		<?php echo $this->element('sql_dump'); ?>
 </div>
</div>
<script type="text/javascript">
	
	var basePath = "<?php echo Router::url('/'); ?>"
</script>

</body>
</html>
