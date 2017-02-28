<div class="paymentSchedules index">
	<h2><?php echo __('Payment Schedules'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('payee'); ?></th>
			<th><?php echo $this->Paginator->sort('organization_id'); ?></th>
			<th><?php echo $this->Paginator->sort('campaign_id'); ?></th>
			<th><?php echo $this->Paginator->sort('campaign_order_id'); ?></th>
			<th><?php echo $this->Paginator->sort('payment_advice_id'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('invoice_number'); ?></th>
			<th><?php echo $this->Paginator->sort('invoice_attachment'); ?></th>
			<th><?php echo $this->Paginator->sort('receipt_attachment'); ?></th>
			<th><?php echo $this->Paginator->sort('receipt_number'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th><?php echo $this->Paginator->sort('approval_status'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('descriptions'); ?></th>
			<th><?php echo $this->Paginator->sort('due_date'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($paymentSchedules as $paymentSchedule): ?>
	<tr>
		<td><?php echo h($paymentSchedule['PaymentSchedule']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($paymentSchedule['User']['name'], array('controller' => 'users', 'action' => 'view', $paymentSchedule['User']['id'])); ?>
		</td>
		<td><?php echo h($paymentSchedule['PaymentSchedule']['payee']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($paymentSchedule['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $paymentSchedule['Organization']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($paymentSchedule['Campaign']['name'], array('controller' => 'campaigns', 'action' => 'view', $paymentSchedule['Campaign']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($paymentSchedule['CampaignOrder']['id'], array('controller' => 'campaign_orders', 'action' => 'view', $paymentSchedule['CampaignOrder']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($paymentSchedule['PaymentAdvice']['id'], array('controller' => 'payment_advices', 'action' => 'view', $paymentSchedule['PaymentAdvice']['id'])); ?>
		</td>
		<td><?php echo h($paymentSchedule['PaymentSchedule']['description']); ?>&nbsp;</td>
		<td><?php echo h($paymentSchedule['PaymentSchedule']['invoice_number']); ?>&nbsp;</td>
		<td><?php echo h($paymentSchedule['PaymentSchedule']['invoice_attachment']); ?>&nbsp;</td>
		<td><?php echo h($paymentSchedule['PaymentSchedule']['receipt_attachment']); ?>&nbsp;</td>
		<td><?php echo h($paymentSchedule['PaymentSchedule']['receipt_number']); ?>&nbsp;</td>
		<td><?php echo h($paymentSchedule['PaymentSchedule']['amount']); ?>&nbsp;</td>
		<td><?php echo h($paymentSchedule['PaymentSchedule']['approval_status']); ?>&nbsp;</td>
		<td><?php echo h($paymentSchedule['PaymentSchedule']['status']); ?>&nbsp;</td>
		<td><?php echo h($paymentSchedule['PaymentSchedule']['descriptions']); ?>&nbsp;</td>
		<td><?php echo h($paymentSchedule['PaymentSchedule']['due_date']); ?>&nbsp;</td>
		<td><?php echo h($paymentSchedule['PaymentSchedule']['updated']); ?>&nbsp;</td>
		<td><?php echo h($paymentSchedule['PaymentSchedule']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $paymentSchedule['PaymentSchedule']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $paymentSchedule['PaymentSchedule']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $paymentSchedule['PaymentSchedule']['id']), array(), __('Are you sure you want to delete # %s?', $paymentSchedule['PaymentSchedule']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Payment Schedule'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaigns'), array('controller' => 'campaigns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign'), array('controller' => 'campaigns', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaign Orders'), array('controller' => 'campaign_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign Order'), array('controller' => 'campaign_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payment Advices'), array('controller' => 'payment_advices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment Advice'), array('controller' => 'payment_advices', 'action' => 'add')); ?> </li>
	</ul>
</div>
