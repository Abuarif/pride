<div class="organizationDiscounts view">
<h2><?php echo __('Organization Discount'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($organizationDiscount['OrganizationDiscount']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationDiscount['User']['name'], array('controller' => 'users', 'action' => 'view', $organizationDiscount['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationDiscount['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $organizationDiscount['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($organizationDiscount['OrganizationDiscount']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rate'); ?></dt>
		<dd>
			<?php echo h($organizationDiscount['OrganizationDiscount']['rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Validity Start Date'); ?></dt>
		<dd>
			<?php echo h($organizationDiscount['OrganizationDiscount']['validity_start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Validity End Date'); ?></dt>
		<dd>
			<?php echo h($organizationDiscount['OrganizationDiscount']['validity_end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($organizationDiscount['OrganizationDiscount']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($organizationDiscount['OrganizationDiscount']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($organizationDiscount['OrganizationDiscount']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Organization Discount'), array('action' => 'edit', $organizationDiscount['OrganizationDiscount']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Organization Discount'), array('action' => 'delete', $organizationDiscount['OrganizationDiscount']['id']), array(), __('Are you sure you want to delete # %s?', $organizationDiscount['OrganizationDiscount']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Organization Discounts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization Discount'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
