<div class="campaignDesignApprovals index">
	<h2><?php echo __('Campaign Design Approvals'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('campaign_design_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('process_state_id'); ?></th>
			<th><?php echo $this->Paginator->sort('approval_level_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('comments'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($campaignDesignApprovals as $campaignDesignApproval): ?>
	<tr>
		<td><?php echo h($campaignDesignApproval['CampaignDesignApproval']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($campaignDesignApproval['CampaignDesign']['name'], array('controller' => 'campaign_designs', 'action' => 'view', $campaignDesignApproval['CampaignDesign']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($campaignDesignApproval['User']['name'], array('controller' => 'users', 'action' => 'view', $campaignDesignApproval['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($campaignDesignApproval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $campaignDesignApproval['ProcessState']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($campaignDesignApproval['ApprovalLevel']['name'], array('controller' => 'approval_levels', 'action' => 'view', $campaignDesignApproval['ApprovalLevel']['id'])); ?>
		</td>
		<td><?php echo h($campaignDesignApproval['CampaignDesignApproval']['name']); ?>&nbsp;</td>
		<td><?php echo h($campaignDesignApproval['CampaignDesignApproval']['comments']); ?>&nbsp;</td>
		<td><?php echo h($campaignDesignApproval['CampaignDesignApproval']['updated']); ?>&nbsp;</td>
		<td><?php echo h($campaignDesignApproval['CampaignDesignApproval']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $campaignDesignApproval['CampaignDesignApproval']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $campaignDesignApproval['CampaignDesignApproval']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $campaignDesignApproval['CampaignDesignApproval']['id']), array(), __('Are you sure you want to delete # %s?', $campaignDesignApproval['CampaignDesignApproval']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Campaign Design Approval'), array('action' => 'add')); ?></li>
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
