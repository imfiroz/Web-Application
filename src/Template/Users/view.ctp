<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users view large-9 medium-8 columns content">
   <div class="container">
	  <div class="row">
       <div class="col-md-8 ">
		  <div class="panel panel-default">
  			<div class="panel-heading"><h4 ><?= __('User Profile') ?></h4></div>
			   <div class="panel-body">
				<div class="box box-info">
            <div class="box-body">
                    <div class="col-sm-6">
					<div  align="center"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 

					<input id="profile-image-upload" class="hidden" type="file">
					<div style="color:#999;" >click here to change profile image</div>
					<!--Upload Image Js And Css-->
					</div>
					<br>
					<!-- /input-group -->
					</div>
					<div class="col-sm-6">
						<h4 style="color:#00b1b1;"><?= h($user->name) ?></h4></span>
						  <span><p>Aspirant</p></span>            
					</div>
            		<div class="clearfix"></div>
            		<hr style="margin:5px 0 5px 0;">
					<div class="col-sm-5 col-xs-6 tital " ><?= __('Id:')?></div><div class="col-sm-7 col-xs-6 "><?= h($user->id) ?></div>
						 <div class="clearfix"></div>
					<div class="bot-border"></div>

					<div class="col-sm-5 col-xs-6 tital " ><?= __('Email:')?></div><div class="col-sm-7"> <?= h($user->email) ?></div>
					  <div class="clearfix"></div>
					<div class="bot-border"></div>
					
					<div class="col-sm-5 col-xs-6 tital " ><?= __('Address:')?></div><div class="col-sm-7"> <?= h($user->address) ?></div>
					  <div class="clearfix"></div>
					<div class="bot-border"></div>

					<div class="col-sm-5 col-xs-6 tital " ><?= __('Password:')?></div><div class="col-sm-7"> <?= h($user->password)?></div>
					  <div class="clearfix"></div>
					<div class="bot-border"></div>

					<div class="col-sm-5 col-xs-6 tital " ><?= __('Created:')?></div><div class="col-sm-7"><?= h($user->created) ?></div>

					<div class="clearfix"></div>
					<div class="bot-border"></div>

					<div class="col-sm-5 col-xs-6 tital " ><?= __('Modified:')?></div><div class="col-sm-7"><?= h($user->modified) ?></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
   </div>  
  </div> 
</div>	
</div>  
    <script>
              $(function() {
    $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
    });
});       
    </script> 
   </div>
</div>
   
    <div class="related">
        <h4><?= __('Related Posts') ?></h4>
        <?php if (!empty($user->posts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Body') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->posts as $posts): ?>
            <tr>
                <td><?= h($posts->id) ?></td>
                <td><?= h($posts->title) ?></td>
                <td><?= h($posts->body) ?></td>
                <td><?= h($posts->user_id) ?></td>
                <td><?= h($posts->created) ?></td>
                <td><?= h($posts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->id]) ?>
                    <?php if(h($posts->user_id) == $loggedIn['User']['id']) {?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id)]) ?>
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    
</div>



