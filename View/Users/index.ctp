<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('organization_id'); ?></th>
			<th><?php echo $this->Paginator->sort('depot_id'); ?></th>
			<th><?php echo $this->Paginator->sort('role_id'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('website'); ?></th>
			<th><?php echo $this->Paginator->sort('activation_key'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('bio'); ?></th>
			<th><?php echo $this->Paginator->sort('timezone'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('twitter'); ?></th>
			<th><?php echo $this->Paginator->sort('facebook'); ?></th>
			<th><?php echo $this->Paginator->sort('google_plus'); ?></th>
			<th><?php echo $this->Paginator->sort('linkedin'); ?></th>
			<th><?php echo $this->Paginator->sort('skills'); ?></th>
			<th><?php echo $this->Paginator->sort('generally_about'); ?></th>
			<th><?php echo $this->Paginator->sort('my_favourite_tags'); ?></th>
			<th><?php echo $this->Paginator->sort('kms_writing'); ?></th>
			<th><?php echo $this->Paginator->sort('kms_reading'); ?></th>
			<th><?php echo $this->Paginator->sort('kms_editing'); ?></th>
			<th><?php echo $this->Paginator->sort('kms_traveling'); ?></th>
			<th><?php echo $this->Paginator->sort('kms_others'); ?></th>
			<th><?php echo $this->Paginator->sort('allow_contact'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $user['Organization']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($user['Depot']['name'], array('controller' => 'depots', 'action' => 'view', $user['Depot']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($user['Role']['title'], array('controller' => 'roles', 'action' => 'view', $user['Role']['id'])); ?>
		</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['password']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['website']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['activation_key']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['image']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['bio']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['timezone']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['status']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['updated']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['twitter']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['facebook']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['google_plus']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['linkedin']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['skills']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['generally_about']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['my_favourite_tags']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['kms_writing']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['kms_reading']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['kms_editing']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['kms_traveling']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['kms_others']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['allow_contact']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Depots'), array('controller' => 'depots', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Depot'), array('controller' => 'depots', 'action' => 'add')); ?> </li>
	</ul>
</div>
