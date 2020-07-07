<nav class="navbar navbar-expand-lg navbar-light " style="background-color: white;">
<?php echo $this->Html->link($this->Html->image('orbis2.png', array('width' => '60px', 'height' => '40px')) ,'#today',array('escape' => false));?> 

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <li class="nav-item">
      <?= $this->Html->link('Home', ['controller' => 'users', 'action' => 'home'] , ['class' =>  'nav-link' ]) ?>
      </li>
      </li>
      <li class="nav-item">
      <?= $this->Html->link('General PO', ['controller' => 'general', 'action' => 'index'] , ['class' =>  'nav-link' ]) ?>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Colocaciones
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <?= $this->Html->link('Colocaciones', ['controller' => 'colocacion', 'action' => 'index'] , ['class' =>  'dropdown-item' ]) ?>
        <?= $this->Html->link('Estatus', ['controller' => 'Estatus', 'action' => 'index'] , ['class' =>  'dropdown-item' ]) ?>
        <?= $this->Html->link('Transfers', ['controller' => 'Transfers', 'action' => 'index'] , ['class' =>  'dropdown-item' ]) ?>
        <?= $this->Html->link('Lineas', ['controller' => 'Lineas', 'action' => 'index'] , ['class' =>  'dropdown-item' ]) ?>
        </div>
      <li class="nav-item">
      <?= $this->Html->link('Facturación', ['controller' => 'colocacion', 'action' => 'facturacion'] , ['class' =>  'nav-link' ]) ?>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Reportes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <?= $this->Html->link('Colocacion', ['controller' => 'colocacion', 'action' => 'reporte'] , ['class' =>  'dropdown-item' ]) ?>
        <?= $this->Html->link('Transportista', ['controller' => 'Colocacion', 'action' => 'reporteTransportista'] , ['class' =>  'dropdown-item' ]) ?>
        <?= $this->Html->link('Transfer', ['controller' =>'Colocacion', 'action' => 'reporteTransfer'] , ['class' =>  'dropdown-item' ]) ?>
        <?= $this->Html->link('Orbis', ['controller' =>'Colocacion', 'action' => 'reporteOrbis'] , ['class' =>  'dropdown-item' ]) ?>
        </div>
     
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Carta Porte
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <?= $this->Html->link('Carta Porte', ['controller' => 'Cartaporte', 'action' => 'index'] , ['class' =>  'dropdown-item' ]) ?>
        <?= $this->Html->link('Destinatarios', ['controller' => 'Destinatario', 'action' => 'index'] , ['class' =>  'dropdown-item' ]) ?>
        <?= $this->Html->link('Remitentes', ['controller' => 'Remitente', 'action' => 'index'] , ['class' =>  'dropdown-item' ]) ?>
        <?= $this->Html->link('Operadores', ['controller' => 'Operador', 'action' => 'index'] , ['class' =>  'dropdown-item' ]) ?>
        <?= $this->Html->link('Remolques', ['controller' => 'Remolque', 'action' => 'index'] , ['class' =>  'dropdown-item' ]) ?>
        </div>
        <li class="nav-item">
      <?= $this->Html->link('Usuarios', ['controller' => 'users', 'action' => 'index'] , ['class' =>  'nav-link' ]) ?>
      </li>
    </ul>
    <div class="navbar-nav">
    <i class="fas fa-user-circle" style="font-size:30px; color:#9C9999"></i>
    &nbsp
    
    <?php  echo "<span class='navbar-text' > " .$current_user['first_name']. "  </span>";?> 
     &nbsp
     &nbsp
     <?php echo $this->Html->link('Salir', ['controller' => 'users', 'action' => 'logout'] , ['class' =>  'btn btn-outline-dark'  ]); ?> 
 
    </div>
  </div>
</nav>
  </nav>
  <script src="https://kit.fontawesome.com/838f8159c2.js" crossorigin="anonymous"></script>