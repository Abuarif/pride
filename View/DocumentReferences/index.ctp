<div class="documentReferences index">
	<h2><?php echo __('Document References'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('doc_type'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($documentReferences as $documentReference): ?>
	<tr>
		<td><?php echo h($documentReference['DocumentReference']['id']); ?>&nbsp;</td>
		<td><?php echo h($documentReference['DocumentReference']['name']); ?>&nbsp;</td>
		<td><?php echo h($documentReference['DocumentReference']['doc_type']); ?>&nbsp;</td>
		<td><?php echo h($documentReference['DocumentReference']['status']); ?>&nbsp;</td>
		<td><?php echo h($documentReference['DocumentReference']['updated']); ?>&nbsp;</td>
		<td><?php echo h($documentReference['DocumentReference']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $documentReference['DocumentReference']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $documentReference['DocumentReference']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $documentReference['DocumentReference']['id']), array(), __('Are you sure you want to delete # %s?', $documentReference['DocumentReference']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Document Reference'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Organization Attachments'), array('controller' => 'organization_attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization Attachment'), array('controller' => 'organization_attachments', 'action' => 'add')); ?> </li>
	</ul>
</div>
