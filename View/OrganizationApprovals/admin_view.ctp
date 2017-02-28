<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Organization Approvals'), h($organizationApproval['OrganizationApproval']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Organization Approvals'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Organization Approval'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Organization Approval'), array('action' => 'edit', $organizationApproval['OrganizationApproval']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Organization Approval'), array('action' => 'delete', $organizationApproval['OrganizationApproval']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $organizationApproval['OrganizationApproval']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organization Approvals'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Organization Approval'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Process States'), array('controller' => 'process_states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Process State'), array('controller' => 'process_states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Approval Levels'), array('controller' => 'approval_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Approval Level'), array('controller' => 'approval_levels', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="organizationApprovals view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($organizationApproval['OrganizationApproval']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationApproval['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $organizationApproval['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationApproval['User']['name'], array('controller' => 'users', 'action' => 'view', $organizationApproval['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Process State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationApproval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $organizationApproval['ProcessState']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Approval Level'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationApproval['ApprovalLevel']['name'], array('controller' => 'approval_levels', 'action' => 'view', $organizationApproval['ApprovalLevel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($organizationApproval['OrganizationApproval']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Comments'); ?></dt>
		<dd>
			<?php echo h($organizationApproval['OrganizationApproval']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($organizationApproval['OrganizationApproval']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($organizationApproval['OrganizationApproval']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
