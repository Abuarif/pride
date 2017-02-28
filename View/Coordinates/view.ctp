<div class="coordinates view">
<h2><?php echo __('Coordinate'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($coordinate['Coordinate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Route'); ?></dt>
		<dd>
			<?php echo $this->Html->link($coordinate['Route']['id'], array('controller' => 'routes', 'action' => 'view', $coordinate['Route']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lat'); ?></dt>
		<dd>
			<?php echo h($coordinate['Coordinate']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Long'); ?></dt>
		<dd>
			<?php echo h($coordinate['Coordinate']['long']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($coordinate['Coordinate']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($coordinate['Coordinate']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($coordinate['Coordinate']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Coordinate'), array('action' => 'edit', $coordinate['Coordinate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Coordinate'), array('action' => 'delete', $coordinate['Coordinate']['id']), array(), __('Are you sure you want to delete # %s?', $coordinate['Coordinate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Coordinates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coordinate'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
	</ul>
</div>
