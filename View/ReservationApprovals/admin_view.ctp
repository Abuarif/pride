<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Reservation Approvals'), h($reservationApproval['ReservationApproval']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Reservation Approvals'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Reservation Approval'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Reservation Approval'), array('action' => 'edit', $reservationApproval['ReservationApproval']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Reservation Approval'), array('action' => 'delete', $reservationApproval['ReservationApproval']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $reservationApproval['ReservationApproval']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Reservation Approvals'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Reservation Approval'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Reservations'), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Reservation'), array('controller' => 'reservations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Process States'), array('controller' => 'process_states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Process State'), array('controller' => 'process_states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Approval Levels'), array('controller' => 'approval_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Approval Level'), array('controller' => 'approval_levels', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="reservationApprovals view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($reservationApproval['ReservationApproval']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Reservation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reservationApproval['Reservation']['id'], array('controller' => 'reservations', 'action' => 'view', $reservationApproval['Reservation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reservationApproval['User']['name'], array('controller' => 'users', 'action' => 'view', $reservationApproval['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Role'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reservationApproval['Role']['title'], array('controller' => 'roles', 'action' => 'view', $reservationApproval['Role']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Process State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reservationApproval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $reservationApproval['ProcessState']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Approval Level'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reservationApproval['ApprovalLevel']['name'], array('controller' => 'approval_levels', 'action' => 'view', $reservationApproval['ApprovalLevel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($reservationApproval['ReservationApproval']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Comments'); ?></dt>
		<dd>
			<?php echo h($reservationApproval['ReservationApproval']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($reservationApproval['ReservationApproval']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($reservationApproval['ReservationApproval']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
