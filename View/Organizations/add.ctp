
<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Organizations');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Organizations'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['Organization']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Organizations: ' . $this->data['Organization']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('Organization', array('type' => 'file'));

?>
<div>
	<p> Please fill in the following section in Step 1 and Step 2. </p>
</div>
<div class="organizations row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Step 1: Company Profile'), '#organization');
			echo $this->Croogo->adminTab(__d('croogo', 'Step 2: Contact Person'), '#contactperson');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='organization' class="tab-pane active"	>
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('name', array(
					'label' => 'Company Name',
				));
				echo $this->Form->input('roc', array(
					'label' => 'Company Registration Number',
				));
				echo $this->Form->input('address', array(
					'label' => 'Full Address',
				));
				echo $this->Form->input('postcode', array(
					'label' => 'Postcode',
				));
				echo $this->Form->input('file', array(
					'label' => 'Attachment',
					'type' => 'file', 
				));
				echo $this->Form->input('website', array(
					'label' => 'Website',
				));
				
			?>
			</div>
			<div id='contactperson' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('contact_person', array(
					'label' => 'Contact Person',
				));
				echo $this->Form->input('username', array(
					'label' => 'Username',
				));
				echo $this->Form->input('password', array(
					'label' => 'Password',
				));
				echo $this->Form->input('contact_email', array(
					'label' => 'Contact Email',
				));
				echo $this->Form->input('contact_number', array(
					'label' => 'Contact Number',
				));
			?>
			</div>
			<?php echo $this->Croogo->adminTabs(); ?>
		</div>

	</div>

	<div class="span4">
	<?php
		echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
			//$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply')) .
			$this->Form->button(__d('croogo', 'Submit'), array('class' => 'btn btn-primary')) .'&nbsp; '.
			$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('class' => 'btn btn-danger')) .
			$this->Html->endBox();
		?>
	</div>

</div>
<?php echo $this->Form->end(); ?>
