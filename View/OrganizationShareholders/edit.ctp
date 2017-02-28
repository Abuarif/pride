<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Organization Shareholders');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Organization Shareholders'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['OrganizationShareholder']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Organization Shareholders: ' . $this->data['OrganizationShareholder']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('OrganizationShareholder');

?>
<div class="organizationShareholders row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Organization Shareholder'), '#organization-shareholder');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='organization-shareholder' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('organization_id', array(
					'label' => 'Organization Id',
				));
				echo $this->Form->input('name', array(
					'label' => 'Name',
				));
				echo $this->Form->input('nric', array(
					'label' => 'Nric',
				));
				echo $this->Form->input('is_director', array(
					'label' => 'Is Director',
				));
				echo $this->Form->input('is_shareholder', array(
					'label' => 'Is Shareholder',
				));
				echo $this->Form->input('is_active_personal', array(
					'label' => 'Is Active Personal',
				));
				echo $this->Form->input('shareholding', array(
					'label' => 'Shareholding',
				));
				echo $this->Form->input('percentage', array(
					'label' => 'Percentage',
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
