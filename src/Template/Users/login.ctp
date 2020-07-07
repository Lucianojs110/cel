<?= $this->Html->css('login') ?>



<style>

.btn {
  background-color: #76448A;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  border-radius: 0px
}

.btn:hover {
  cursor: pointer;
  background-color: #4A235A; 
}

.form-control {
  border: none;
  border-radius: 0px;
  background-color: #D7DBDD;
  font-size: 20px; 
  margin: 8px 0;
}

</style>


  

<div class="row justify-content-center align-items-center" style="height:100vh; max-width: 2000px; width: 100%;">
   
   
  
    <div Class="row">
     <div class="col-md-4"></div>
     
     <div Class="col-md-4">
     <div  Class="container-panel">
     <?= $this->Flash->render('auth') ?>
      <?= $this->Form->create() ?>
      <?php echo $this->Html->link($this->Html->image('orbis.png', array('width' => '100%', 'height' => '100%')) ,'#today',array('escape' => false));?>
      <br><br>
        <form class="form-signin">
              <div class="form-label-group">
			  <?= $this->Form->control('email', ['class' => 'form-control input-lg ', 'placeholder' => 'Email', 'label' => false, 'required']) ?>
              
              

              <div class="form-label-group">
			  <?= $this->Form->control('password', ['class' => 'form-control input-lg', 'placeholder' => 'Contraseña', 'label' => false, 'required']) ?>
			  
		
        </div>
					
			  <?= $this->Form->button('LOGIN', ['class' => 'btn btn-lg btn-primary btn-block ']) ?>
            </form>
          </div>
        </div>
        <div class="col-md-4"></div>
        </div>
    </div>
           
        </div>
    </div>



