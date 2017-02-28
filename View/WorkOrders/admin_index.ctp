<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Work Orders');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Work Orders'), array('action' => 'index'));

?>

<div class="workOrders index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('user_id'); ?></th>
		<th><?php echo $this->Paginator->sort('provision_bus_id'); ?></th>
		<th><?php echo $this->Paginator->sort('process_state_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('comments'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('created_by'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($workOrders as $workOrder): ?>
	<tr>
		<td><?php echo h($workOrder['WorkOrder']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($workOrder['User']['name'], array('controller' => 'users', 'action' => 'view', $workOrder['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($workOrder['ProvisionBus']['id'], array('controller' => 'provision_buses', 'action' => 'view', $workOrder['ProvisionBus']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($workOrder['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $workOrder['ProcessState']['id'])); ?>
		</td>
		<td><?php echo h($workOrder['WorkOrder']['name']); ?>&nbsp;</td>
		<td><?php echo h($workOrder['WorkOrder']['comments']); ?>&nbsp;</td>
		<td><?php echo h($workOrder['WorkOrder']['updated']); ?>&nbsp;</td>
		<td><?php echo h($workOrder['WorkOrder']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($workOrder['WorkOrder']['created']); ?>&nbsp;</td>
		<td><?php echo h($workOrder['WorkOrder']['created_by']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $workOrder['WorkOrder']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $workOrder['WorkOrder']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $workOrder['WorkOrder']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $workOrder['WorkOrder']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
