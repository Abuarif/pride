<div class="approvals view">
<h2><?php echo __('Approval'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($approval['Approval']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($approval['User']['name'], array('controller' => 'users', 'action' => 'view', $approval['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Object Reference'); ?></dt>
		<dd>
			<?php echo $this->Html->link($approval['ObjectReference']['name'], array('controller' => 'object_references', 'action' => 'view', $approval['ObjectReference']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Process State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($approval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $approval['ProcessState']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($approval['Approval']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($approval['Approval']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($approval['Approval']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($approval['Approval']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($approval['Approval']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($approval['Approval']['created_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Approval'), array('action' => 'edit', $approval['Approval']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Approval'), array('action' => 'delete', $approval['Approval']['id']), array(), __('Are you sure you want to delete # %s?', $approval['Approval']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Approvals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Approval'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Object References'), array('controller' => 'object_references', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Object Reference'), array('controller' => 'object_references', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Process States'), array('controller' => 'process_states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Process State'), array('controller' => 'process_states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaign Orders'), array('controller' => 'campaign_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign Order'), array('controller' => 'campaign_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Provision Buses'), array('controller' => 'provision_buses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Provision Bus'), array('controller' => 'provision_buses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Campaign Orders'); ?></h3>
	<?php if (!empty($approval['CampaignOrder'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Campaign Id'); ?></th>
		<th><?php echo __('Package Id'); ?></th>
		<th><?php echo __('Approval Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($approval['CampaignOrder'] as $campaignOrder): ?>
		<tr>
			<td><?php echo $campaignOrder['id']; ?></td>
			<td><?php echo $campaignOrder['campaign_id']; ?></td>
			<td><?php echo $campaignOrder['package_id']; ?></td>
			<td><?php echo $campaignOrder['approval_id']; ?></td>
			<td><?php echo $campaignOrder['status']; ?></td>
			<td><?php echo $campaignOrder['updated']; ?></td>
			<td><?php echo $campaignOrder['updated_by']; ?></td>
			<td><?php echo $campaignOrder['created']; ?></td>
			<td><?php echo $campaignOrder['created_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'campaign_orders', 'action' => 'view', $campaignOrder['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'campaign_orders', 'action' => 'edit', $campaignOrder['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'campaign_orders', 'action' => 'delete', $campaignOrder['id']), array(), __('Are you sure you want to delete # %s?', $campaignOrder['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Campaign Order'), array('controller' => 'campaign_orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Provision Buses'); ?></h3>
	<?php if (!empty($approval['ProvisionBus'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Campaign Order Id'); ?></th>
		<th><?php echo __('Order Number'); ?></th>
		<th><?php echo __('Depot Id'); ?></th>
		<th><?php echo __('Route Id'); ?></th>
		<th><?php echo __('Bus Id'); ?></th>
		<th><?php echo __('Campaign Design Id'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Approval Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($approval['ProvisionBus'] as $provisionBus): ?>
		<tr>
			<td><?php echo $provisionBus['id']; ?></td>
			<td><?php echo $provisionBus['campaign_order_id']; ?></td>
			<td><?php echo $provisionBus['order_number']; ?></td>
			<td><?php echo $provisionBus['depot_id']; ?></td>
			<td><?php echo $provisionBus['route_id']; ?></td>
			<td><?php echo $provisionBus['bus_id']; ?></td>
			<td><?php echo $provisionBus['campaign_design_id']; ?></td>
			<td><?php echo $provisionBus['comment']; ?></td>
			<td><?php echo $provisionBus['approval_id']; ?></td>
			<td><?php echo $provisionBus['status']; ?></td>
			<td><?php echo $provisionBus['updated']; ?></td>
			<td><?php echo $provisionBus['updated_by']; ?></td>
			<td><?php echo $provisionBus['created']; ?></td>
			<td><?php echo $provisionBus['created_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'provision_buses', 'action' => 'view', $provisionBus['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'provision_buses', 'action' => 'edit', $provisionBus['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'provision_buses', 'action' => 'delete', $provisionBus['id']), array(), __('Are you sure you want to delete # %s?', $provisionBus['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Provision Bus'), array('controller' => 'provision_buses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
