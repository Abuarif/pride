<div class="reservationApprovals view">
<h2><?php echo __('Reservation Approval'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($reservationApproval['ReservationApproval']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reservation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reservationApproval['Reservation']['id'], array('controller' => 'reservations', 'action' => 'view', $reservationApproval['Reservation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reservationApproval['User']['name'], array('controller' => 'users', 'action' => 'view', $reservationApproval['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reservationApproval['Role']['title'], array('controller' => 'roles', 'action' => 'view', $reservationApproval['Role']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Process State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reservationApproval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $reservationApproval['ProcessState']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approval Level'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reservationApproval['ApprovalLevel']['name'], array('controller' => 'approval_levels', 'action' => 'view', $reservationApproval['ApprovalLevel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($reservationApproval['ReservationApproval']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($reservationApproval['ReservationApproval']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($reservationApproval['ReservationApproval']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($reservationApproval['ReservationApproval']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reservation Approval'), array('action' => 'edit', $reservationApproval['ReservationApproval']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Reservation Approval'), array('action' => 'delete', $reservationApproval['ReservationApproval']['id']), array(), __('Are you sure you want to delete # %s?', $reservationApproval['ReservationApproval']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reservation Approvals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reservation Approval'), array('action' => 'add')); ?> </li>
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
