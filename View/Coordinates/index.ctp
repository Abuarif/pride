<div class="coordinates index">
	<h2><?php echo __('Coordinates'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('route_id'); ?></th>
			<th><?php echo $this->Paginator->sort('lat'); ?></th>
			<th><?php echo $this->Paginator->sort('long'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($coordinates as $coordinate): ?>
	<tr>
		<td><?php echo h($coordinate['Coordinate']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($coordinate['Route']['id'], array('controller' => 'routes', 'action' => 'view', $coordinate['Route']['id'])); ?>
		</td>
		<td><?php echo h($coordinate['Coordinate']['lat']); ?>&nbsp;</td>
		<td><?php echo h($coordinate['Coordinate']['long']); ?>&nbsp;</td>
		<td><?php echo h($coordinate['Coordinate']['status']); ?>&nbsp;</td>
		<td><?php echo h($coordinate['Coordinate']['updated']); ?>&nbsp;</td>
		<td><?php echo h($coordinate['Coordinate']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $coordinate['Coordinate']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $coordinate['Coordinate']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $coordinate['Coordinate']['id']), array(), __('Are you sure you want to delete # %s?', $coordinate['Coordinate']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Coordinate'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
	</ul>
</div>
