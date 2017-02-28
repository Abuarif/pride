<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Process States'), h($processState['ProcessState']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Process States'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Process State'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Process State'), array('action' => 'edit', $processState['ProcessState']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Process State'), array('action' => 'delete', $processState['ProcessState']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $processState['ProcessState']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Process States'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Process State'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Approvals'), array('controller' => 'approvals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Approval'), array('controller' => 'approvals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Campaign Order Approvals'), array('controller' => 'campaign_order_approvals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Campaign Order Approval'), array('controller' => 'campaign_order_approvals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organization Approvals'), array('controller' => 'organization_approvals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Organization Approval'), array('controller' => 'organization_approvals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Work Order Approvals'), array('controller' => 'work_order_approvals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Work Order Approval'), array('controller' => 'work_order_approvals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Work Orders'), array('controller' => 'work_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Work Order'), array('controller' => 'work_orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="processStates view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($processState['ProcessState']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'User Role Allowed'); ?></dt>
		<dd>
			<?php echo h($processState['ProcessState']['role_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Related Object'); ?></dt>
		<dd>
			<?php echo h($processState['ProcessState']['object']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($processState['ProcessState']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Status'); ?></dt>
		<dd>
			<?php echo h($processState['ProcessState']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($processState['ProcessState']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated By'); ?></dt>
		<dd>
			<?php echo h($processState['ProcessState']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($processState['ProcessState']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created By'); ?></dt>
		<dd>
			<?php echo h($processState['ProcessState']['created_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
