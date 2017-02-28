<div class="organizationShareholders index">
	<h2><?php echo __('Organization Shareholders'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('organization_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('nric'); ?></th>
			<th><?php echo $this->Paginator->sort('is_director'); ?></th>
			<th><?php echo $this->Paginator->sort('is_shareholder'); ?></th>
			<th><?php echo $this->Paginator->sort('is_active_personal'); ?></th>
			<th><?php echo $this->Paginator->sort('shareholding'); ?></th>
			<th><?php echo $this->Paginator->sort('percentage'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($organizationShareholders as $organizationShareholder): ?>
	<tr>
		<td><?php echo h($organizationShareholder['OrganizationShareholder']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($organizationShareholder['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $organizationShareholder['Organization']['id'])); ?>
		</td>
		<td><?php echo h($organizationShareholder['OrganizationShareholder']['name']); ?>&nbsp;</td>
		<td><?php echo h($organizationShareholder['OrganizationShareholder']['nric']); ?>&nbsp;</td>
		<td><?php echo h($organizationShareholder['OrganizationShareholder']['is_director']); ?>&nbsp;</td>
		<td><?php echo h($organizationShareholder['OrganizationShareholder']['is_shareholder']); ?>&nbsp;</td>
		<td><?php echo h($organizationShareholder['OrganizationShareholder']['is_active_personal']); ?>&nbsp;</td>
		<td><?php echo h($organizationShareholder['OrganizationShareholder']['shareholding']); ?>&nbsp;</td>
		<td><?php echo h($organizationShareholder['OrganizationShareholder']['percentage']); ?>&nbsp;</td>
		<td><?php echo h($organizationShareholder['OrganizationShareholder']['updated']); ?>&nbsp;</td>
		<td><?php echo h($organizationShareholder['OrganizationShareholder']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $organizationShareholder['OrganizationShareholder']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $organizationShareholder['OrganizationShareholder']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $organizationShareholder['OrganizationShareholder']['id']), array(), __('Are you sure you want to delete # %s?', $organizationShareholder['OrganizationShareholder']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Organization Shareholder'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
