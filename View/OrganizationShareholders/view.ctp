<div class="organizationShareholders view">
<h2><?php echo __('Organization Shareholder'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($organizationShareholder['OrganizationShareholder']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationShareholder['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $organizationShareholder['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($organizationShareholder['OrganizationShareholder']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nric'); ?></dt>
		<dd>
			<?php echo h($organizationShareholder['OrganizationShareholder']['nric']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Director'); ?></dt>
		<dd>
			<?php echo h($organizationShareholder['OrganizationShareholder']['is_director']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Shareholder'); ?></dt>
		<dd>
			<?php echo h($organizationShareholder['OrganizationShareholder']['is_shareholder']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Active Personal'); ?></dt>
		<dd>
			<?php echo h($organizationShareholder['OrganizationShareholder']['is_active_personal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shareholding'); ?></dt>
		<dd>
			<?php echo h($organizationShareholder['OrganizationShareholder']['shareholding']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Percentage'); ?></dt>
		<dd>
			<?php echo h($organizationShareholder['OrganizationShareholder']['percentage']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($organizationShareholder['OrganizationShareholder']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($organizationShareholder['OrganizationShareholder']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Organization Shareholder'), array('action' => 'edit', $organizationShareholder['OrganizationShareholder']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Organization Shareholder'), array('action' => 'delete', $organizationShareholder['OrganizationShareholder']['id']), array(), __('Are you sure you want to delete # %s?', $organizationShareholder['OrganizationShareholder']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Organization Shareholders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization Shareholder'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
