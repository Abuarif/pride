<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Bus Statuses'), h($busStatus['BusStatus']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Bus Statuses'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Bus Status'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Bus Status'), array('action' => 'edit', $busStatus['BusStatus']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Bus Status'), array('action' => 'delete', $busStatus['BusStatus']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $busStatus['BusStatus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Bus Statuses'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Bus Status'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Bus Transactions'), array('controller' => 'bus_transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Bus Transaction'), array('controller' => 'bus_transactions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="busStatuses view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($busStatus['BusStatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Role'); ?></dt>
		<dd>
			<?php echo $this->Html->link($busStatus['Role']['title'], array('controller' => 'roles', 'action' => 'view', $busStatus['Role']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($busStatus['BusStatus']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($busStatus['BusStatus']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($busStatus['BusStatus']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
