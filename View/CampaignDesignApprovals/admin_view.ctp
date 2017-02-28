<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Campaign Design Approvals'), h($campaignDesignApproval['CampaignDesignApproval']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Campaign Design Approvals'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Campaign Design Approval'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Campaign Design Approval'), array('action' => 'edit', $campaignDesignApproval['CampaignDesignApproval']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Campaign Design Approval'), array('action' => 'delete', $campaignDesignApproval['CampaignDesignApproval']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $campaignDesignApproval['CampaignDesignApproval']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Campaign Design Approvals'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Campaign Design Approval'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Campaign Designs'), array('controller' => 'campaign_designs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Campaign Design'), array('controller' => 'campaign_designs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Process States'), array('controller' => 'process_states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Process State'), array('controller' => 'process_states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Approval Levels'), array('controller' => 'approval_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Approval Level'), array('controller' => 'approval_levels', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="campaignDesignApprovals view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($campaignDesignApproval['CampaignDesignApproval']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Campaign Design'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignDesignApproval['CampaignDesign']['name'], array('controller' => 'campaign_designs', 'action' => 'view', $campaignDesignApproval['CampaignDesign']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignDesignApproval['User']['name'], array('controller' => 'users', 'action' => 'view', $campaignDesignApproval['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Process State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignDesignApproval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $campaignDesignApproval['ProcessState']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Approval Level'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignDesignApproval['ApprovalLevel']['name'], array('controller' => 'approval_levels', 'action' => 'view', $campaignDesignApproval['ApprovalLevel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($campaignDesignApproval['CampaignDesignApproval']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Comments'); ?></dt>
		<dd>
			<?php echo h($campaignDesignApproval['CampaignDesignApproval']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($campaignDesignApproval['CampaignDesignApproval']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($campaignDesignApproval['CampaignDesignApproval']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
