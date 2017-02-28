<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Organization Shareholders');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Organization Shareholders'), array('action' => 'index'));

?>

<div class="organizationShareholders index">
	<table class="table table-striped">
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
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
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
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $organizationShareholder['OrganizationShareholder']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $organizationShareholder['OrganizationShareholder']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $organizationShareholder['OrganizationShareholder']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $organizationShareholder['OrganizationShareholder']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
