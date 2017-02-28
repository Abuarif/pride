<div class="reservationApprovals index">
	<h2><?php echo __('Reservation Approvals'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('reservation_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('role_id'); ?></th>
			<th><?php echo $this->Paginator->sort('process_state_id'); ?></th>
			<th><?php echo $this->Paginator->sort('approval_level_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('comments'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($reservationApprovals as $reservationApproval): ?>
	<tr>
		<td><?php echo h($reservationApproval['ReservationApproval']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($reservationApproval['Reservation']['id'], array('controller' => 'reservations', 'action' => 'view', $reservationApproval['Reservation']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($reservationApproval['User']['name'], array('controller' => 'users', 'action' => 'view', $reservationApproval['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($reservationApproval['Role']['title'], array('controller' => 'roles', 'action' => 'view', $reservationApproval['Role']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($reservationApproval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $reservationApproval['ProcessState']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($reservationApproval['ApprovalLevel']['name'], array('controller' => 'approval_levels', 'action' => 'view', $reservationApproval['ApprovalLevel']['id'])); ?>
		</td>
		<td><?php echo h($reservationApproval['ReservationApproval']['name']); ?>&nbsp;</td>
		<td><?php echo h($reservationApproval['ReservationApproval']['comments']); ?>&nbsp;</td>
		<td><?php echo h($reservationApproval['ReservationApproval']['updated']); ?>&nbsp;</td>
		<td><?php echo h($reservationApproval['ReservationApproval']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $reservationApproval['ReservationApproval']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $reservationApproval['ReservationApproval']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $reservationApproval['ReservationApproval']['id']), array(), __('Are you sure you want to delete # %s?', $reservationApproval['ReservationApproval']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Reservation Approval'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reservations'), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reservation'), array('controller' => 'reservations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Process States'), array('controller' => 'process_states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Process State'), array('controller' => 'process_states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Approval Levels'), array('controller' => 'approval_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Approval Level'), array('controller' => 'approval_levels', 'action' => 'add')); ?> </li>
	</ul>
</div>
