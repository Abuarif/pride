<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Organization Shareholders'), h($organizationShareholder['OrganizationShareholder']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Organization Shareholders'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Organization Shareholder'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Organization Shareholder'), array('action' => 'edit', $organizationShareholder['OrganizationShareholder']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Organization Shareholder'), array('action' => 'delete', $organizationShareholder['OrganizationShareholder']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $organizationShareholder['OrganizationShareholder']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organization Shareholders'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Organization Shareholder'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="organizationShareholders view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($organizationShareholder['OrganizationShareholder']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationShareholder['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $organizationShareholder['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($organizationShareholder['OrganizationShareholder']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Nric'); ?></dt>
		<dd>
			<?php echo h($organizationShareholder['OrganizationShareholder']['nric']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Is Director'); ?></dt>
		<dd>
			<?php echo h($organizationShareholder['OrganizationShareholder']['is_director']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Is Shareholder'); ?></dt>
		<dd>
			<?php echo h($organizationShareholder['OrganizationShareholder']['is_shareholder']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Is Active Personal'); ?></dt>
		<dd>
			<?php echo h($organizationShareholder['OrganizationShareholder']['is_active_personal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Shareholding'); ?></dt>
		<dd>
			<?php echo h($organizationShareholder['OrganizationShareholder']['shareholding']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Percentage'); ?></dt>
		<dd>
			<?php echo h($organizationShareholder['OrganizationShareholder']['percentage']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($organizationShareholder['OrganizationShareholder']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($organizationShareholder['OrganizationShareholder']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
