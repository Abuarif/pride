<div class="organizationTypes view">
<h2><?php echo __('Organization Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($organizationType['OrganizationType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Label'); ?></dt>
		<dd>
			<?php echo h($organizationType['OrganizationType']['label']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Organization Type'), array('action' => 'edit', $organizationType['OrganizationType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Organization Type'), array('action' => 'delete', $organizationType['OrganizationType']['id']), array(), __('Are you sure you want to delete # %s?', $organizationType['OrganizationType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Organization Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Organizations'); ?></h3>
	<?php if (!empty($organizationType['Organization'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Organization Type Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Roc'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Address2'); ?></th>
		<th><?php echo __('Address3'); ?></th>
		<th><?php echo __('Town'); ?></th>
		<th><?php echo __('State'); ?></th>
		<th><?php echo __('Country'); ?></th>
		<th><?php echo __('Postcode'); ?></th>
		<th><?php echo __('Contact Person'); ?></th>
		<th><?php echo __('Contact Email'); ?></th>
		<th><?php echo __('Contact Number'); ?></th>
		<th><?php echo __('Fax Number'); ?></th>
		<th><?php echo __('Files'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('IsSubmitted'); ?></th>
		<th><?php echo __('IsVerified'); ?></th>
		<th><?php echo __('IsAdviced'); ?></th>
		<th><?php echo __('HasPaid'); ?></th>
		<th><?php echo __('IsApproved'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($organizationType['Organization'] as $organization): ?>
		<tr>
			<td><?php echo $organization['id']; ?></td>
			<td><?php echo $organization['organization_type_id']; ?></td>
			<td><?php echo $organization['name']; ?></td>
			<td><?php echo $organization['roc']; ?></td>
			<td><?php echo $organization['address']; ?></td>
			<td><?php echo $organization['address2']; ?></td>
			<td><?php echo $organization['address3']; ?></td>
			<td><?php echo $organization['town']; ?></td>
			<td><?php echo $organization['state']; ?></td>
			<td><?php echo $organization['country']; ?></td>
			<td><?php echo $organization['postcode']; ?></td>
			<td><?php echo $organization['contact_person']; ?></td>
			<td><?php echo $organization['contact_email']; ?></td>
			<td><?php echo $organization['contact_number']; ?></td>
			<td><?php echo $organization['fax_number']; ?></td>
			<td><?php echo $organization['files']; ?></td>
			<td><?php echo $organization['website']; ?></td>
			<td><?php echo $organization['status']; ?></td>
			<td><?php echo $organization['isSubmitted']; ?></td>
			<td><?php echo $organization['isVerified']; ?></td>
			<td><?php echo $organization['isAdviced']; ?></td>
			<td><?php echo $organization['hasPaid']; ?></td>
			<td><?php echo $organization['isApproved']; ?></td>
			<td><?php echo $organization['updated']; ?></td>
			<td><?php echo $organization['updated_by']; ?></td>
			<td><?php echo $organization['created']; ?></td>
			<td><?php echo $organization['created_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'organizations', 'action' => 'view', $organization['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'organizations', 'action' => 'edit', $organization['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'organizations', 'action' => 'delete', $organization['id']), array(), __('Are you sure you want to delete # %s?', $organization['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
