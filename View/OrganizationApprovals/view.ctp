<div class="organizationApprovals view">
<h2><?php echo __('Organization Approval'); ?></h2>
	<dl>
		<dt><?php echo __('Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationApproval['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $organizationApproval['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationApproval['User']['name'], array('controller' => 'users', 'action' => 'view', $organizationApproval['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approval Status'); ?></dt>
		<dd>
			<?php echo $organizationApproval['ProcessState']['name']; ?>
			&nbsp;
			<?php echo $this->Html->link(
					$this->Html->image('/uploads/approval.png'),
					array('action' => 'edit', $organizationApproval['OrganizationApproval']['id']),
					array('escape' => false)
				); ?>
		</dd>
		<dt><?php echo __('Approval Level'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizationApproval['ApprovalLevel']['name'], array('controller' => 'approval_levels', 'action' => 'view', $organizationApproval['ApprovalLevel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<textarea disabled><?php echo $organizationApproval['OrganizationApproval']['comments']; ?></textarea>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Updated'); ?></dt>
		<dd>
			<?php echo h($organizationApproval['OrganizationApproval']['updated']); ?>
			&nbsp;
		</dd>
		
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		
	</ul>
</div>
