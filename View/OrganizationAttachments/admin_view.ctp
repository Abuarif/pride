<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Organization Attachments'), h($organizationAttachment['OrganizationAttachment']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Organization Attachments'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Organization Attachment'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Organization Attachment'), array('action' => 'edit', $organizationAttachment['OrganizationAttachment']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Organization Attachment'), array('action' => 'delete', $organizationAttachment['OrganizationAttachment']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $organizationAttachment['OrganizationAttachment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organization Attachments'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Organization Attachment'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="organizationAttachments view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($organizationAttachment['OrganizationAttachment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationAttachment['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $organizationAttachment['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($organizationAttachment['OrganizationAttachment']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Files'); ?></dt>
		<dd>
			<?php echo h($organizationAttachment['OrganizationAttachment']['files']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Status'); ?></dt>
		<dd>
			<?php echo h($organizationAttachment['OrganizationAttachment']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($organizationAttachment['OrganizationAttachment']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($organizationAttachment['OrganizationAttachment']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
