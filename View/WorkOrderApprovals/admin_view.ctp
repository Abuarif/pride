<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Work Order Approvals'), h($workOrderApproval['WorkOrderApproval']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Work Order Approvals'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Work Order Approval'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Work Order Approval'), array('action' => 'edit', $workOrderApproval['WorkOrderApproval']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Work Order Approval'), array('action' => 'delete', $workOrderApproval['WorkOrderApproval']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $workOrderApproval['WorkOrderApproval']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Work Order Approvals'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Work Order Approval'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Work Orders'), array('controller' => 'work_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Work Order'), array('controller' => 'work_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Process States'), array('controller' => 'process_states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Process State'), array('controller' => 'process_states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Approval Levels'), array('controller' => 'approval_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Approval Level'), array('controller' => 'approval_levels', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="workOrderApprovals view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($workOrderApproval['WorkOrderApproval']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Work Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workOrderApproval['WorkOrder']['name'], array('controller' => 'work_orders', 'action' => 'view', $workOrderApproval['WorkOrder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workOrderApproval['User']['name'], array('controller' => 'users', 'action' => 'view', $workOrderApproval['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Process State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workOrderApproval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $workOrderApproval['ProcessState']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Approval Level'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workOrderApproval['ApprovalLevel']['name'], array('controller' => 'approval_levels', 'action' => 'view', $workOrderApproval['ApprovalLevel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($workOrderApproval['WorkOrderApproval']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Comments'); ?></dt>
		<dd>
			<?php echo h($workOrderApproval['WorkOrderApproval']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($workOrderApproval['WorkOrderApproval']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($workOrderApproval['WorkOrderApproval']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
