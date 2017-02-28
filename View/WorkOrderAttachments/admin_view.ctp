<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Work Order Attachments'), h($workOrderAttachment['WorkOrderAttachment']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Work Order Attachments'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Work Order Attachment'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Work Order Attachment'), array('action' => 'edit', $workOrderAttachment['WorkOrderAttachment']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Work Order Attachment'), array('action' => 'delete', $workOrderAttachment['WorkOrderAttachment']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $workOrderAttachment['WorkOrderAttachment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Work Order Attachments'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Work Order Attachment'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Work Orders'), array('controller' => 'work_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Work Order'), array('controller' => 'work_orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="workOrderAttachments view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($workOrderAttachment['WorkOrderAttachment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Work Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workOrderAttachment['WorkOrder']['name'], array('controller' => 'work_orders', 'action' => 'view', $workOrderAttachment['WorkOrder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($workOrderAttachment['WorkOrderAttachment']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Files'); ?></dt>
		<dd>
			<?php echo h($workOrderAttachment['WorkOrderAttachment']['files']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Status'); ?></dt>
		<dd>
			<?php echo h($workOrderAttachment['WorkOrderAttachment']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($workOrderAttachment['WorkOrderAttachment']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($workOrderAttachment['WorkOrderAttachment']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
