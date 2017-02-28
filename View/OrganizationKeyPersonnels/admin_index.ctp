<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Organization Key Personnels');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Organization Key Personnels'), array('action' => 'index'));

?>

<div class="organizationKeyPersonnels index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('organization_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('position'); ?></th>
		<th><?php echo $this->Paginator->sort('background'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($organizationKeyPersonnels as $organizationKeyPersonnel): ?>
	<tr>
		<td><?php echo h($organizationKeyPersonnel['OrganizationKeyPersonnel']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($organizationKeyPersonnel['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $organizationKeyPersonnel['Organization']['id'])); ?>
		</td>
		<td><?php echo h($organizationKeyPersonnel['OrganizationKeyPersonnel']['name']); ?>&nbsp;</td>
		<td><?php echo h($organizationKeyPersonnel['OrganizationKeyPersonnel']['position']); ?>&nbsp;</td>
		<td><?php echo h($organizationKeyPersonnel['OrganizationKeyPersonnel']['background']); ?>&nbsp;</td>
		<td><?php echo h($organizationKeyPersonnel['OrganizationKeyPersonnel']['updated']); ?>&nbsp;</td>
		<td><?php echo h($organizationKeyPersonnel['OrganizationKeyPersonnel']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $organizationKeyPersonnel['OrganizationKeyPersonnel']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $organizationKeyPersonnel['OrganizationKeyPersonnel']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $organizationKeyPersonnel['OrganizationKeyPersonnel']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $organizationKeyPersonnel['OrganizationKeyPersonnel']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
