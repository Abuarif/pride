<div class="approvals index">
	<h2><?php echo __('Approvals'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('object_reference_id'); ?></th>
			<th><?php echo $this->Paginator->sort('process_state_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('comments'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($approvals as $approval): ?>
	<tr>
		<td><?php echo h($approval['Approval']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($approval['User']['name'], array('controller' => 'users', 'action' => 'view', $approval['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($approval['ObjectReference']['name'], array('controller' => 'object_references', 'action' => 'view', $approval['ObjectReference']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($approval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $approval['ProcessState']['id'])); ?>
		</td>
		<td><?php echo h($approval['Approval']['name']); ?>&nbsp;</td>
		<td><?php echo h($approval['Approval']['comments']); ?>&nbsp;</td>
		<td><?php echo h($approval['Approval']['updated']); ?>&nbsp;</td>
		<td><?php echo h($approval['Approval']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($approval['Approval']['created']); ?>&nbsp;</td>
		<td><?php echo h($approval['Approval']['created_by']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $approval['Approval']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $approval['Approval']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $approval['Approval']['id']), array(), __('Are you sure you want to delete # %s?', $approval['Approval']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Approval'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Object References'), array('controller' => 'object_references', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Object Reference'), array('controller' => 'object_references', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Process States'), array('controller' => 'process_states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Process State'), array('controller' => 'process_states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaign Orders'), array('controller' => 'campaign_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign Order'), array('controller' => 'campaign_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Provision Buses'), array('controller' => 'provision_buses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Provision Bus'), array('controller' => 'provision_buses', 'action' => 'add')); ?> </li>
	</ul>
</div>
