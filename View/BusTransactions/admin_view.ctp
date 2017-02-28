<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Bus Transactions'), h($busTransaction['BusTransaction']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Bus Transactions'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Bus Transaction'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Bus Transaction'), array('action' => 'edit', $busTransaction['BusTransaction']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Bus Transaction'), array('action' => 'delete', $busTransaction['BusTransaction']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $busTransaction['BusTransaction']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Bus Transactions'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Bus Transaction'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Buses'), array('controller' => 'buses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Bus'), array('controller' => 'buses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Provision Buses'), array('controller' => 'provision_buses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Provision Bus'), array('controller' => 'provision_buses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Bus Statuses'), array('controller' => 'bus_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Bus Status'), array('controller' => 'bus_statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="busTransactions view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($busTransaction['BusTransaction']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bus'); ?></dt>
		<dd>
			<?php echo $this->Html->link($busTransaction['Bus']['name'], array('controller' => 'buses', 'action' => 'view', $busTransaction['Bus']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($busTransaction['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $busTransaction['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Provision Bus'); ?></dt>
		<dd>
			<?php echo $this->Html->link($busTransaction['ProvisionBus']['id'], array('controller' => 'provision_buses', 'action' => 'view', $busTransaction['ProvisionBus']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bus Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($busTransaction['BusStatus']['name'], array('controller' => 'bus_statuses', 'action' => 'view', $busTransaction['BusStatus']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($busTransaction['User']['name'], array('controller' => 'users', 'action' => 'view', $busTransaction['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Comments'); ?></dt>
		<dd>
			<?php echo h($busTransaction['BusTransaction']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Start Date'); ?></dt>
		<dd>
			<?php echo h($busTransaction['BusTransaction']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'End Date'); ?></dt>
		<dd>
			<?php echo h($busTransaction['BusTransaction']['end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($busTransaction['BusTransaction']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($busTransaction['BusTransaction']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
