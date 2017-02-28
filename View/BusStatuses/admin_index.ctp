<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Bus Statuses');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Bus Statuses'), array('action' => 'index'));

?>

<div class="busStatuses index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('role_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($busStatuses as $busStatus): ?>
	<tr>
		<td><?php echo h($busStatus['BusStatus']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($busStatus['Role']['title'], array('controller' => 'roles', 'action' => 'view', $busStatus['Role']['id'])); ?>
		</td>
		<td><?php echo h($busStatus['BusStatus']['name']); ?>&nbsp;</td>
		<td><?php echo h($busStatus['BusStatus']['updated']); ?>&nbsp;</td>
		<td><?php echo h($busStatus['BusStatus']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $busStatus['BusStatus']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $busStatus['BusStatus']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $busStatus['BusStatus']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $busStatus['BusStatus']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
