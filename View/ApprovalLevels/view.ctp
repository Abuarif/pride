<div class="approvalLevels view">
<h2><?php echo __('Approval Level'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($approvalLevel['ApprovalLevel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($approvalLevel['ApprovalLevel']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Level Number'); ?></dt>
		<dd>
			<?php echo h($approvalLevel['ApprovalLevel']['level_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($approvalLevel['ApprovalLevel']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($approvalLevel['ApprovalLevel']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($approvalLevel['ApprovalLevel']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Approval Level'), array('action' => 'edit', $approvalLevel['ApprovalLevel']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Approval Level'), array('action' => 'delete', $approvalLevel['ApprovalLevel']['id']), array(), __('Are you sure you want to delete # %s?', $approvalLevel['ApprovalLevel']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Approval Levels'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Approval Level'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Approvals'), array('controller' => 'approvals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Approval'), array('controller' => 'approvals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaign Order Approvals'), array('controller' => 'campaign_order_approvals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign Order Approval'), array('controller' => 'campaign_order_approvals', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Approvals'); ?></h3>
	<?php if (!empty($approvalLevel['Approval'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Process State Id'); ?></th>
		<th><?php echo __('Approval Level Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Comments'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($approvalLevel['Approval'] as $approval): ?>
		<tr>
			<td><?php echo $approval['id']; ?></td>
			<td><?php echo $approval['user_id']; ?></td>
			<td><?php echo $approval['process_state_id']; ?></td>
			<td><?php echo $approval['approval_level_id']; ?></td>
			<td><?php echo $approval['name']; ?></td>
			<td><?php echo $approval['comments']; ?></td>
			<td><?php echo $approval['updated']; ?></td>
			<td><?php echo $approval['updated_by']; ?></td>
			<td><?php echo $approval['created']; ?></td>
			<td><?php echo $approval['created_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'approvals', 'action' => 'view', $approval['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'approvals', 'action' => 'edit', $approval['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'approvals', 'action' => 'delete', $approval['id']), array(), __('Are you sure you want to delete # %s?', $approval['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Approval'), array('controller' => 'approvals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Campaign Order Approvals'); ?></h3>
	<?php if (!empty($approvalLevel['CampaignOrderApproval'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Campaign Order Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Process State Id'); ?></th>
		<th><?php echo __('Approval Level Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Comments'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($approvalLevel['CampaignOrderApproval'] as $campaignOrderApproval): ?>
		<tr>
			<td><?php echo $campaignOrderApproval['id']; ?></td>
			<td><?php echo $campaignOrderApproval['campaign_order_id']; ?></td>
			<td><?php echo $campaignOrderApproval['user_id']; ?></td>
			<td><?php echo $campaignOrderApproval['process_state_id']; ?></td>
			<td><?php echo $campaignOrderApproval['approval_level_id']; ?></td>
			<td><?php echo $campaignOrderApproval['name']; ?></td>
			<td><?php echo $campaignOrderApproval['comments']; ?></td>
			<td><?php echo $campaignOrderApproval['updated']; ?></td>
			<td><?php echo $campaignOrderApproval['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'campaign_order_approvals', 'action' => 'view', $campaignOrderApproval['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'campaign_order_approvals', 'action' => 'edit', $campaignOrderApproval['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'campaign_order_approvals', 'action' => 'delete', $campaignOrderApproval['id']), array(), __('Are you sure you want to delete # %s?', $campaignOrderApproval['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Campaign Order Approval'), array('controller' => 'campaign_order_approvals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
