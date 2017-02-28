<?php
$message = ClassRegistry::init('Contacts.Message');
$message->recursive = 1;
$conditions = array(
    'conditions' => array(
        'Message.status' => 0,
        'Contact.alias' => CakeSession::read('Auth.User.username'),
    )
);

$unread = $message->find('count', $conditions);

?>

<header class="header">
	<a href="<?php echo $this->webroot.'members'; ?>" class="logo" style="font-family: 'Source Sans Pro', sans-serif;">
		<!-- Add the class icon to your logo image or logo icon to add the margining -->
		PRIDE AMS
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<div class="navbar-right">
			<ul class="nav navbar-nav">
				<!-- Messages: style can be found in dropdown.less-->
				<li class="dropdown messages-menu">
					<!--<a href="/interact'" class="dropdown-toggle" data-toggle="dropdown"> -->
					<a href="<?php echo $this->webroot;?>contacts/messages/inbox">
						<i class="fa fa-envelope"></i>
						<?php if($unread != 0) {?>
							<span class="label label-success"><?php echo $unread; ?></span>
						<?php } ?>
					</a>
				</li>
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-user"></i>
						<span><?php echo $this->Session->read('Auth.User.name'); ?> <i class="caret"></i></span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header bg-light-blue">
							<?php if($this->Session->read('Auth.User.image') != '') { ?>
								<img src="<?php echo $this->webroot.'profiles/'.$this->Session->read('Auth.User.image'); ?>" class="img-circle" alt="User Image" />
							<?php } else {?>
								<img src="<?php echo $this->webroot.'uploads/empty.jpg'; ?>" class="img-circle" alt="User Image" />
							<?php } ?>
							
							<p>
								<?php echo $this->Session->read('Auth.User.name'); ?> - <?php echo $this->Session->read('Auth.User.Role.title'); ?>
								<small><?php echo $this->Session->read('Auth.User.Organization.name'); ?></small>
							</p>
						</li>
						<!-- Menu Body -->
						
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="<?php echo $this->webroot; ?>kms_user_extras/kms_user_extras/user_edit" class="btn btn-default btn-flat">Profile</a>
							</div>
							<div class="pull-right">
								<a href="<?php echo $this->webroot; ?>users/users/logout" class="btn btn-default btn-flat">Sign out</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>