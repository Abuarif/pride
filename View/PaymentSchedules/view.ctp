<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Payment Schedule Details
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-sign-in"></i>Home</a></li>
		<li><a href="#">Payment Advice</a></li>
		<li class="active">Payment Schedule Details</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>
							<th style="width:230px;">Organization</th>
							<td style="width:30px;">:</td>
							<td>
								<?php 
									echo $this->Html->link($paymentSchedule['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $paymentSchedule['Organization']['id'])); 
								?>
							</td>
						</tr>
						<tr>
							<th>Payment Description</th>
							<td>:</td>
							<td>
								<?php echo h($paymentSchedule['PaymentSchedule']['description']); ?>
							</td>
						</tr>
						<tr>
							<th>Invoice Number</th>
							<td>:</td>
							<td>
								<?php echo h($paymentSchedule['PaymentAdvice']['invoice_number']); ?> 
							</td>
						</tr>
						<tr>
							<th>Receipt Number</th>
							<td>:</td>
							<td>
								<?php echo h($paymentSchedule['PaymentSchedule']['receipt_number']); ?>
							</td>
						</tr>
						<tr>
							<th>Amount</th>
							<td>:</td>
							<td>
								<?php echo h($this->Number->currency($paymentSchedule['PaymentSchedule']['amount'], 'RM')); ?>
							</td>
						</tr>
						<tr>
							<th>Due Date</th>
							<td>:</td>
							<td>
								<?php echo h($this->Time->nice($paymentSchedule['PaymentSchedule']['due_date']));?>
							</td>
						</tr>
						<tr>
							<th>Approval Status</th>
							<td>:</td>
							<td>
								<?php 										
									$checker = $paymentSchedule['PaymentSchedule']['approval_status'];
									
									if($checker == '0') {
										echo 
										'<small class="label label-warning"><i class="fa fa-clock-o"></i> Pending for Approval</small>';
									
									}else{
									
										echo 
										'<small class="label label-success"><i class="fa fa-check"></i> Approved</small>';
									}
								?>
							</td>
						</tr>
					</table>
				</div>
				<!-- /.box-body -->
				
				<div class="panel-footer">
						<div class="span12" align="center">
							<?php if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_finance') || ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_administrator'))) {
									$action = 'view';
								} else {
									$action = 'client_view';
								} ?>
							<?php
								echo $this->Html->link($this->Form->button('Back to Payment Advice', array('class'=>'btn btn-primary', 'style'=>'color:#fff;')), array('plugin' => 'members', 'controller' => 'payment_advices', 'action' =>  $action, $paymentSchedule['PaymentAdvice']['id']), array('escape'=>false));
							?>				
						</div>
					</div>
			</div><!-- /.box -->
		</div>
	</div>

</section>