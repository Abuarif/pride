<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Poi Carts');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Poi Carts'), array('action' => 'index'));

?>

<div class="poiCarts index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('user_id'); ?></th>
		<th><?php echo $this->Paginator->sort('depot_id'); ?></th>
		<th><?php echo $this->Paginator->sort('route_number'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($poiCarts as $poiCart): ?>
	<tr>
		<td><?php echo h($poiCart['PoiCart']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($poiCart['User']['name'], array('controller' => 'users', 'action' => 'view', $poiCart['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($poiCart['Depot']['name'], array('controller' => 'depots', 'action' => 'view', $poiCart['Depot']['id'])); ?>
		</td>
		<td><?php echo h($poiCart['PoiCart']['route_number']); ?>&nbsp;</td>
		<td><?php echo h($poiCart['PoiCart']['status']); ?>&nbsp;</td>
		<td><?php echo h($poiCart['PoiCart']['updated']); ?>&nbsp;</td>
		<td><?php echo h($poiCart['PoiCart']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $poiCart['PoiCart']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $poiCart['PoiCart']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $poiCart['PoiCart']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $poiCart['PoiCart']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
