<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Organization Discounts'), h($organizationDiscount['OrganizationDiscount']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Organization Discounts'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Organization Discount'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Organization Discount'), array('action' => 'edit', $organizationDiscount['OrganizationDiscount']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Organization Discount'), array('action' => 'delete', $organizationDiscount['OrganizationDiscount']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $organizationDiscount['OrganizationDiscount']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organization Discounts'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Organization Discount'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="organizationDiscounts view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($organizationDiscount['OrganizationDiscount']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationDiscount['User']['name'], array('controller' => 'users', 'action' => 'view', $organizationDiscount['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationDiscount['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $organizationDiscount['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($organizationDiscount['OrganizationDiscount']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Rate'); ?></dt>
		<dd>
			<?php echo h($organizationDiscount['OrganizationDiscount']['rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Validity Start Date'); ?></dt>
		<dd>
			<?php echo h($organizationDiscount['OrganizationDiscount']['validity_start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Validity End Date'); ?></dt>
		<dd>
			<?php echo h($organizationDiscount['OrganizationDiscount']['validity_end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Status'); ?></dt>
		<dd>
			<?php echo h($organizationDiscount['OrganizationDiscount']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($organizationDiscount['OrganizationDiscount']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($organizationDiscount['OrganizationDiscount']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
