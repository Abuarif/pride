<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Organization Units');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Organization Units'), array('action' => 'index'));

?>

<div class="organizationUnits index">
	<table class="table table-striped">
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
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
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
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $organizationUnit['OrganizationUnit']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $organizationUnit['OrganizationUnit']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $organizationUnit['OrganizationUnit']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $organizationUnit['OrganizationUnit']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
