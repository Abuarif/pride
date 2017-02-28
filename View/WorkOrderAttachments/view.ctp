<div class="workOrderAttachments view">
<h2><?php echo __('Work Order Attachment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($workOrderAttachment['WorkOrderAttachment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Work Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workOrderAttachment['WorkOrder']['name'], array('controller' => 'work_orders', 'action' => 'view', $workOrderAttachment['WorkOrder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($workOrderAttachment['WorkOrderAttachment']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Files'); ?></dt>
		<dd>
			<?php echo h($workOrderAttachment['WorkOrderAttachment']['files']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($workOrderAttachment['WorkOrderAttachment']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($workOrderAttachment['WorkOrderAttachment']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($workOrderAttachment['WorkOrderAttachment']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Work Order Attachment'), array('action' => 'edit', $workOrderAttachment['WorkOrderAttachment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Work Order Attachment'), array('action' => 'delete', $workOrderAttachment['WorkOrderAttachment']['id']), array(), __('Are you sure you want to delete # %s?', $workOrderAttachment['WorkOrderAttachment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Order Attachments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Order Attachment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Orders'), array('controller' => 'work_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Order'), array('controller' => 'work_orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
