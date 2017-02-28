<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Buses'), h($bus['Bus']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Buses'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Bus'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Bus'), array('action' => 'edit', $bus['Bus']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Bus'), array('action' => 'delete', $bus['Bus']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $bus['Bus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Buses'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Bus'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New RouteDetail'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="buses view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($bus['Bus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'RouteDetail'); ?></dt>
		<dd>
			<?php echo h($bus['RouteDetail']['depot_present'].'-'.$bus['RouteDetail']['route_number']); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __d('croogo', 'Registration Number'); ?></dt>
		<dd>
			<?php echo h($bus['Bus']['registration_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Status'); ?></dt>
		<dd>
			<?php echo h($bus['Bus']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($bus['Bus']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($bus['Bus']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
