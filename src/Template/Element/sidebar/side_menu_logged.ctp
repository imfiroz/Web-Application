<?php
/**
*when user logged its side menus
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('New Users'), ['controller' => 'users','action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('Add Roles'), ['controller' => 'roles','action' => 'add']) ?></li>
		<li role="separator" class="divider"></li>
		<li class="heading"><?= __('My Account') ?></li>
		<li><?= $this->Html->link(__('Change password'), ['controller' => 'user', 'action' => 'change-password']) ?></li>
		<?php if( $this->view == 'view' AND $isuserAuth == 'true'){ ?>
		<li><?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Profile'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <?php } ?>
		<li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?></li>
		<li role="separator" class="divider"></li>
		<li class="heading"><?= __('Admin') ?></li>
		<li><?= $this->Html->link(__('Users'), ['controller' => 'users','action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('Roles'), ['controller' => 'roles','action' => 'index']) ?></li>
	</ul>
</nav>

