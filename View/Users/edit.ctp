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
			echo $this->Croogo->adminTab(__d('croogo', 'User'), '#user');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='user' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('organization_id', array(
					'label' => 'Organization Id',
				));
				echo $this->Form->input('depot_id', array(
					'label' => 'Depot Id',
				));
				echo $this->Form->input('role_id', array(
					'label' => 'Role Id',
				));
				echo $this->Form->input('username', array(
					'label' => 'Username',
				));
				echo $this->Form->input('password', array(
					'label' => 'Password',
				));
				echo $this->Form->input('name', array(
					'label' => 'Name',
				));
				echo $this->Form->input('email', array(
					'label' => 'Email',
				));
				echo $this->Form->input('website', array(
					'label' => 'Website',
				));
				echo $this->Form->input('activation_key', array(
					'label' => 'Activation Key',
				));
				echo $this->Form->input('image', array(
					'label' => 'Image',
				));
				echo $this->Form->input('bio', array(
					'label' => 'Bio',
				));
				echo $this->Form->input('timezone', array(
					'label' => 'Timezone',
				));
				echo $this->Form->input('status', array(
					'label' => 'Status',
				));
				echo $this->Form->input('updated_by', array(
					'label' => 'Updated By',
				));
				echo $this->Form->input('created_by', array(
					'label' => 'Created By',
				));
				echo $this->Form->input('twitter', array(
					'label' => 'Twitter',
				));
				echo $this->Form->input('facebook', array(
					'label' => 'Facebook',
				));
				echo $this->Form->input('google_plus', array(
					'label' => 'Google Plus',
				));
				echo $this->Form->input('linkedin', array(
					'label' => 'Linkedin',
				));
				echo $this->Form->input('skills', array(
					'label' => 'Skills',
				));
				echo $this->Form->input('generally_about', array(
					'label' => 'Generally About',
				));
				echo $this->Form->input('my_favourite_tags', array(
					'label' => 'My Favourite Tags',
				));
				echo $this->Form->input('kms_writing', array(
					'label' => 'Kms Writing',
				));
				echo $this->Form->input('kms_reading', array(
					'label' => 'Kms Reading',
				));
				echo $this->Form->input('kms_editing', array(
					'label' => 'Kms Editing',
				));
				echo $this->Form->input('kms_traveling', array(
					'label' => 'Kms Traveling',
				));
				echo $this->Form->input('kms_others', array(
					'label' => 'Kms Others',
				));
				echo $this->Form->input('allow_contact', array(
					'label' => 'Allow Contact',
				));
			?>
			</div>
			<?php echo $this->Croogo->adminTabs(); ?>
		</div>

	</div>

	<div class="span4">
	<?php
		echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
			$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply')) .
			$this->Form->button(__d('croogo', 'Save'), array('class' => 'btn btn-primary')) .
			$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('class' => 'btn btn-danger')) .
			$this->Html->endBox();
		?>
	</div>

</div>
<?php echo $this->Form->end(); ?>
