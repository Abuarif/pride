<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Buses');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Buses'), array('action' => 'index'));

?>

<div class="buses index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('route_id'); ?></th>
		<th><?php echo $this->Paginator->sort('registration_number'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($buses as $bus): ?>
	<tr>
		<td><?php echo h($bus['Bus']['id']); ?>&nbsp;</td>
		<td>
			<?php echo h($bus['RouteDetail']['depot_present'].'-'.$bus['RouteDetail']['route_number']); ?>
		</td>
		<td><?php echo h($bus['Bus']['registration_number']); ?>&nbsp;</td>
		<td><?php echo h($bus['Bus']['status']); ?>&nbsp;</td>
		<td><?php echo h($bus['Bus']['updated']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $bus['Bus']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $bus['Bus']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $bus['Bus']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $bus['Bus']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
