<div class="organizationUnits view">
<h2><?php echo __('Organization Unit'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Organization Unit'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationUnit['ParentOrganizationUnit']['name'], array('controller' => 'organization_units', 'action' => 'view', $organizationUnit['ParentOrganizationUnit']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationUnit['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $organizationUnit['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Organization Unit Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationUnit['OrganizationUnitType']['id'], array('controller' => 'organization_unit_types', 'action' => 'view', $organizationUnit['OrganizationUnitType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo Url'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['logo_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Region'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['region']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pincode'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['pincode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact Phone 1'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['contact_phone_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact Email 1'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['contact_email_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['rght']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Organization Unit'), array('action' => 'edit', $organizationUnit['OrganizationUnit']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Organization Unit'), array('action' => 'delete', $organizationUnit['OrganizationUnit']['id']), array(), __('Are you sure you want to delete # %s?', $organizationUnit['OrganizationUnit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Organization Units'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization Unit'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Organization Units'); ?></h3>
	<?php if (!empty($organizationUnit['ChildOrganizationUnit'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Organization Id'); ?></th>
		<th><?php echo __('Organization Unit Type Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Logo Url'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Region'); ?></th>
		<th><?php echo __('Country'); ?></th>
		<th><?php echo __('Pincode'); ?></th>
		<th><?php echo __('Contact Phone 1'); ?></th>
		<th><?php echo __('Contact Email 1'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($organizationUnit['ChildOrganizationUnit'] as $childOrganizationUnit): ?>
		<tr>
			<td><?php echo $childOrganizationUnit['id']; ?></td>
			<td><?php echo $childOrganizationUnit['parent_id']; ?></td>
			<td><?php echo $childOrganizationUnit['organization_id']; ?></td>
			<td><?php echo $childOrganizationUnit['organization_unit_type_id']; ?></td>
			<td><?php echo $childOrganizationUnit['name']; ?></td>
			<td><?php echo $childOrganizationUnit['description']; ?></td>
			<td><?php echo $childOrganizationUnit['logo_url']; ?></td>
			<td><?php echo $childOrganizationUnit['address']; ?></td>
			<td><?php echo $childOrganizationUnit['region']; ?></td>
			<td><?php echo $childOrganizationUnit['country']; ?></td>
			<td><?php echo $childOrganizationUnit['pincode']; ?></td>
			<td><?php echo $childOrganizationUnit['contact_phone_1']; ?></td>
			<td><?php echo $childOrganizationUnit['contact_email_1']; ?></td>
			<td><?php echo $childOrganizationUnit['lft']; ?></td>
			<td><?php echo $childOrganizationUnit['rght']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'organization_units', 'action' => 'view', $childOrganizationUnit['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'organization_units', 'action' => 'edit', $childOrganizationUnit['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'organization_units', 'action' => 'delete', $childOrganizationUnit['id']), array(), __('Are you sure you want to delete # %s?', $childOrganizationUnit['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Organization Unit'), array('controller' => 'organization_units', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($organizationUnit['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Organization Id'); ?></th>
		<th><?php echo __('Organization Unit Id'); ?></th>
		<th><?php echo __('Depot Id'); ?></th>
		<th><?php echo __('Role Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Activation Key'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Bio'); ?></th>
		<th><?php echo __('Timezone'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Twitter'); ?></th>
		<th><?php echo __('Facebook'); ?></th>
		<th><?php echo __('Google Plus'); ?></th>
		<th><?php echo __('Linkedin'); ?></th>
		<th><?php echo __('Skills'); ?></th>
		<th><?php echo __('Generally About'); ?></th>
		<th><?php echo __('My Favourite Tags'); ?></th>
		<th><?php echo __('Kms Writing'); ?></th>
		<th><?php echo __('Kms Reading'); ?></th>
		<th><?php echo __('Kms Editing'); ?></th>
		<th><?php echo __('Kms Traveling'); ?></th>
		<th><?php echo __('Kms Others'); ?></th>
		<th><?php echo __('Allow Contact'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($organizationUnit['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['organization_id']; ?></td>
			<td><?php echo $user['organization_unit_id']; ?></td>
			<td><?php echo $user['depot_id']; ?></td>
			<td><?php echo $user['role_id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['website']; ?></td>
			<td><?php echo $user['activation_key']; ?></td>
			<td><?php echo $user['image']; ?></td>
			<td><?php echo $user['bio']; ?></td>
			<td><?php echo $user['timezone']; ?></td>
			<td><?php echo $user['status']; ?></td>
			<td><?php echo $user['updated']; ?></td>
			<td><?php echo $user['updated_by']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['created_by']; ?></td>
			<td><?php echo $user['twitter']; ?></td>
			<td><?php echo $user['facebook']; ?></td>
			<td><?php echo $user['google_plus']; ?></td>
			<td><?php echo $user['linkedin']; ?></td>
			<td><?php echo $user['skills']; ?></td>
			<td><?php echo $user['generally_about']; ?></td>
			<td><?php echo $user['my_favourite_tags']; ?></td>
			<td><?php echo $user['kms_writing']; ?></td>
			<td><?php echo $user['kms_reading']; ?></td>
			<td><?php echo $user['kms_editing']; ?></td>
			<td><?php echo $user['kms_traveling']; ?></td>
			<td><?php echo $user['kms_others']; ?></td>
			<td><?php echo $user['allow_contact']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array(), __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
