<div class="poiCarts view">
<h2><?php echo __('Poi Cart'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($poiCart['PoiCart']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($poiCart['User']['name'], array('controller' => 'users', 'action' => 'view', $poiCart['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Depot'); ?></dt>
		<dd>
			<?php echo $this->Html->link($poiCart['Depot']['name'], array('controller' => 'depots', 'action' => 'view', $poiCart['Depot']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Route Number'); ?></dt>
		<dd>
			<?php echo h($poiCart['PoiCart']['route_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($poiCart['PoiCart']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($poiCart['PoiCart']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($poiCart['PoiCart']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Poi Cart'), array('action' => 'edit', $poiCart['PoiCart']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Poi Cart'), array('action' => 'delete', $poiCart['PoiCart']['id']), array(), __('Are you sure you want to delete # %s?', $poiCart['PoiCart']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Poi Carts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poi Cart'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Depots'), array('controller' => 'depots', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Depot'), array('controller' => 'depots', 'action' => 'add')); ?> </li>
	</ul>
</div>
