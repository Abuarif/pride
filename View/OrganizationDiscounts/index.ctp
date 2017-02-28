<div class="organizationDiscounts index">
	<h2><?php echo __('Organization Discounts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('organization_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('rate'); ?></th>
			<th><?php echo $this->Paginator->sort('validity_start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('validity_end_date'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($organizationDiscounts as $organizationDiscount): ?>
	<tr>
		<td><?php echo h($organizationDiscount['OrganizationDiscount']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($organizationDiscount['User']['name'], array('controller' => 'users', 'action' => 'view', $organizationDiscount['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($organizationDiscount['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $organizationDiscount['Organization']['id'])); ?>
		</td>
		<td><?php echo h($organizationDiscount['OrganizationDiscount']['name']); ?>&nbsp;</td>
		<td><?php echo h($organizationDiscount['OrganizationDiscount']['rate']); ?>&nbsp;</td>
		<td><?php echo h($organizationDiscount['OrganizationDiscount']['validity_start_date']); ?>&nbsp;</td>
		<td><?php echo h($organizationDiscount['OrganizationDiscount']['validity_end_date']); ?>&nbsp;</td>
		<td><?php echo h($organizationDiscount['OrganizationDiscount']['status']); ?>&nbsp;</td>
		<td><?php echo h($organizationDiscount['OrganizationDiscount']['updated']); ?>&nbsp;</td>
		<td><?php echo h($organizationDiscount['OrganizationDiscount']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $organizationDiscount['OrganizationDiscount']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $organizationDiscount['OrganizationDiscount']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $organizationDiscount['OrganizationDiscount']['id']), array(), __('Are you sure you want to delete # %s?', $organizationDiscount['OrganizationDiscount']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Organization Discount'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
