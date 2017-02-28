<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Bus Transaction Approvals');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Bus Transaction Approvals'), array('action' => 'index'));

?>

<div class="busTransactionApprovals index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('bus_transaction_id'); ?></th>
		<th><?php echo $this->Paginator->sort('user_id'); ?></th>
		<th><?php echo $this->Paginator->sort('process_state_id'); ?></th>
		<th><?php echo $this->Paginator->sort('approval_level_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('comments'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($busTransactionApprovals as $busTransactionApproval): ?>
	<tr>
		<td><?php echo h($busTransactionApproval['BusTransactionApproval']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($busTransactionApproval['BusTransaction']['id'], array('controller' => 'bus_transactions', 'action' => 'view', $busTransactionApproval['BusTransaction']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($busTransactionApproval['User']['name'], array('controller' => 'users', 'action' => 'view', $busTransactionApproval['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($busTransactionApproval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $busTransactionApproval['ProcessState']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($busTransactionApproval['ApprovalLevel']['name'], array('controller' => 'approval_levels', 'action' => 'view', $busTransactionApproval['ApprovalLevel']['id'])); ?>
		</td>
		<td><?php echo h($busTransactionApproval['BusTransactionApproval']['name']); ?>&nbsp;</td>
		<td><?php echo h($busTransactionApproval['BusTransactionApproval']['comments']); ?>&nbsp;</td>
		<td><?php echo h($busTransactionApproval['BusTransactionApproval']['updated']); ?>&nbsp;</td>
		<td><?php echo h($busTransactionApproval['BusTransactionApproval']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $busTransactionApproval['BusTransactionApproval']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $busTransactionApproval['BusTransactionApproval']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $busTransactionApproval['BusTransactionApproval']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $busTransactionApproval['BusTransactionApproval']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
