<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Routes');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Routes'), array('action' => 'index'));

?>

<div class="routes index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('depot_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('route_number'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('created_by'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($routes as $route): ?>
	<tr>
		<td><?php echo h($route['Route']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($route['Depot']['name'], array('controller' => 'depots', 'action' => 'view', $route['Depot']['id'])); ?>
		</td>
		<td><?php echo h($route['Route']['name']); ?>&nbsp;</td>
		<td><?php echo h($route['Route']['route_number']); ?>&nbsp;</td>
		<td><?php echo h($route['Route']['status']); ?>&nbsp;</td>
		<td><?php echo h($route['Route']['updated']); ?>&nbsp;</td>
		<td><?php echo h($route['Route']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($route['Route']['created']); ?>&nbsp;</td>
		<td><?php echo h($route['Route']['created_by']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $route['Route']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $route['Route']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $route['Route']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $route['Route']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
