<div class="workOrders view">
<h2><?php echo __('Work Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($workOrder['WorkOrder']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workOrder['User']['name'], array('controller' => 'users', 'action' => 'view', $workOrder['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provision Bus'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workOrder['ProvisionBus']['id'], array('controller' => 'provision_buses', 'action' => 'view', $workOrder['ProvisionBus']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Process State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workOrder['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $workOrder['ProcessState']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($workOrder['WorkOrder']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($workOrder['WorkOrder']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($workOrder['WorkOrder']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($workOrder['WorkOrder']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($workOrder['WorkOrder']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($workOrder['WorkOrder']['created_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Work Order'), array('action' => 'edit', $workOrder['WorkOrder']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Work Order'), array('action' => 'delete', $workOrder['WorkOrder']['id']), array(), __('Are you sure you want to delete # %s?', $workOrder['WorkOrder']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Order'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Provision Buses'), array('controller' => 'provision_buses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Provision Bus'), array('controller' => 'provision_buses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Process States'), array('controller' => 'process_states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Process State'), array('controller' => 'process_states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Order Approvals'), array('controller' => 'work_order_approvals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Order Approval'), array('controller' => 'work_order_approvals', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Work Order Approvals'); ?></h3>
	<?php if (!empty($workOrder['WorkOrderApproval'])): ?>
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
	<?php foreach ($workOrder['WorkOrderApproval'] as $workOrderApproval): ?>
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
