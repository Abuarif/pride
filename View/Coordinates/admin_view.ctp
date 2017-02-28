<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Coordinates'), h($coordinate['Coordinate']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Coordinates'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Coordinate'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Coordinate'), array('action' => 'edit', $coordinate['Coordinate']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Coordinate'), array('action' => 'delete', $coordinate['Coordinate']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $coordinate['Coordinate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Coordinates'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Coordinate'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="coordinates view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($coordinate['Coordinate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Route'); ?></dt>
		<dd>
			<?php echo $this->Html->link($coordinate['Route']['id'], array('controller' => 'routes', 'action' => 'view', $coordinate['Route']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Lat'); ?></dt>
		<dd>
			<?php echo h($coordinate['Coordinate']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Long'); ?></dt>
		<dd>
			<?php echo h($coordinate['Coordinate']['long']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Status'); ?></dt>
		<dd>
			<?php echo h($coordinate['Coordinate']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($coordinate['Coordinate']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($coordinate['Coordinate']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
