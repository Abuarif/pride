<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Organization Attachments');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Organization Attachments'), array('action' => 'index'));

?>

<div class="organizationAttachments index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('organization_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('files'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($organizationAttachments as $organizationAttachment): ?>
	<tr>
		<td><?php echo h($organizationAttachment['OrganizationAttachment']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($organizationAttachment['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $organizationAttachment['Organization']['id'])); ?>
		</td>
		<td><?php echo h($organizationAttachment['OrganizationAttachment']['name']); ?>&nbsp;</td>
		<td><?php echo h($organizationAttachment['OrganizationAttachment']['files']); ?>&nbsp;</td>
		<td><?php echo h($organizationAttachment['OrganizationAttachment']['status']); ?>&nbsp;</td>
		<td><?php echo h($organizationAttachment['OrganizationAttachment']['updated']); ?>&nbsp;</td>
		<td><?php echo h($organizationAttachment['OrganizationAttachment']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $organizationAttachment['OrganizationAttachment']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $organizationAttachment['OrganizationAttachment']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $organizationAttachment['OrganizationAttachment']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $organizationAttachment['OrganizationAttachment']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
