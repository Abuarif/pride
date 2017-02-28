<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Reservation Approvals');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Reservation Approvals'), array('action' => 'index'));

?>

<div class="reservationApprovals index">
	<table class="table table-striped">
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
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
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
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $reservationApproval['ReservationApproval']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $reservationApproval['ReservationApproval']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $reservationApproval['ReservationApproval']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $reservationApproval['ReservationApproval']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
