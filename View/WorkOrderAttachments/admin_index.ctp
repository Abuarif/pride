<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Work Order Attachments');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Work Order Attachments'), array('action' => 'index'));

?>

<div class="workOrderAttachments index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('work_order_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('files'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($workOrderAttachments as $workOrderAttachment): ?>
	<tr>
		<td><?php echo h($workOrderAttachment['WorkOrderAttachment']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($workOrderAttachment['WorkOrder']['name'], array('controller' => 'work_orders', 'action' => 'view', $workOrderAttachment['WorkOrder']['id'])); ?>
		</td>
		<td><?php echo h($workOrderAttachment['WorkOrderAttachment']['name']); ?>&nbsp;</td>
		<td><?php echo h($workOrderAttachment['WorkOrderAttachment']['files']); ?>&nbsp;</td>
		<td><?php echo h($workOrderAttachment['WorkOrderAttachment']['status']); ?>&nbsp;</td>
		<td><?php echo h($workOrderAttachment['WorkOrderAttachment']['updated']); ?>&nbsp;</td>
		<td><?php echo h($workOrderAttachment['WorkOrderAttachment']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $workOrderAttachment['WorkOrderAttachment']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $workOrderAttachment['WorkOrderAttachment']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $workOrderAttachment['WorkOrderAttachment']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $workOrderAttachment['WorkOrderAttachment']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
