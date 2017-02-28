<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Organization Units'), h($organizationUnit['OrganizationUnit']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Organization Units'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Organization Unit'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Organization Unit'), array('action' => 'edit', $organizationUnit['OrganizationUnit']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Organization Unit'), array('action' => 'delete', $organizationUnit['OrganizationUnit']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $organizationUnit['OrganizationUnit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organization Units'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Organization Unit'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organization Units'), array('controller' => 'organization_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Parent Organization Unit'), array('controller' => 'organization_units', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organization Unit Types'), array('controller' => 'organization_unit_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Organization Unit Type'), array('controller' => 'organization_unit_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="organizationUnits view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Parent Organization Unit'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationUnit['ParentOrganizationUnit']['name'], array('controller' => 'organization_units', 'action' => 'view', $organizationUnit['ParentOrganizationUnit']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationUnit['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $organizationUnit['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Organization Unit Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationUnit['OrganizationUnitType']['id'], array('controller' => 'organization_unit_types', 'action' => 'view', $organizationUnit['OrganizationUnitType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Description'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Logo Url'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['logo_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Region'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['region']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Country'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Pincode'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['pincode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Contact Phone 1'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['contact_phone_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Contact Email 1'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['contact_email_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Lft'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Rght'); ?></dt>
		<dd>
			<?php echo h($organizationUnit['OrganizationUnit']['rght']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
