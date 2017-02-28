<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Document References');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Document References'), array('action' => 'index'));

?>

<div class="documentReferences index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('doc_type'); ?></th>
		<th><?php echo $this->Paginator->sort('status'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($documentReferences as $documentReference): ?>
	<tr>
		<td><?php echo h($documentReference['DocumentReference']['id']); ?>&nbsp;</td>
		<td><?php echo h($documentReference['DocumentReference']['name']); ?>&nbsp;</td>
		<td><?php echo h($documentReference['DocumentReference']['doc_type']); ?>&nbsp;</td>
		<td><?php echo h($documentReference['DocumentReference']['status']); ?>&nbsp;</td>
		<td><?php echo h($documentReference['DocumentReference']['updated']); ?>&nbsp;</td>
		<td><?php echo h($documentReference['DocumentReference']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $documentReference['DocumentReference']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $documentReference['DocumentReference']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $documentReference['DocumentReference']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $documentReference['DocumentReference']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
