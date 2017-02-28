<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Payment Schedules');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Payment Schedules'), array('action' => 'index'));

?>

<div class="paymentSchedules index">
	<table class="table table-striped">
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
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
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
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $paymentSchedule['PaymentSchedule']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $paymentSchedule['PaymentSchedule']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $paymentSchedule['PaymentSchedule']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $paymentSchedule['PaymentSchedule']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
