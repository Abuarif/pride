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

echo $this->Form->create('Organization');

?>
<div class="organizations row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Organization'), '#organization');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='organization' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('organization_type_id', array(
					'label' => 'Organization Type',
					//'value' => $organizationTypes
				));
				echo $this->Form->input('name', array(
					'label' => 'Name',
				));
				echo $this->Form->input('roc', array(
					'label' => 'Roc',
				));
				echo $this->Form->input('address', array(
					'label' => 'Address',
				));
				echo $this->Form->input('postcode', array(
					'label' => 'Postcode',
				));
				echo $this->Form->input('contact_person', array(
					'label' => 'Contact Person',
				));
				echo $this->Form->input('contact_email', array(
					'label' => 'Contact Email',
				));
				echo $this->Form->input('contact_number', array(
					'label' => 'Contact Number',
				));
				echo $this->Form->input('files', array(
					'label' => 'Files',
				));
				echo $this->Form->input('website', array(
					'label' => 'Website',
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
