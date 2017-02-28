<div class="organizationAttachments view">
<h2><?php echo __('Organization Attachment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($organizationAttachment['OrganizationAttachment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationAttachment['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $organizationAttachment['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($organizationAttachment['OrganizationAttachment']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Files'); ?></dt>
		<dd>
			<?php echo h($organizationAttachment['OrganizationAttachment']['files']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($organizationAttachment['OrganizationAttachment']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($organizationAttachment['OrganizationAttachment']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($organizationAttachment['OrganizationAttachment']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Organization Attachment'), array('action' => 'edit', $organizationAttachment['OrganizationAttachment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Organization Attachment'), array('action' => 'delete', $organizationAttachment['OrganizationAttachment']['id']), array(), __('Are you sure you want to delete # %s?', $organizationAttachment['OrganizationAttachment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Organization Attachments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization Attachment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
