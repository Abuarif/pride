<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Organizations'), h($organization['Organization']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Organizations'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Organization'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Organization'), array('action' => 'edit', $organization['Organization']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Organization'), array('action' => 'delete', $organization['Organization']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $organization['Organization']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organizations'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Organization'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Campaigns'), array('controller' => 'campaigns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Campaign'), array('controller' => 'campaigns', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="organizations view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Roc'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['roc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Postcode'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['postcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Contact Person'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['contact_person']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Contact Email'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['contact_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Contact Number'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['contact_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Files'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['files']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Website'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Approval Status'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated By'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created By'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['created_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
