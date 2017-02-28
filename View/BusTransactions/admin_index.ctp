<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Bus Transactions');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Bus Transactions'), array('action' => 'index'));

?>

<div class="busTransactions index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('bus_id'); ?></th>
		<th><?php echo $this->Paginator->sort('organization_id'); ?></th>
		<th><?php echo $this->Paginator->sort('provision_bus_id'); ?></th>
		<th><?php echo $this->Paginator->sort('bus_status_id'); ?></th>
		<th><?php echo $this->Paginator->sort('user_id'); ?></th>
		<th><?php echo $this->Paginator->sort('comments'); ?></th>
		<th><?php echo $this->Paginator->sort('start_date'); ?></th>
		<th><?php echo $this->Paginator->sort('end_date'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($busTransactions as $busTransaction): ?>
	<tr>
		<td><?php echo h($busTransaction['BusTransaction']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($busTransaction['Bus']['name'], array('controller' => 'buses', 'action' => 'view', $busTransaction['Bus']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($busTransaction['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $busTransaction['Organization']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($busTransaction['ProvisionBus']['id'], array('controller' => 'provision_buses', 'action' => 'view', $busTransaction['ProvisionBus']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($busTransaction['BusStatus']['name'], array('controller' => 'bus_statuses', 'action' => 'view', $busTransaction['BusStatus']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($busTransaction['User']['name'], array('controller' => 'users', 'action' => 'view', $busTransaction['User']['id'])); ?>
		</td>
		<td><?php echo h($busTransaction['BusTransaction']['comments']); ?>&nbsp;</td>
		<td><?php echo h($busTransaction['BusTransaction']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($busTransaction['BusTransaction']['end_date']); ?>&nbsp;</td>
		<td><?php echo h($busTransaction['BusTransaction']['updated']); ?>&nbsp;</td>
		<td><?php echo h($busTransaction['BusTransaction']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $busTransaction['BusTransaction']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $busTransaction['BusTransaction']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $busTransaction['BusTransaction']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $busTransaction['BusTransaction']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
