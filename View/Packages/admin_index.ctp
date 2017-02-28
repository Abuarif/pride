<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Packages');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Packages'), array('action' => 'index'));

?>

<div class="packages index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('quantity'); ?></th>
		<th><?php echo $this->Paginator->sort('item_type_id'); ?></th>
		<th><?php echo $this->Paginator->sort('image'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('created_by'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($packages as $package): ?>
	<tr>
		<td><?php echo h($package['Package']['id']); ?>&nbsp;</td>
		<td><?php echo h($package['Package']['name']); ?>&nbsp;</td>
		<td><?php echo h($package['Package']['quantity']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($package['ItemType']['name'], array('controller' => 'item_types', 'action' => 'view', $package['ItemType']['id'])); ?>
		</td>
		<td><?php echo h($package['Package']['image']); ?>&nbsp;</td>
		<td><?php echo h($package['Package']['status']); ?>&nbsp;</td>
		<td><?php echo h($package['Package']['updated']); ?>&nbsp;</td>
		<td><?php echo h($package['Package']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($package['Package']['created']); ?>&nbsp;</td>
		<td><?php echo h($package['Package']['created_by']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $package['Package']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $package['Package']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $package['Package']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $package['Package']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
