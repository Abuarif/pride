<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Organization Key Personnels'), h($organizationKeyPersonnel['OrganizationKeyPersonnel']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Organization Key Personnels'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Organization Key Personnel'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Organization Key Personnel'), array('action' => 'edit', $organizationKeyPersonnel['OrganizationKeyPersonnel']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Organization Key Personnel'), array('action' => 'delete', $organizationKeyPersonnel['OrganizationKeyPersonnel']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $organizationKeyPersonnel['OrganizationKeyPersonnel']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organization Key Personnels'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Organization Key Personnel'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="organizationKeyPersonnels view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($organizationKeyPersonnel['OrganizationKeyPersonnel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationKeyPersonnel['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $organizationKeyPersonnel['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($organizationKeyPersonnel['OrganizationKeyPersonnel']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Position'); ?></dt>
		<dd>
			<?php echo h($organizationKeyPersonnel['OrganizationKeyPersonnel']['position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Background'); ?></dt>
		<dd>
			<?php echo h($organizationKeyPersonnel['OrganizationKeyPersonnel']['background']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($organizationKeyPersonnel['OrganizationKeyPersonnel']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($organizationKeyPersonnel['OrganizationKeyPersonnel']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
