<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Organization Approvals');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Organization Approvals'), array('action' => 'index'));

?>

<div class="organizationApprovals index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('organization_id'); ?></th>
		<th><?php echo $this->Paginator->sort('user_id'); ?></th>
		<th><?php echo $this->Paginator->sort('process_state_id'); ?></th>
		<th><?php echo $this->Paginator->sort('approval_level_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('comments'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($organizationApprovals as $organizationApproval): ?>
	<tr>
		<td><?php echo h($organizationApproval['OrganizationApproval']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($organizationApproval['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $organizationApproval['Organization']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($organizationApproval['User']['name'], array('controller' => 'users', 'action' => 'view', $organizationApproval['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($organizationApproval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $organizationApproval['ProcessState']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($organizationApproval['ApprovalLevel']['name'], array('controller' => 'approval_levels', 'action' => 'view', $organizationApproval['ApprovalLevel']['id'])); ?>
		</td>
		<td><?php echo h($organizationApproval['OrganizationApproval']['name']); ?>&nbsp;</td>
		<td><?php echo h($organizationApproval['OrganizationApproval']['comments']); ?>&nbsp;</td>
		<td><?php echo h($organizationApproval['OrganizationApproval']['updated']); ?>&nbsp;</td>
		<td><?php echo h($organizationApproval['OrganizationApproval']['created']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $organizationApproval['OrganizationApproval']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $organizationApproval['OrganizationApproval']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $organizationApproval['OrganizationApproval']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $organizationApproval['OrganizationApproval']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
