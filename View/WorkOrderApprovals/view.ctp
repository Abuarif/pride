<div class="workOrderApprovals view">
<h2><?php echo __('Work Order Approval'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($workOrderApproval['WorkOrderApproval']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Work Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workOrderApproval['WorkOrder']['name'], array('controller' => 'work_orders', 'action' => 'view', $workOrderApproval['WorkOrder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workOrderApproval['User']['name'], array('controller' => 'users', 'action' => 'view', $workOrderApproval['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Process State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workOrderApproval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $workOrderApproval['ProcessState']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approval Level'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workOrderApproval['ApprovalLevel']['name'], array('controller' => 'approval_levels', 'action' => 'view', $workOrderApproval['ApprovalLevel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($workOrderApproval['WorkOrderApproval']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($workOrderApproval['WorkOrderApproval']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($workOrderApproval['WorkOrderApproval']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($workOrderApproval['WorkOrderApproval']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Work Order Approval'), array('action' => 'edit', $workOrderApproval['WorkOrderApproval']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Work Order Approval'), array('action' => 'delete', $workOrderApproval['WorkOrderApproval']['id']), array(), __('Are you sure you want to delete # %s?', $workOrderApproval['WorkOrderApproval']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Order Approvals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Order Approval'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Orders'), array('controller' => 'work_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Order'), array('controller' => 'work_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Process States'), array('controller' => 'process_states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Process State'), array('controller' => 'process_states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Approval Levels'), array('controller' => 'approval_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Approval Level'), array('controller' => 'approval_levels', 'action' => 'add')); ?> </li>
	</ul>
</div>
