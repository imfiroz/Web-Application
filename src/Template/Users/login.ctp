<!--Created login Template Page-->
<!-- its using CSS framework-->
   	
    	<div class="users loggin large-4 medium-4 column content">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h2 class="panel-title"><?= __('Login') ?></h2>
			 	</div>
			  	<div class="panel-body">
			    	<?= $this->Form->create(); ?>
                    <fieldset>
			    	  	<div class="form-group">
		    		    	<?= $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'yourmail@example.com', 'label' => '')) ?>
			    		</div>
			    		<div class="form-group">
			    			<?= $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Password', 'label' => '', 'type' => 'password')) ?>
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
			    	    	</label>
			    	    </div>
			    	    <?= $this->Form->submit(__('Login'),array('class' => 'btn btn-lg btn-success btn-block'));?>
			    	    <center><?= $this->Html->link(__('Forgot password?'), ['controller' => 'users']) ?></center>
			    	</fieldset>
			      	<?= $this->Form->end();?>
                      <hr/>
                    <center><h4>OR</h4></center>
                    <input class="btn btn-lg btn-facebook btn-block" type="submit" value="Login via facebook">
			    </div>
			</div>
	</div>
