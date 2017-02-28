<div class="processStates view">
<h2><?php echo __('Process State'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($processState['ProcessState']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($processState['ProcessState']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($processState['ProcessState']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($processState['ProcessState']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($processState['ProcessState']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($processState['ProcessState']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($processState['ProcessState']['created_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Process State'), array('action' => 'edit', $processState['ProcessState']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Process State'), array('action' => 'delete', $processState['ProcessState']['id']), array(), __('Are you sure you want to delete # %s?', $processState['ProcessState']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Process States'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Process State'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Approvals'), array('controller' => 'approvals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Approval'), array('controller' => 'approvals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaign Order Approvals'), array('controller' => 'campaign_order_approvals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign Order Approval'), array('controller' => 'campaign_order_approvals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organization Approvals'), array('controller' => 'organization_approvals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization Approval'), array('controller' => 'organization_approvals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Order Approvals'), array('controller' => 'work_order_approvals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Order Approval'), array('controller' => 'work_order_approvals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Orders'), array('controller' => 'work_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Order'), array('controller' => 'work_orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Approvals'); ?></h3>
	<?php if (!empty($processState['Approval'])): ?>
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
	<?php foreach ($processState['Approval'] as $approval): ?>
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
	<?php if (!empty($processState['CampaignOrderApproval'])): ?>
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
	<?php foreach ($processState['CampaignOrderApproval'] as $campaignOrderApproval): ?>
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
<div class="related">
	<h3><?php echo __('Related Organization Approvals'); ?></h3>
	<?php if (!empty($processState['OrganizationApproval'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Organization Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Process State Id'); ?></th>
		<th><?php echo __('Approval Level Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Comments'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($processState['OrganizationApproval'] as $organizationApproval): ?>
		<tr>
			<td><?php echo $organizationApproval['id']; ?></td>
			<td><?php echo $organizationApproval['organization_id']; ?></td>
			<td><?php echo $organizationApproval['user_id']; ?></td>
			<td><?php echo $organizationApproval['process_state_id']; ?></td>
			<td><?php echo $organizationApproval['approval_level_id']; ?></td>
			<td><?php echo $organizationApproval['name']; ?></td>
			<td><?php echo $organizationApproval['comments']; ?></td>
			<td><?php echo $organizationApproval['updated']; ?></td>
			<td><?php echo $organizationApproval['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'organization_approvals', 'action' => 'view', $organizationApproval['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'organization_approvals', 'action' => 'edit', $organizationApproval['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'organization_approvals', 'action' => 'delete', $organizationApproval['id']), array(), __('Are you sure you want to delete # %s?', $organizationApproval['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Organization Approval'), array('controller' => 'organization_approvals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Work Order Approvals'); ?></h3>
	<?php if (!empty($processState['WorkOrderApproval'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Work Order Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Process State Id'); ?></th>
		<th><?php echo __('Approval Level Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Comments'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($processState['WorkOrderApproval'] as $workOrderApproval): ?>
		<tr>
			<td><?php echo $workOrderApproval['id']; ?></td>
			<td><?php echo $workOrderApproval['work_order_id']; ?></td>
			<td><?php echo $workOrderApproval['user_id']; ?></td>
			<td><?php echo $workOrderApproval['process_state_id']; ?></td>
			<td><?php echo $workOrderApproval['approval_level_id']; ?></td>
			<td><?php echo $workOrderApproval['name']; ?></td>
			<td><?php echo $workOrderApproval['comments']; ?></td>
			<td><?php echo $workOrderApproval['updated']; ?></td>
			<td><?php echo $workOrderApproval['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'work_order_approvals', 'action' => 'view', $workOrderApproval['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'work_order_approvals', 'action' => 'edit', $workOrderApproval['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'work_order_approvals', 'action' => 'delete', $workOrderApproval['id']), array(), __('Are you sure you want to delete # %s?', $workOrderApproval['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Work Order Approval'), array('controller' => 'work_order_approvals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Work Orders'); ?></h3>
	<?php if (!empty($processState['WorkOrder'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Provision Bus Id'); ?></th>
		<th><?php echo __('Process State Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Comments'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($processState['WorkOrder'] as $workOrder): ?>
		<tr>
			<td><?php echo $workOrder['id']; ?></td>
			<td><?php echo $workOrder['user_id']; ?></td>
			<td><?php echo $workOrder['provision_bus_id']; ?></td>
			<td><?php echo $workOrder['process_state_id']; ?></td>
			<td><?php echo $workOrder['name']; ?></td>
			<td><?php echo $workOrder['comments']; ?></td>
			<td><?php echo $workOrder['updated']; ?></td>
			<td><?php echo $workOrder['updated_by']; ?></td>
			<td><?php echo $workOrder['created']; ?></td>
			<td><?php echo $workOrder['created_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'work_orders', 'action' => 'view', $workOrder['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'work_orders', 'action' => 'edit', $workOrder['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'work_orders', 'action' => 'delete', $workOrder['id']), array(), __('Are you sure you want to delete # %s?', $workOrder['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Work Order'), array('controller' => 'work_orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
