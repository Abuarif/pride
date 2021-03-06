<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Campaign Design Approvals');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Campaign Design Approvals'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['CampaignDesignApproval']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Campaign Design Approvals: ' . $this->data['CampaignDesignApproval']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('CampaignDesignApproval');

?>
<div class="campaignDesignApprovals row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Campaign Design Approval'), '#campaign-design-approval');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='campaign-design-approval' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('campaign_design_id', array(
					'label' => 'Campaign Design Id',
				));
				echo $this->Form->input('user_id', array(
					'label' => 'User Id',
				));
				echo $this->Form->input('process_state_id', array(
					'label' => 'Process State Id',
				));
				echo $this->Form->input('approval_level_id', array(
					'label' => 'Approval Level Id',
				));
				echo $this->Form->input('name', array(
					'label' => 'Name',
				));
				echo $this->Form->input('comments', array(
					'label' => 'Comments',
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
