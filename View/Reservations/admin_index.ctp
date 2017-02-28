<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Reservations');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Reservations'), array('action' => 'index'));

?>

<div class="reservations index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('organization_id'); ?></th>
		<th><?php echo $this->Paginator->sort('user_id'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($reservations as $reservation): ?>
	<tr>
		<td><?php echo h($reservation['Reservation']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($reservation['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $reservation['Organization']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($reservation['User']['name'], array('controller' => 'users', 'action' => 'view', $reservation['User']['id'])); ?>
		</td>
		<td><?php echo h($reservation['Reservation']['status']); ?>&nbsp;</td>
		<td><?php echo h($reservation['Reservation']['updated']); ?>&nbsp;</td>
		<td><?php echo h($reservation['Reservation']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $reservation['Reservation']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $reservation['Reservation']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $reservation['Reservation']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $reservation['Reservation']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
