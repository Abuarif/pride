<div class="jobTasks index">
	<h2><?php echo __('Job Tasks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('job_id'); ?></th>
			<th><?php echo $this->Paginator->sort('provision_bus_id'); ?></th>
			<th><?php echo $this->Paginator->sort('job_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('files'); ?></th>
			<th><?php echo $this->Paginator->sort('files2'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($jobTasks as $jobTask): ?>
	<tr>
		<td><?php echo h($jobTask['JobTask']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($jobTask['User']['name'], array('controller' => 'users', 'action' => 'view', $jobTask['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($jobTask['Job']['id'], array('controller' => 'jobs', 'action' => 'view', $jobTask['Job']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($jobTask['ProvisionBus']['id'], array('controller' => 'provision_buses', 'action' => 'view', $jobTask['ProvisionBus']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($jobTask['JobType']['name'], array('controller' => 'job_types', 'action' => 'view', $jobTask['JobType']['id'])); ?>
		</td>
		<td><?php echo h($jobTask['JobTask']['files']); ?>&nbsp;</td>
		<td><?php echo h($jobTask['JobTask']['files2']); ?>&nbsp;</td>
		<td><?php echo h($jobTask['JobTask']['status']); ?>&nbsp;</td>
		<td><?php echo h($jobTask['JobTask']['updated']); ?>&nbsp;</td>
		<td><?php echo h($jobTask['JobTask']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $jobTask['JobTask']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $jobTask['JobTask']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $jobTask['JobTask']['id']), array(), __('Are you sure you want to delete # %s?', $jobTask['JobTask']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Job Task'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Provision Buses'), array('controller' => 'provision_buses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Provision Bus'), array('controller' => 'provision_buses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Job Types'), array('controller' => 'job_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job Type'), array('controller' => 'job_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
