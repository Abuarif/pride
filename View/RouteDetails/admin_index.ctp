<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Route Details');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Route Details'), array('action' => 'index'));

?>

<div class="routeDetails index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('depot_present'); ?></th>
		<th><?php echo $this->Paginator->sort('route_number'); ?></th>
		<th><?php echo $this->Paginator->sort('origin'); ?></th>
		<th><?php echo $this->Paginator->sort('destination'); ?></th>
		<th><?php echo $this->Paginator->sort('route_way_1'); ?></th>
		<th><?php echo $this->Paginator->sort('route_way_2'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($routeDetails as $routeDetail): ?>
	<tr>
		<td><?php echo h($routeDetail['RouteDetail']['id']); ?>&nbsp;</td>
		<td><?php echo h($routeDetail['RouteDetail']['depot_present']); ?>&nbsp;</td>
		<td><?php echo h($routeDetail['RouteDetail']['route_number']); ?>&nbsp;</td>
		<td><?php echo h($routeDetail['RouteDetail']['origin']); ?>&nbsp;</td>
		<td><?php echo h($routeDetail['RouteDetail']['destination']); ?>&nbsp;</td>
		<td><?php echo h($routeDetail['RouteDetail']['route_way_1']); ?>&nbsp;</td>
		<td><?php echo h($routeDetail['RouteDetail']['route_way_2']); ?>&nbsp;</td>
		<td><?php echo h($routeDetail['RouteDetail']['created']); ?>&nbsp;</td>
		<td><?php echo h($routeDetail['RouteDetail']['updated']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $routeDetail['RouteDetail']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $routeDetail['RouteDetail']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $routeDetail['RouteDetail']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $routeDetail['RouteDetail']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
