<div class="organizationKeyPersonnels view">
<h2><?php echo __('Organization Key Personnel'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($organizationKeyPersonnel['OrganizationKeyPersonnel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationKeyPersonnel['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $organizationKeyPersonnel['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($organizationKeyPersonnel['OrganizationKeyPersonnel']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($organizationKeyPersonnel['OrganizationKeyPersonnel']['position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Background'); ?></dt>
		<dd>
			<?php echo h($organizationKeyPersonnel['OrganizationKeyPersonnel']['background']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($organizationKeyPersonnel['OrganizationKeyPersonnel']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($organizationKeyPersonnel['OrganizationKeyPersonnel']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Organization Key Personnel'), array('action' => 'edit', $organizationKeyPersonnel['OrganizationKeyPersonnel']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Organization Key Personnel'), array('action' => 'delete', $organizationKeyPersonnel['OrganizationKeyPersonnel']['id']), array(), __('Are you sure you want to delete # %s?', $organizationKeyPersonnel['OrganizationKeyPersonnel']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Organization Key Personnels'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization Key Personnel'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
