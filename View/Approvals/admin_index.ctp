<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Approvals');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Approvals'), array('action' => 'index'));

?>

<div class="approvals index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('user_id'); ?></th>
		<th><?php echo $this->Paginator->sort('object_reference_id'); ?></th>
		<th><?php echo $this->Paginator->sort('process_state_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('comments'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('created_by'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($approvals as $approval): ?>
	<tr>
		<td><?php echo h($approval['Approval']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($approval['User']['name'], array('controller' => 'users', 'action' => 'view', $approval['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($approval['ObjectReference']['name'], array('controller' => 'object_references', 'action' => 'view', $approval['ObjectReference']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($approval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $approval['ProcessState']['id'])); ?>
		</td>
		<td><?php echo h($approval['Approval']['name']); ?>&nbsp;</td>
		<td><?php echo h($approval['Approval']['comments']); ?>&nbsp;</td>
		<td><?php echo h($approval['Approval']['updated']); ?>&nbsp;</td>
		<td><?php echo h($approval['Approval']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($approval['Approval']['created']); ?>&nbsp;</td>
		<td><?php echo h($approval['Approval']['created_by']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $approval['Approval']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $approval['Approval']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $approval['Approval']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $approval['Approval']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
