<!--Created Register Template Page-->
<!-- its using CSS framework-->

<div class="users form large-9 medium-8 columns content">
		  	<?= $this->Form->create($user); //passing user variable ?> 
			  <fieldset>
				<legend><?= __('Please Register') ?></legend>
				<div class="form-group">
			  	  <div class="col-lg-10">
				  <?= $this->Form->control('name', ['class' => 'form-control', 'id' => 'inputEmail', 'placeholder' => 'Enter Name', 'required'])?>
				  </div>
				</div>
			  	<div class="form-group">
			  	  <div class="col-lg-10">
				  	<?= $this->Form->input('email', array('type' => 'email', 'class' => 'form-control', 'id' => 'inputEmail', 'placeholder' => 'Enter Email', 'required')); ?>
				  </div>
				</div>
				<div class="form-group">
				  <div class="col-lg-10">
				  	<?= $this->Form->input('password', array('type' => 'password','class' => 'form-control', 'id' => 'inputPassword', 'placeholder' => 'Enter Password')); ?>
				  </div>
				</div>
				<div class="form-group">
				  <div class="col-lg-10">
				  	<?= $this->Form->input('address', array('class' => 'form-control', 'id' => 'textarea', 'rows' => '3')); ?>
				  </div>
				</div>
				<div class="form-group">
				  <div class="col-lg-10">
					<?= $this->Form->button('Register',array('class' => 'btn btn-primary'));?>
				  </div>
				</div>
			  </fieldset>
			<?= $this->Form->end();?>
</div>


