<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Campaign Order Approvals'), h($campaignOrderApproval['CampaignOrderApproval']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Campaign Order Approvals'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Campaign Order Approval'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Campaign Order Approval'), array('action' => 'edit', $campaignOrderApproval['CampaignOrderApproval']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Campaign Order Approval'), array('action' => 'delete', $campaignOrderApproval['CampaignOrderApproval']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $campaignOrderApproval['CampaignOrderApproval']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Campaign Order Approvals'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Campaign Order Approval'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Campaign Orders'), array('controller' => 'campaign_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Campaign Order'), array('controller' => 'campaign_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Process States'), array('controller' => 'process_states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Process State'), array('controller' => 'process_states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Approval Levels'), array('controller' => 'approval_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Approval Level'), array('controller' => 'approval_levels', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="campaignOrderApprovals view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($campaignOrderApproval['CampaignOrderApproval']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Campaign Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignOrderApproval['CampaignOrder']['id'], array('controller' => 'campaign_orders', 'action' => 'view', $campaignOrderApproval['CampaignOrder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignOrderApproval['User']['name'], array('controller' => 'users', 'action' => 'view', $campaignOrderApproval['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Process State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignOrderApproval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $campaignOrderApproval['ProcessState']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Approval Level'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignOrderApproval['ApprovalLevel']['name'], array('controller' => 'approval_levels', 'action' => 'view', $campaignOrderApproval['ApprovalLevel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($campaignOrderApproval['CampaignOrderApproval']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Comments'); ?></dt>
		<dd>
			<?php echo h($campaignOrderApproval['CampaignOrderApproval']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($campaignOrderApproval['CampaignOrderApproval']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($campaignOrderApproval['CampaignOrderApproval']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
