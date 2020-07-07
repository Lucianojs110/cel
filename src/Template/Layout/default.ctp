<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Orbis Logistics: Control de Equipo Laredo';
?>
<!DOCTYPE html>

<style>
body {
  
}
</style>
<html>

<head>


    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['bootstrap.min.css']) ?>
    <?php echo $this->Html->css('style'); ?>
    <?= $this->Html->css(['jquery.datetimepicker.min.css']) ?>
    <?= $this->Html->css(['fontawesome.min.css']) ?>
    <?= $this->Html->css(['jquery-ui.min.css']) ?>
    <?= $this->Html->css(['//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css']) ?>
    <?= $this->Html->script(['jquery-3.4.1.min', 'bootstrap.min.js']) ?>
    <?= $this->Html->script(['jquery-ui.min.js']) ?>
    <?= $this->Html->script('jquery.datetimepicker.full.min.js') ?>
    
    <?= $this->Html->script(['//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js']) ?>

   
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
  
   
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


</head>
<body class=" align-items-center" style="height:100v;" >

<?php
  if($current_user!=null){
    echo $this->element('menu');
  
  };
     
?>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <!-- Footer -->

</footer>
<!-- Footer -->
</body>
</html>
