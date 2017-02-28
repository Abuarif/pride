<div class="objectReferences index">
	<h2><?php echo __('Object References'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('Id_column_name'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($objectReferences as $objectReference): ?>
	<tr>
		<td><?php echo h($objectReference['ObjectReference']['id']); ?>&nbsp;</td>
		<td><?php echo h($objectReference['ObjectReference']['name']); ?>&nbsp;</td>
		<td><?php echo h($objectReference['ObjectReference']['Id_column_name']); ?>&nbsp;</td>
		<td><?php echo h($objectReference['ObjectReference']['updated']); ?>&nbsp;</td>
		<td><?php echo h($objectReference['ObjectReference']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $objectReference['ObjectReference']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $objectReference['ObjectReference']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $objectReference['ObjectReference']['id']), array(), __('Are you sure you want to delete # %s?', $objectReference['ObjectReference']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Object Reference'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Approvals'), array('controller' => 'approvals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Approval'), array('controller' => 'approvals', 'action' => 'add')); ?> </li>
	</ul>
</div>
