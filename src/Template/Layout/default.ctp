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

$cakeDescription = 'CakePHP: Users Login features with basic bootstrap';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

   <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
              <?php //adding condition for if logged in then show only logout link -fb
				if($loggedIn): ?>
			   		<li><a href=""><?= $loggedIn['User']['name'] ?></li>
				   <!--Adding HTML logout link method on top right corner its navegetion - fb-->
					<li><?= $this->Html->link('Logout', ['controller' => 'users', 'action' => 'logout']);?></li>
              <?php else : ?> 
                <!--Adding HTML Register link method on top right corner its navegetion - fb-->
                <li><?= $this->Html->link('Register', ['controller' => 'users', 'action' => 'register']);?></li>
              <?php endif ; ?> 
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    
	   
    <div class="container  clearfix">
    <?php if($loggedIn){ 
		$isuserAuth = 'false';
	 	if(!empty($user->id)){ //cheaking if user is a authorize user who can edit proflie or not
			 $current_user_id = $loggedIn['User']['id'];
			 $view_user_id =  h($user->id);
					if($current_user_id == $view_user_id){
						$isuserAuth = 'true';
					}
						  }
		echo $this->element('sidebar/side_menu_logged',['isuserAuth' => $isuserAuth]);
	 }else{ 
   	 	echo $this->element('sidebar/side_menu_logout');
   	 } ?>	
    <!-- Getting logged side menus from elements-->
    
    
    <?= $this->fetch('content') ?>
    
    </div>
    <footer>
    </footer>
</body>
</html>
