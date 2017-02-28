<div class="campaignOrderApprovals view">
<h2><?php echo __('Campaign Order Approval'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($campaignOrderApproval['CampaignOrderApproval']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Campaign Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignOrderApproval['CampaignOrder']['id'], array('controller' => 'campaign_orders', 'action' => 'view', $campaignOrderApproval['CampaignOrder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignOrderApproval['User']['name'], array('controller' => 'users', 'action' => 'view', $campaignOrderApproval['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Process State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignOrderApproval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $campaignOrderApproval['ProcessState']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approval Level'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignOrderApproval['ApprovalLevel']['name'], array('controller' => 'approval_levels', 'action' => 'view', $campaignOrderApproval['ApprovalLevel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($campaignOrderApproval['CampaignOrderApproval']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($campaignOrderApproval['CampaignOrderApproval']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($campaignOrderApproval['CampaignOrderApproval']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($campaignOrderApproval['CampaignOrderApproval']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Campaign Order Approval'), array('action' => 'edit', $campaignOrderApproval['CampaignOrderApproval']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Campaign Order Approval'), array('action' => 'delete', $campaignOrderApproval['CampaignOrderApproval']['id']), array(), __('Are you sure you want to delete # %s?', $campaignOrderApproval['CampaignOrderApproval']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaign Order Approvals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign Order Approval'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaign Orders'), array('controller' => 'campaign_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign Order'), array('controller' => 'campaign_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Process States'), array('controller' => 'process_states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Process State'), array('controller' => 'process_states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Approval Levels'), array('controller' => 'approval_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Approval Level'), array('controller' => 'approval_levels', 'action' => 'add')); ?> </li>
	</ul>
</div>
