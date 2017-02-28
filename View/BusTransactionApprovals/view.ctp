<div class="busTransactionApprovals view">
<h2><?php echo __('Bus Transaction Approval'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($busTransactionApproval['BusTransactionApproval']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bus Transaction'); ?></dt>
		<dd>
			<?php echo $this->Html->link($busTransactionApproval['BusTransaction']['id'], array('controller' => 'bus_transactions', 'action' => 'view', $busTransactionApproval['BusTransaction']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($busTransactionApproval['User']['name'], array('controller' => 'users', 'action' => 'view', $busTransactionApproval['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Process State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($busTransactionApproval['ProcessState']['name'], array('controller' => 'process_states', 'action' => 'view', $busTransactionApproval['ProcessState']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approval Level'); ?></dt>
		<dd>
			<?php echo $this->Html->link($busTransactionApproval['ApprovalLevel']['name'], array('controller' => 'approval_levels', 'action' => 'view', $busTransactionApproval['ApprovalLevel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($busTransactionApproval['BusTransactionApproval']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($busTransactionApproval['BusTransactionApproval']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($busTransactionApproval['BusTransactionApproval']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($busTransactionApproval['BusTransactionApproval']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bus Transaction Approval'), array('action' => 'edit', $busTransactionApproval['BusTransactionApproval']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bus Transaction Approval'), array('action' => 'delete', $busTransactionApproval['BusTransactionApproval']['id']), array(), __('Are you sure you want to delete # %s?', $busTransactionApproval['BusTransactionApproval']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bus Transaction Approvals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bus Transaction Approval'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bus Transactions'), array('controller' => 'bus_transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bus Transaction'), array('controller' => 'bus_transactions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Process States'), array('controller' => 'process_states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Process State'), array('controller' => 'process_states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Approval Levels'), array('controller' => 'approval_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Approval Level'), array('controller' => 'approval_levels', 'action' => 'add')); ?> </li>
	</ul>
</div>
