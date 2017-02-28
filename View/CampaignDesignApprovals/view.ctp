<div class="campaignDesignApprovals view">
<h2><?php echo __('Campaign Design Approval'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($campaignDesignApproval['CampaignDesignApproval']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Campaign Design'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignDesignApproval['CampaignDesign']['name'], array('controller' => 'campaign_designs', 'action' => 'view', $campaignDesignApproval['CampaignDesign']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignDesignApproval['User']['name'], array('controller' => 'users', 'action' => 'view', $campaignDesignApproval['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Process State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignDesignApproval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $campaignDesignApproval['ProcessState']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approval Level'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignDesignApproval['ApprovalLevel']['name'], array('controller' => 'approval_levels', 'action' => 'view', $campaignDesignApproval['ApprovalLevel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($campaignDesignApproval['CampaignDesignApproval']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($campaignDesignApproval['CampaignDesignApproval']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($campaignDesignApproval['CampaignDesignApproval']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($campaignDesignApproval['CampaignDesignApproval']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Campaign Design Approval'), array('action' => 'edit', $campaignDesignApproval['CampaignDesignApproval']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Campaign Design Approval'), array('action' => 'delete', $campaignDesignApproval['CampaignDesignApproval']['id']), array(), __('Are you sure you want to delete # %s?', $campaignDesignApproval['CampaignDesignApproval']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaign Design Approvals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign Design Approval'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaign Designs'), array('controller' => 'campaign_designs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign Design'), array('controller' => 'campaign_designs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Process States'), array('controller' => 'process_states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Process State'), array('controller' => 'process_states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Approval Levels'), array('controller' => 'approval_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Approval Level'), array('controller' => 'approval_levels', 'action' => 'add')); ?> </li>
	</ul>
</div>
