<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Organization Units');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Organization Units'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['OrganizationUnit']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Organization Units: ' . $this->data['OrganizationUnit']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('OrganizationUnit');

?>
<div class="organizationUnits row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Organization Unit'), '#organization-unit');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='organization-unit' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('parent_id', array(
					'label' => 'Parent Id',
				));
				echo $this->Form->input('organization_id', array(
					'label' => 'Organization Id',
				));
				echo $this->Form->input('organization_unit_type_id', array(
					'label' => 'Organization Unit Type Id',
				));
				echo $this->Form->input('name', array(
					'label' => 'Name',
				));
				echo $this->Form->input('description', array(
					'label' => 'Description',
				));
				echo $this->Form->input('logo_url', array(
					'label' => 'Logo Url',
				));
				echo $this->Form->input('address', array(
					'label' => 'Address',
				));
				echo $this->Form->input('region', array(
					'label' => 'Region',
				));
				echo $this->Form->input('country', array(
					'label' => 'Country',
				));
				echo $this->Form->input('pincode', array(
					'label' => 'Pincode',
				));
				echo $this->Form->input('contact_phone_1', array(
					'label' => 'Contact Phone 1',
				));
				echo $this->Form->input('contact_email_1', array(
					'label' => 'Contact Email 1',
				));
				echo $this->Form->input('lft', array(
					'label' => 'Lft',
				));
				echo $this->Form->input('rght', array(
					'label' => 'Rght',
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
