<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Job Task Assignments'), h($jobTaskAssignment['JobTaskAssignment']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Job Task Assignments'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Job Task Assignment'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Job Task Assignment'), array('action' => 'edit', $jobTaskAssignment['JobTaskAssignment']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Job Task Assignment'), array('action' => 'delete', $jobTaskAssignment['JobTaskAssignment']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $jobTaskAssignment['JobTaskAssignment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Job Task Assignments'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Job Task Assignment'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="jobTaskAssignments view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($jobTaskAssignment['JobTaskAssignment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Job'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobTaskAssignment['Job']['id'], array('controller' => 'jobs', 'action' => 'view', $jobTaskAssignment['Job']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobTaskAssignment['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $jobTaskAssignment['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Status'); ?></dt>
		<dd>
			<?php echo h($jobTaskAssignment['JobTaskAssignment']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($jobTaskAssignment['JobTaskAssignment']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($jobTaskAssignment['JobTaskAssignment']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
