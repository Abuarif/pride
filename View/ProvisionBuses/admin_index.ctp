<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Provision Buses');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Provision Buses'), array('action' => 'index'));

?>

<div class="provisionBuses index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('campaign_order_id'); ?></th>
		<th><?php echo $this->Paginator->sort('order_number'); ?></th>
		<th><?php echo $this->Paginator->sort('depot_id'); ?></th>
		<th><?php echo $this->Paginator->sort('route_id'); ?></th>
		<th><?php echo $this->Paginator->sort('bus_id'); ?></th>
		<th><?php echo $this->Paginator->sort('comment'); ?></th>
		<th><?php echo $this->Paginator->sort('approval_id'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('created_by'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($provisionBuses as $provisionBus): ?>
	<tr>
		<td><?php echo h($provisionBus['ProvisionBus']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($provisionBus['CampaignOrder']['id'], array('controller' => 'campaign_orders', 'action' => 'view', $provisionBus['CampaignOrder']['id'])); ?>
		</td>
		<td><?php echo h($provisionBus['ProvisionBus']['order_number']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($provisionBus['Depot']['name'], array('controller' => 'depots', 'action' => 'view', $provisionBus['Depot']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($provisionBus['Route']['name'], array('controller' => 'routes', 'action' => 'view', $provisionBus['Route']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($provisionBus['Bus']['name'], array('controller' => 'buses', 'action' => 'view', $provisionBus['Bus']['id'])); ?>
		</td>
		<td><?php echo h($provisionBus['ProvisionBus']['comment']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($provisionBus['Approval']['name'], array('controller' => 'approvals', 'action' => 'view', $provisionBus['Approval']['id'])); ?>
		</td>
		<td><?php echo h($provisionBus['ProvisionBus']['status']); ?>&nbsp;</td>
		<td><?php echo h($provisionBus['ProvisionBus']['updated']); ?>&nbsp;</td>
		<td><?php echo h($provisionBus['ProvisionBus']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($provisionBus['ProvisionBus']['created']); ?>&nbsp;</td>
		<td><?php echo h($provisionBus['ProvisionBus']['created_by']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $provisionBus['ProvisionBus']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $provisionBus['ProvisionBus']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $provisionBus['ProvisionBus']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $provisionBus['ProvisionBus']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
