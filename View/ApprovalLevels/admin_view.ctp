<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Approval Levels'), h($approvalLevel['ApprovalLevel']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Approval Levels'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Approval Level'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Approval Level'), array('action' => 'edit', $approvalLevel['ApprovalLevel']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Approval Level'), array('action' => 'delete', $approvalLevel['ApprovalLevel']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $approvalLevel['ApprovalLevel']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Approval Levels'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Approval Level'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Approvals'), array('controller' => 'approvals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Approval'), array('controller' => 'approvals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Campaign Order Approvals'), array('controller' => 'campaign_order_approvals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Campaign Order Approval'), array('controller' => 'campaign_order_approvals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="approvalLevels view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($approvalLevel['ApprovalLevel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($approvalLevel['ApprovalLevel']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Level Number'); ?></dt>
		<dd>
			<?php echo h($approvalLevel['ApprovalLevel']['level_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Comments'); ?></dt>
		<dd>
			<?php echo h($approvalLevel['ApprovalLevel']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($approvalLevel['ApprovalLevel']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($approvalLevel['ApprovalLevel']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
