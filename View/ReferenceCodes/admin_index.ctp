<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Reference Codes');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Reference Codes'), array('action' => 'index'));

?>

<div class="referenceCodes index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('value'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($referenceCodes as $referenceCode): ?>
	<tr>
		<td><?php echo h($referenceCode['ReferenceCode']['id']); ?>&nbsp;</td>
		<td><?php echo h($referenceCode['ReferenceCode']['value']); ?>&nbsp;</td>
		<td><?php echo h($referenceCode['ReferenceCode']['updated']); ?>&nbsp;</td>
		<td><?php echo h($referenceCode['ReferenceCode']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $referenceCode['ReferenceCode']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $referenceCode['ReferenceCode']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $referenceCode['ReferenceCode']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $referenceCode['ReferenceCode']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
