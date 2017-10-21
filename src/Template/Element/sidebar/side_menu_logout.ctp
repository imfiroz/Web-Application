<?php
/*
*Custom side menus 
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link('Login', ['controller' => 'users', 'action' => 'login']);?></li>
        <li><?= $this->Html->link('Forgot Password', ['controller' => 'users', 'action' => 'Forgot-password']);?></li>
        <li><?= $this->Html->link('Register', ['controller' => 'users', 'action' => 'register']);?></li>
        <li><?= $this->Html->link('About Us', ['controller' => 'users', 'action' => 'about_us']);?></li>
        <li><?= $this->Html->link('Contact Us', ['controller' => 'users', 'action' => 'contect_us']);?></li>
    </ul>
</nav>