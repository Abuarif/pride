<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Process States');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Process States'), array('action' => 'index'));

?>

<div class="processStates index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('role_id'); ?></th>
		<th><?php echo $this->Paginator->sort('object'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($processStates as $processState): ?>
	<tr>
		<td><?php echo h($processState['ProcessState']['id']); ?>&nbsp;</td>
		<td><?php echo h($processState['ProcessState']['role_id']); ?>&nbsp;</td>
		<td><?php echo h($processState['ProcessState']['object']); ?>&nbsp;</td>
		<td><?php echo h($processState['ProcessState']['name']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $processState['ProcessState']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $processState['ProcessState']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $processState['ProcessState']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $processState['ProcessState']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
