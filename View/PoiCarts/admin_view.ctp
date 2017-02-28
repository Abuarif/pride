<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Poi Carts'), h($poiCart['PoiCart']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Poi Carts'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Poi Cart'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Poi Cart'), array('action' => 'edit', $poiCart['PoiCart']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Poi Cart'), array('action' => 'delete', $poiCart['PoiCart']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $poiCart['PoiCart']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Poi Carts'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Poi Cart'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Depots'), array('controller' => 'depots', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Depot'), array('controller' => 'depots', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="poiCarts view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($poiCart['PoiCart']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($poiCart['User']['name'], array('controller' => 'users', 'action' => 'view', $poiCart['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Depot'); ?></dt>
		<dd>
			<?php echo $this->Html->link($poiCart['Depot']['name'], array('controller' => 'depots', 'action' => 'view', $poiCart['Depot']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Route Number'); ?></dt>
		<dd>
			<?php echo h($poiCart['PoiCart']['route_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Status'); ?></dt>
		<dd>
			<?php echo h($poiCart['PoiCart']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($poiCart['PoiCart']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($poiCart['PoiCart']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
