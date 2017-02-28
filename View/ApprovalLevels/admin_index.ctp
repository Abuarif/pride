<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Approval Levels');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Approval Levels'), array('action' => 'index'));

?>

<div class="approvalLevels index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('level_number'); ?></th>
		<th><?php echo $this->Paginator->sort('comments'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($approvalLevels as $approvalLevel): ?>
	<tr>
		<td><?php echo h($approvalLevel['ApprovalLevel']['id']); ?>&nbsp;</td>
		<td><?php echo h($approvalLevel['ApprovalLevel']['name']); ?>&nbsp;</td>
		<td><?php echo h($approvalLevel['ApprovalLevel']['level_number']); ?>&nbsp;</td>
		<td><?php echo h($approvalLevel['ApprovalLevel']['comments']); ?>&nbsp;</td>
		<td><?php echo h($approvalLevel['ApprovalLevel']['updated']); ?>&nbsp;</td>
		<td><?php echo h($approvalLevel['ApprovalLevel']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $approvalLevel['ApprovalLevel']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $approvalLevel['ApprovalLevel']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $approvalLevel['ApprovalLevel']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $approvalLevel['ApprovalLevel']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
