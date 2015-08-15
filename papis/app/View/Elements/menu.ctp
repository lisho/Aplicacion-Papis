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
            <?php echo $this->Html->link('Inclusión Social', array('controller'=>'users', 'action'=>'login'), array('class'=>'navbar-brand')) ?>
          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
           <!-- <li class="active"><a href="#">Home</a></li> -->
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Grupos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">Gestion de Grupos</li>
                <li><?php echo $this->Html->link('Acceder a los Grupos', array('controller'=>'grupos', 'action'=>'index')) ?></li>
                <li><?php echo $this->Html->link('Crear nuevo Grupo', array('controller'=>'grupos', 'action'=>'nuevo')) ?></li>
                <li><?php echo $this->Html->link('Gestionar Grupos', array('controller'=>'grupos', 'action'=>'listado')) ?></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Gestion de Horarios:</li>
                <li><?php echo $this->Html->link('Ver Horario Global', array('controller'=>'sesioneshorarios', 'action'=>'index')) ?></li>
                <li><?php echo $this->Html->link('Crear Horario', array('controller'=>'nombrehorarios', 'action'=>'nuevo')) ?></li>
                <li><?php echo $this->Html->link('Ver lista de Horarios', array('controller'=>'nombrehorarios', 'action'=>'index')) ?></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Gestion de sesiones:</li>
                <li><?php echo $this->Html->link('Crear evento/sesion', array('controller'=>'eventos', 'action'=>'add')) ?></li>
                <li><?php echo $this->Html->link('Listado global de eventos/sesiones', array('controller'=>'eventos', 'action'=>'index')) ?></li>
                <li><?php echo $this->Html->link('Generar un tipo de eventos', array('controller'=>'tipoeventos', 'action'=>'add')) ?></li>
              </ul>
            </li>


            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Alumnos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">Gestión de Participantes</li>
                 <li><?php echo $this->Html->link('Crear nuevo Alumno', array('controller'=>'alumnos', 'action'=>'nuevo')) ?></li>
                 <li><?php echo $this->Html->link('Todos los alumnos', array('controller'=>'alumnos', 'action'=>'index')) ?></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Gestión de Asistencias</li>
                <li><?php echo $this->Html->link('Listado de asistencias', array('controller'=>'asistencias', 'action'=>'index')) ?></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Alministración de Usuarios <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header"><?php echo "<p class='glyphicon glyphicon-user'> <strong> ".$current_user['nombre_user']."</strong></p>"; ?></li>
                <li><?php echo $this->Html->link('Salir', array('controller'=>'users', 'action'=>'logout')) ?></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header"><?php echo "Administrar Usuarios del Sistema"; ?></li>
                <li><?php echo $this->Html->link('Todos los Usuarios', array('controller'=>'users', 'action'=>'index')) ?></li>
                <li><?php echo $this->Html->link('Crear nuevo Usuario', array('controller'=>'users', 'action'=>'nuevo')) ?></li>
                
               
              </ul>
            </li>
         </ul>
     
      
<!-- Buscador de alumnos -->

     <?php echo $this->Form->create('Alumno',array(
                                            'type' => 'GET',
                                            'class' => 'navbar-form navbar-left',
                                            'url' => array(
                                                          'controller'=>'Alumnos',
                                                          'action'=>'search',
                                                          )
                                              )); ?> 

      <div class="form-group">
        
          <?php echo $this->Form->input('search', array(
                                                      'label'=>false,
                                                      'div'=>false,
                                                      'id'=> 's',
                                                      'class' =>'form-control',
                                                      'autocomplete' => 'off',
                                                      'placeholder' => 'Buscar participante...')); ?>

          <?php echo $this->Form->button('Buscar', array(
                                                      'div'=> false,
                                                      'class'=> 'btn btn-primary')); ?>


      </div>

          <?php echo  $this->Form->end(); ?>


<!-- FIN - Buscador de alumnos -->


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

    </div><!--/.nav-collapse -->

  </div>
</nav> 