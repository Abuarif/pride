<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Coordinates');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Coordinates'), array('action' => 'index'));

?>

<div class="coordinates index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('route_id'); ?></th>
		<th><?php echo $this->Paginator->sort('lat'); ?></th>
		<th><?php echo $this->Paginator->sort('long'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($coordinates as $coordinate): ?>
	<tr>
		<td><?php echo h($coordinate['Coordinate']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($coordinate['Route']['id'], array('controller' => 'routes', 'action' => 'view', $coordinate['Route']['id'])); ?>
		</td>
		<td><?php echo h($coordinate['Coordinate']['lat']); ?>&nbsp;</td>
		<td><?php echo h($coordinate['Coordinate']['long']); ?>&nbsp;</td>
		<td><?php echo h($coordinate['Coordinate']['status']); ?>&nbsp;</td>
		<td><?php echo h($coordinate['Coordinate']['updated']); ?>&nbsp;</td>
		<td><?php echo h($coordinate['Coordinate']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $coordinate['Coordinate']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $coordinate['Coordinate']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $coordinate['Coordinate']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $coordinate['Coordinate']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
