<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Payment Schedules'), h($paymentSchedule['PaymentSchedule']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Payment Schedules'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Payment Schedule'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Payment Schedule'), array('action' => 'edit', $paymentSchedule['PaymentSchedule']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Payment Schedule'), array('action' => 'delete', $paymentSchedule['PaymentSchedule']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $paymentSchedule['PaymentSchedule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Payment Schedules'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Payment Schedule'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Campaigns'), array('controller' => 'campaigns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Campaign'), array('controller' => 'campaigns', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Campaign Orders'), array('controller' => 'campaign_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Campaign Order'), array('controller' => 'campaign_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Payment Advices'), array('controller' => 'payment_advices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Payment Advice'), array('controller' => 'payment_advices', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="paymentSchedules view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($paymentSchedule['PaymentSchedule']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($paymentSchedule['User']['name'], array('controller' => 'users', 'action' => 'view', $paymentSchedule['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Payee'); ?></dt>
		<dd>
			<?php echo h($paymentSchedule['PaymentSchedule']['payee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($paymentSchedule['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $paymentSchedule['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Campaign'); ?></dt>
		<dd>
			<?php echo $this->Html->link($paymentSchedule['Campaign']['name'], array('controller' => 'campaigns', 'action' => 'view', $paymentSchedule['Campaign']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Campaign Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($paymentSchedule['CampaignOrder']['id'], array('controller' => 'campaign_orders', 'action' => 'view', $paymentSchedule['CampaignOrder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Payment Advice'); ?></dt>
		<dd>
			<?php echo $this->Html->link($paymentSchedule['PaymentAdvice']['id'], array('controller' => 'payment_advices', 'action' => 'view', $paymentSchedule['PaymentAdvice']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Description'); ?></dt>
		<dd>
			<?php echo h($paymentSchedule['PaymentSchedule']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Invoice Number'); ?></dt>
		<dd>
			<?php echo h($paymentSchedule['PaymentSchedule']['invoice_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Invoice Attachment'); ?></dt>
		<dd>
			<?php echo h($paymentSchedule['PaymentSchedule']['invoice_attachment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Receipt Attachment'); ?></dt>
		<dd>
			<?php echo h($paymentSchedule['PaymentSchedule']['receipt_attachment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Receipt Number'); ?></dt>
		<dd>
			<?php echo h($paymentSchedule['PaymentSchedule']['receipt_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Amount'); ?></dt>
		<dd>
			<?php echo h($paymentSchedule['PaymentSchedule']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Approval Status'); ?></dt>
		<dd>
			<?php echo h($paymentSchedule['PaymentSchedule']['approval_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Status'); ?></dt>
		<dd>
			<?php echo h($paymentSchedule['PaymentSchedule']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Descriptions'); ?></dt>
		<dd>
			<?php echo h($paymentSchedule['PaymentSchedule']['descriptions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Due Date'); ?></dt>
		<dd>
			<?php echo h($paymentSchedule['PaymentSchedule']['due_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($paymentSchedule['PaymentSchedule']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($paymentSchedule['PaymentSchedule']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
