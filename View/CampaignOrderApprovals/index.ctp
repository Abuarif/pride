<div class="campaignOrderApprovals index">
	<h2><?php echo __('Campaign Order Approvals'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('campaign_order_id'); ?></th>
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
	<?php foreach ($campaignOrderApprovals as $campaignOrderApproval): ?>
	<tr>
		<td><?php echo h($campaignOrderApproval['CampaignOrderApproval']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($campaignOrderApproval['CampaignOrder']['id'], array('controller' => 'campaign_orders', 'action' => 'view', $campaignOrderApproval['CampaignOrder']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($campaignOrderApproval['User']['name'], array('controller' => 'users', 'action' => 'view', $campaignOrderApproval['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($campaignOrderApproval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $campaignOrderApproval['ProcessState']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($campaignOrderApproval['ApprovalLevel']['name'], array('controller' => 'approval_levels', 'action' => 'view', $campaignOrderApproval['ApprovalLevel']['id'])); ?>
		</td>
		<td><?php echo h($campaignOrderApproval['CampaignOrderApproval']['name']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrderApproval['CampaignOrderApproval']['comments']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrderApproval['CampaignOrderApproval']['updated']); ?>&nbsp;</td>
		<td><?php echo h($campaignOrderApproval['CampaignOrderApproval']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $campaignOrderApproval['CampaignOrderApproval']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $campaignOrderApproval['CampaignOrderApproval']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $campaignOrderApproval['CampaignOrderApproval']['id']), array(), __('Are you sure you want to delete # %s?', $campaignOrderApproval['CampaignOrderApproval']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Campaign Order Approval'), array('action' => 'add')); ?></li>
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
