<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Job Tasks'), h($jobTask['JobTask']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Job Tasks'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Job Task'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Job Task'), array('action' => 'edit', $jobTask['JobTask']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Job Task'), array('action' => 'delete', $jobTask['JobTask']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $jobTask['JobTask']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Job Tasks'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Job Task'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Provision Buses'), array('controller' => 'provision_buses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Provision Bus'), array('controller' => 'provision_buses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Job Types'), array('controller' => 'job_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Job Type'), array('controller' => 'job_types', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="jobTasks view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($jobTask['JobTask']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobTask['User']['name'], array('controller' => 'users', 'action' => 'view', $jobTask['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Job'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobTask['Job']['id'], array('controller' => 'jobs', 'action' => 'view', $jobTask['Job']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Provision Bus'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobTask['ProvisionBus']['id'], array('controller' => 'provision_buses', 'action' => 'view', $jobTask['ProvisionBus']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Job Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jobTask['JobType']['name'], array('controller' => 'job_types', 'action' => 'view', $jobTask['JobType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Files'); ?></dt>
		<dd>
			<?php echo h($jobTask['JobTask']['files']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Files2'); ?></dt>
		<dd>
			<?php echo h($jobTask['JobTask']['files2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Status'); ?></dt>
		<dd>
			<?php echo h($jobTask['JobTask']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($jobTask['JobTask']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($jobTask['JobTask']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
