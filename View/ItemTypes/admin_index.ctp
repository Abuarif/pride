<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Item Types');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Item Types'), array('action' => 'index'));

?>

<div class="itemTypes index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('created_by'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($itemTypes as $itemType): ?>
	<tr>
		<td><?php echo h($itemType['ItemType']['id']); ?>&nbsp;</td>
		<td><?php echo h($itemType['ItemType']['name']); ?>&nbsp;</td>
		<td><?php echo h($itemType['ItemType']['status']); ?>&nbsp;</td>
		<td><?php echo h($itemType['ItemType']['updated']); ?>&nbsp;</td>
		<td><?php echo h($itemType['ItemType']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($itemType['ItemType']['created']); ?>&nbsp;</td>
		<td><?php echo h($itemType['ItemType']['created_by']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $itemType['ItemType']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $itemType['ItemType']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $itemType['ItemType']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $itemType['ItemType']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
