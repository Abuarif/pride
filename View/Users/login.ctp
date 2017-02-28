 <?php 
 
 /*
 * We set a variable depending on whether the user is authenticated or not.
 * This allows us to show the user a login link or a logout link depending
 * on the authentication state.
 */
?>

<div class="round-boxes" style="height:200px; width:50%; min-width:400px; margin-left:auto; margin-right:auto;">
	<div class="home-event-container" >

<?php if (!$this->Session->check('Auth.User.id')) { ?>

	<h2 class="blue">Login Access</h2>
	    
		
		<?php echo $this->Form->create('User', array(
						'url' => array('plugin'=>'users','controller' => 'users', 'action' => 'login'),
						'class' => 'login-form'
						));?>
		<div class="box">
			<div class="box-content">
			<?php
				$this->Form->inputDefaults(array(
					'label' => false,
				));
				echo $this->Form->input('username', array(
					'placeholder' => __d('croogo', 'Username'),
				//	'div' => 'input-prepend text',
					'class' => 'input-block-level',
				));
				echo $this->Form->input('password', array(
					'placeholder' => 'Password',
				//	'div' => 'input-prepend password',
					'class' => 'input-block-level',
				));
				if (Configure::read('Access Control.autoLoginDuration')):
					echo $this->Form->input('remember', array(
						'label' => __d('croogo', 'Remember me?'),
						'type' => 'checkbox',
						'default' => false,
					));
				endif;
			?>
			<div style="vertical-align: middle; line-height: 2em; ">
			<?php
				echo $this->Form->button(__d('croogo', $this->Html->image('/uploads/login.png',array('height'=>'30','width'=>'100'))), array('style' => 'float:left'));
				echo $this->Html->link(__d('croogo', 'Forgot password?'), array( 'admin' => false, 'plugin'=> 'users', 'controller' => 'users', 'action' => 'forgot',), array( 'class' => 'forgot', 'style' => 'float: right;vertical-align:middle;'));
			?>
			</div>
			</div>
		</div>
		<?php echo $this->Form->end(); ?>

<?php } ?>
		</div>
</div>

