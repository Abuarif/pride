<div class="documentReferences view">
<h2><?php echo __('Document Reference'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($documentReference['DocumentReference']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($documentReference['DocumentReference']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doc Type'); ?></dt>
		<dd>
			<?php echo h($documentReference['DocumentReference']['doc_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($documentReference['DocumentReference']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($documentReference['DocumentReference']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($documentReference['DocumentReference']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Document Reference'), array('action' => 'edit', $documentReference['DocumentReference']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Document Reference'), array('action' => 'delete', $documentReference['DocumentReference']['id']), array(), __('Are you sure you want to delete # %s?', $documentReference['DocumentReference']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Document References'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document Reference'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organization Attachments'), array('controller' => 'organization_attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization Attachment'), array('controller' => 'organization_attachments', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Organization Attachments'); ?></h3>
	<?php if (!empty($documentReference['OrganizationAttachment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Organization Id'); ?></th>
		<th><?php echo __('Document Reference Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Files'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($documentReference['OrganizationAttachment'] as $organizationAttachment): ?>
		<tr>
			<td><?php echo $organizationAttachment['id']; ?></td>
			<td><?php echo $organizationAttachment['organization_id']; ?></td>
			<td><?php echo $organizationAttachment['document_reference_id']; ?></td>
			<td><?php echo $organizationAttachment['name']; ?></td>
			<td><?php echo $organizationAttachment['files']; ?></td>
			<td><?php echo $organizationAttachment['status']; ?></td>
			<td><?php echo $organizationAttachment['updated']; ?></td>
			<td><?php echo $organizationAttachment['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'organization_attachments', 'action' => 'view', $organizationAttachment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'organization_attachments', 'action' => 'edit', $organizationAttachment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'organization_attachments', 'action' => 'delete', $organizationAttachment['id']), array(), __('Are you sure you want to delete # %s?', $organizationAttachment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Organization Attachment'), array('controller' => 'organization_attachments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
