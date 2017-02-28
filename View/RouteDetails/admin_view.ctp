<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Route Details'), h($routeDetail['RouteDetail']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Route Details'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Route Detail'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Route Detail'), array('action' => 'edit', $routeDetail['RouteDetail']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Route Detail'), array('action' => 'delete', $routeDetail['RouteDetail']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $routeDetail['RouteDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Route Details'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Route Detail'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		</ul>
	</div>
</div>

<div class="routeDetails view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($routeDetail['RouteDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Depot'); ?></dt>
		<dd>
			<?php echo h($routeDetail['RouteDetail']['depot_present']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Route Number'); ?></dt>
		<dd>
			<?php echo h($routeDetail['RouteDetail']['route_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Origin'); ?></dt>
		<dd>
			<?php echo h($routeDetail['RouteDetail']['origin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Destination'); ?></dt>
		<dd>
			<?php echo h($routeDetail['RouteDetail']['destination']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Route Way 1'); ?></dt>
		<dd>
			<?php echo h($routeDetail['RouteDetail']['route_way_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Route Way 2'); ?></dt>
		<dd>
			<?php echo h($routeDetail['RouteDetail']['route_way_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($routeDetail['RouteDetail']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($routeDetail['RouteDetail']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
