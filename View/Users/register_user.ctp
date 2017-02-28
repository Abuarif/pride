<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Users');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Users'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['User']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Users: ' . $this->data['User']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('User');

?>
<div class="users row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Register Contact'), '#user');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='user' class="tab-pane active">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('name', array(
					'label' => 'Contact Name',
				));
				echo $this->Form->input('email', array(
					'label' => 'Contact Email',
				));
				echo $this->Form->input('username', array(
					'label' => 'Username',
				));
				echo $this->Form->input('password', array(
					'label' => 'Password',
				));
				
			?>
			</div>
			<?php echo $this->Croogo->adminTabs(); ?>
		</div>

	</div>

	<div class="span4">
	<?php
		echo $this->Form->button(__d('croogo', 'Confirm'), array('class' => 'btn btn-primary')) . '&nbsp;'.
			$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('class' => 'btn btn-danger')) ;
		?>
	</div>

</div>
<?php echo $this->Form->end(); ?>
