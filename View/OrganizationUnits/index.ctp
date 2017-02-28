<div class="organizationUnits index">
	<h2><?php echo __('Organization Units'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('organization_id'); ?></th>
			<th><?php echo $this->Paginator->sort('organization_unit_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('logo_url'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('region'); ?></th>
			<th><?php echo $this->Paginator->sort('country'); ?></th>
			<th><?php echo $this->Paginator->sort('pincode'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_phone_1'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_email_1'); ?></th>
			<th><?php echo $this->Paginator->sort('lft'); ?></th>
			<th><?php echo $this->Paginator->sort('rght'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($organizationUnits as $organizationUnit): ?>
	<tr>
		<td><?php echo h($organizationUnit['OrganizationUnit']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($organizationUnit['ParentOrganizationUnit']['name'], array('controller' => 'organization_units', 'action' => 'view', $organizationUnit['ParentOrganizationUnit']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($organizationUnit['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $organizationUnit['Organization']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($organizationUnit['OrganizationUnitType']['id'], array('controller' => 'organization_unit_types', 'action' => 'view', $organizationUnit['OrganizationUnitType']['id'])); ?>
		</td>
		<td><?php echo h($organizationUnit['OrganizationUnit']['name']); ?>&nbsp;</td>
		<td><?php echo h($organizationUnit['OrganizationUnit']['description']); ?>&nbsp;</td>
		<td><?php echo h($organizationUnit['OrganizationUnit']['logo_url']); ?>&nbsp;</td>
		<td><?php echo h($organizationUnit['OrganizationUnit']['address']); ?>&nbsp;</td>
		<td><?php echo h($organizationUnit['OrganizationUnit']['region']); ?>&nbsp;</td>
		<td><?php echo h($organizationUnit['OrganizationUnit']['country']); ?>&nbsp;</td>
		<td><?php echo h($organizationUnit['OrganizationUnit']['pincode']); ?>&nbsp;</td>
		<td><?php echo h($organizationUnit['OrganizationUnit']['contact_phone_1']); ?>&nbsp;</td>
		<td><?php echo h($organizationUnit['OrganizationUnit']['contact_email_1']); ?>&nbsp;</td>
		<td><?php echo h($organizationUnit['OrganizationUnit']['lft']); ?>&nbsp;</td>
		<td><?php echo h($organizationUnit['OrganizationUnit']['rght']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $organizationUnit['OrganizationUnit']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $organizationUnit['OrganizationUnit']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $organizationUnit['OrganizationUnit']['id']), array(), __('Are you sure you want to delete # %s?', $organizationUnit['OrganizationUnit']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Organization Unit'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Organization Units'), array('controller' => 'organization_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Organization Unit'), array('controller' => 'organization_units', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organization Unit Types'), array('controller' => 'organization_unit_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization Unit Type'), array('controller' => 'organization_unit_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
