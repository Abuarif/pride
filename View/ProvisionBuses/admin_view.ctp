<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Provision Buses'), h($provisionBus['ProvisionBus']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Provision Buses'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Provision Bus'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Provision Bus'), array('action' => 'edit', $provisionBus['ProvisionBus']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Provision Bus'), array('action' => 'delete', $provisionBus['ProvisionBus']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $provisionBus['ProvisionBus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Provision Buses'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Provision Bus'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Campaign Orders'), array('controller' => 'campaign_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Campaign Order'), array('controller' => 'campaign_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Depots'), array('controller' => 'depots', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Depot'), array('controller' => 'depots', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Buses'), array('controller' => 'buses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Bus'), array('controller' => 'buses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Approvals'), array('controller' => 'approvals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Approval'), array('controller' => 'approvals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="provisionBuses view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($provisionBus['ProvisionBus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Campaign Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($provisionBus['CampaignOrder']['id'], array('controller' => 'campaign_orders', 'action' => 'view', $provisionBus['CampaignOrder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Order Number'); ?></dt>
		<dd>
			<?php echo h($provisionBus['ProvisionBus']['order_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Depot'); ?></dt>
		<dd>
			<?php echo $this->Html->link($provisionBus['Depot']['name'], array('controller' => 'depots', 'action' => 'view', $provisionBus['Depot']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Route'); ?></dt>
		<dd>
			<?php echo $this->Html->link($provisionBus['Route']['name'], array('controller' => 'routes', 'action' => 'view', $provisionBus['Route']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bus'); ?></dt>
		<dd>
			<?php echo $this->Html->link($provisionBus['Bus']['name'], array('controller' => 'buses', 'action' => 'view', $provisionBus['Bus']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Comment'); ?></dt>
		<dd>
			<?php echo h($provisionBus['ProvisionBus']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Approval'); ?></dt>
		<dd>
			<?php echo $this->Html->link($provisionBus['Approval']['name'], array('controller' => 'approvals', 'action' => 'view', $provisionBus['Approval']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Status'); ?></dt>
		<dd>
			<?php echo h($provisionBus['ProvisionBus']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($provisionBus['ProvisionBus']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated By'); ?></dt>
		<dd>
			<?php echo h($provisionBus['ProvisionBus']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($provisionBus['ProvisionBus']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created By'); ?></dt>
		<dd>
			<?php echo h($provisionBus['ProvisionBus']['created_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
