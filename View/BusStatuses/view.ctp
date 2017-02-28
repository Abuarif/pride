<div class="busStatuses view">
<h2><?php echo __('Bus Status'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($busStatus['BusStatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo $this->Html->link($busStatus['Role']['title'], array('controller' => 'roles', 'action' => 'view', $busStatus['Role']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($busStatus['BusStatus']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($busStatus['BusStatus']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($busStatus['BusStatus']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bus Status'), array('action' => 'edit', $busStatus['BusStatus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bus Status'), array('action' => 'delete', $busStatus['BusStatus']['id']), array(), __('Are you sure you want to delete # %s?', $busStatus['BusStatus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bus Statuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bus Status'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bus Transactions'), array('controller' => 'bus_transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bus Transaction'), array('controller' => 'bus_transactions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Bus Transactions'); ?></h3>
	<?php if (!empty($busStatus['BusTransaction'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Bus Id'); ?></th>
		<th><?php echo __('Organization Id'); ?></th>
		<th><?php echo __('Provision Bus Id'); ?></th>
		<th><?php echo __('Bus Status Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Comments'); ?></th>
		<th><?php echo __('Start Date'); ?></th>
		<th><?php echo __('End Date'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($busStatus['BusTransaction'] as $busTransaction): ?>
		<tr>
			<td><?php echo $busTransaction['id']; ?></td>
			<td><?php echo $busTransaction['bus_id']; ?></td>
			<td><?php echo $busTransaction['organization_id']; ?></td>
			<td><?php echo $busTransaction['provision_bus_id']; ?></td>
			<td><?php echo $busTransaction['bus_status_id']; ?></td>
			<td><?php echo $busTransaction['user_id']; ?></td>
			<td><?php echo $busTransaction['comments']; ?></td>
			<td><?php echo $busTransaction['start_date']; ?></td>
			<td><?php echo $busTransaction['end_date']; ?></td>
			<td><?php echo $busTransaction['updated']; ?></td>
			<td><?php echo $busTransaction['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bus_transactions', 'action' => 'view', $busTransaction['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bus_transactions', 'action' => 'edit', $busTransaction['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bus_transactions', 'action' => 'delete', $busTransaction['id']), array(), __('Are you sure you want to delete # %s?', $busTransaction['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bus Transaction'), array('controller' => 'bus_transactions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
