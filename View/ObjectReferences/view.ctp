<div class="objectReferences view">
<h2><?php echo __('Object Reference'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($objectReference['ObjectReference']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($objectReference['ObjectReference']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id Column Name'); ?></dt>
		<dd>
			<?php echo h($objectReference['ObjectReference']['Id_column_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($objectReference['ObjectReference']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($objectReference['ObjectReference']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Object Reference'), array('action' => 'edit', $objectReference['ObjectReference']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Object Reference'), array('action' => 'delete', $objectReference['ObjectReference']['id']), array(), __('Are you sure you want to delete # %s?', $objectReference['ObjectReference']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Object References'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Object Reference'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Approvals'), array('controller' => 'approvals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Approval'), array('controller' => 'approvals', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Approvals'); ?></h3>
	<?php if (!empty($objectReference['Approval'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Object Reference Id'); ?></th>
		<th><?php echo __('Process State Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Comments'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($objectReference['Approval'] as $approval): ?>
		<tr>
			<td><?php echo $approval['id']; ?></td>
			<td><?php echo $approval['user_id']; ?></td>
			<td><?php echo $approval['object_reference_id']; ?></td>
			<td><?php echo $approval['process_state_id']; ?></td>
			<td><?php echo $approval['name']; ?></td>
			<td><?php echo $approval['comments']; ?></td>
			<td><?php echo $approval['updated']; ?></td>
			<td><?php echo $approval['updated_by']; ?></td>
			<td><?php echo $approval['created']; ?></td>
			<td><?php echo $approval['created_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'approvals', 'action' => 'view', $approval['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'approvals', 'action' => 'edit', $approval['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'approvals', 'action' => 'delete', $approval['id']), array(), __('Are you sure you want to delete # %s?', $approval['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Approval'), array('controller' => 'approvals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
