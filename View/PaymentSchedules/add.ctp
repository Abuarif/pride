<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Payment Schedules');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Payment Schedules'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['PaymentSchedule']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Payment Schedules: ' . $this->data['PaymentSchedule']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('PaymentSchedule');

?>
<div class="paymentSchedules row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Payment Schedule'), '#payment-schedule');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='payment-schedule' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('user_id', array(
					'label' => 'User Id',
				));
				echo $this->Form->input('payee', array(
					'label' => 'Payee',
				));
				echo $this->Form->input('organization_id', array(
					'label' => 'Organization Id',
				));
				echo $this->Form->input('campaign_id', array(
					'label' => 'Campaign Id',
				));
				echo $this->Form->input('campaign_order_id', array(
					'label' => 'Campaign Order Id',
				));
				echo $this->Form->input('payment_advice_id', array(
					'label' => 'Payment Advice Id',
				));
				echo $this->Form->input('description', array(
					'label' => 'Description',
				));
				echo $this->Form->input('invoice_number', array(
					'label' => 'Invoice Number',
				));
				echo $this->Form->input('invoice_attachment', array(
					'label' => 'Invoice Attachment',
				));
				echo $this->Form->input('receipt_attachment', array(
					'label' => 'Receipt Attachment',
				));
				echo $this->Form->input('receipt_number', array(
					'label' => 'Receipt Number',
				));
				echo $this->Form->input('amount', array(
					'label' => 'Amount',
				));
				echo $this->Form->input('approval_status', array(
					'label' => 'Approval Status',
				));
				echo $this->Form->input('status', array(
					'label' => 'Status',
				));
				echo $this->Form->input('descriptions', array(
					'label' => 'Descriptions',
				));
				echo $this->Form->input('due_date', array(
					'label' => 'Due Date',
				));
			?>
			</div>
			<?php echo $this->Croogo->adminTabs(); ?>
		</div>

	</div>

	<div class="span4">
	<?php
		echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
			$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply')) .
			$this->Form->button(__d('croogo', 'Save'), array('class' => 'btn btn-primary')) .
			$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('class' => 'btn btn-danger')) .
			$this->Html->endBox();
		?>
	</div>

</div>
<?php echo $this->Form->end(); ?>
