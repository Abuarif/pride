<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Work Order Approvals');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Work Order Approvals'), array('action' => 'index'));

?>

<div class="workOrderApprovals index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('work_order_id'); ?></th>
		<th><?php echo $this->Paginator->sort('user_id'); ?></th>
		<th><?php echo $this->Paginator->sort('process_state_id'); ?></th>
		<th><?php echo $this->Paginator->sort('approval_level_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('comments'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($workOrderApprovals as $workOrderApproval): ?>
	<tr>
		<td><?php echo h($workOrderApproval['WorkOrderApproval']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($workOrderApproval['WorkOrder']['name'], array('controller' => 'work_orders', 'action' => 'view', $workOrderApproval['WorkOrder']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($workOrderApproval['User']['name'], array('controller' => 'users', 'action' => 'view', $workOrderApproval['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($workOrderApproval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $workOrderApproval['ProcessState']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($workOrderApproval['ApprovalLevel']['name'], array('controller' => 'approval_levels', 'action' => 'view', $workOrderApproval['ApprovalLevel']['id'])); ?>
		</td>
		<td><?php echo h($workOrderApproval['WorkOrderApproval']['name']); ?>&nbsp;</td>
		<td><?php echo h($workOrderApproval['WorkOrderApproval']['comments']); ?>&nbsp;</td>
		<td><?php echo h($workOrderApproval['WorkOrderApproval']['updated']); ?>&nbsp;</td>
		<td><?php echo h($workOrderApproval['WorkOrderApproval']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $workOrderApproval['WorkOrderApproval']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $workOrderApproval['WorkOrderApproval']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $workOrderApproval['WorkOrderApproval']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $workOrderApproval['WorkOrderApproval']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
