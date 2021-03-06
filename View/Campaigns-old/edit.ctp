<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Campaigns');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Campaigns'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['Campaign']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Campaigns: ' . $this->data['Campaign']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('Campaign');

?>
<div class="campaigns row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Campaign'), '#campaign');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='campaign' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('organization_id', array(
					'label' => 'Organization Id',
				));
				echo $this->Form->input('name', array(
					'label' => 'Name',
				));
				echo $this->Form->input('start_date', array(
					'label' => 'Start Date',
				));
				echo $this->Form->input('end_date', array(
					'label' => 'End Date',
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
