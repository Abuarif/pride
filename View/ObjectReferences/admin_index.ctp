<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Object References');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Object References'), array('action' => 'index'));

?>

<div class="objectReferences index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('Id_column_name'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($objectReferences as $objectReference): ?>
	<tr>
		<td><?php echo h($objectReference['ObjectReference']['id']); ?>&nbsp;</td>
		<td><?php echo h($objectReference['ObjectReference']['name']); ?>&nbsp;</td>
		<td><?php echo h($objectReference['ObjectReference']['Id_column_name']); ?>&nbsp;</td>
		<td><?php echo h($objectReference['ObjectReference']['updated']); ?>&nbsp;</td>
		<td><?php echo h($objectReference['ObjectReference']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $objectReference['ObjectReference']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $objectReference['ObjectReference']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $objectReference['ObjectReference']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $objectReference['ObjectReference']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
