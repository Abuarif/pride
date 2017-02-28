<script language = 'JavaScript'>
	function textLimit(field, maxlen) 
	{
		if (field.value.length >= maxlen + 1)
			//alert('Your input has been truncated!');
		if (field.value.length > maxlen)
			field.value = field.value.substring(0, maxlen);
	}
	
	function isNumber(evt) 
	{
		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) 
		{
			return false;
		}
		return true;
	}
</script>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Add New Package
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">System Settings</a></li>
		<li class="active">Add New Package</li>
	</ol>
</section>

<section class="content">
	<?php echo $this->Form->create('Package', array('type' => 'file')); ?>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="tab-content">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td style="height:40px;width:20%;color:black">Business Owner</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php 
								echo $this->Form->input('id');
								$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
								echo $this->Form->input('organization_id', array(
									'type'=>'select',
									'style' => 'width:370px'
								));
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Package Item Type</td>
						<td style="width:30px;">:</td>
						<td style="height:40px;">
							<?php
								echo $this->Form->input('item_type_id', array(
									'type' => 'select',
									'empty' => 'Select Package Item Type',
									'style' => 'width:370px;height:25px;'
								));
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Package Name</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php 
								echo $this->Form->input('name', array(
									'type'=>'text',
									'style' => 'width:370px',
									'placeholder' => 'Package Name'
								));
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Package Quantity</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php 
								echo $this->Form->input('quantity', array(
									'type'=>'text',
									'style' => 'width:370px',
									'onkeyup' => 'textLimit(this, 4)',
									'onkeypress' => 'return isNumber(event)',
									'placeholder' => 'Package Quantity'
								));
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Package Paid</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php 
								echo $this->Form->input('paid', array(
									'type'=>'text',
									'style' => 'width:370px',
									'onkeyup' => 'textLimit(this, 4)',
									'onkeypress' => 'return isNumber(event)',
									'placeholder' => 'Package Paid'
								));
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Package Free Of Charge</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php 
								echo $this->Form->input('foc', array(
									'type'=>'text',
									'style' => 'width:370px',
									'onkeyup' => 'textLimit(this, 4)',
									'onkeypress' => 'return isNumber(event)',
									'placeholder' => 'Package Free of Charge'
								));
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Package Duration</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php 
								echo $this->Form->input('duration', array(
									'type'=>'text',
									'style' => 'width:370px',
									'onkeyup' => 'textLimit(this, 4)',
									'onkeypress' => 'return isNumber(event)',
									'placeholder' => 'Package Duration'
								));
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Package Duration Unit</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php 
								echo $this->Form->input('duration_unit', array(
									'type'=>'text',
									'style' => 'width:370px',
									'placeholder' => 'Package Duration Unit'
								));
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px; color:black">Package Price</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php 
								echo $this->Form->input('price', array(
									'type'=>'text',
									'style' => 'width:370px',
									'onkeyup' => 'textLimit(this, 9)',
									'onkeypress' => 'return isNumber(event)',
									'placeholder' => 'Package Price'
								));
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;width:11%;color:black">Package Price Unit</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php 
								echo $this->Form->input('price_unit', array(
									'type'=>'text',
									'style' => 'width:370px',
									'onkeyup' => 'textLimit(this, 9)',
									'onkeypress' => 'return isNumber(event)',
									'placeholder' => 'Package Price Unit'
								));
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;width:11%;color:black">Package Discount</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php 
								echo $this->Form->input('discount', array(
									'type'=>'text',
									'style' => 'width:370px',
									'onkeyup' => 'textLimit(this, 4)',
									'onkeypress' => 'return isNumber(event)',
									'placeholder' => 'Package Discount'
								));
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;width:11%;color:black">Package Production Cost (RM)</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php 
								echo $this->Form->input('production_cost', array(
									'type'=>'text',
									'style' => 'width:370px',
									'onkeyup' => 'textLimit(this, 4)',
									'onkeypress' => 'return isNumber(event)',
									'placeholder' => 'Package Production Cost (RM)'
								));
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Package Image</td>
						<td style="width:30px;">:</td>
						<td style="height:40px;">
							<?php 
								echo $this->Form->input('file', array(
									'type'=>'file'
								));
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Status</td>
						<td style="width:30px;">:</td>
						<td style="height:40px;">
							<?php 
								echo $this->Form->input('status', array(
										'div' => array(
										'style' => 'margin-right:250px;margin-top:10px'
									)
								));
							?>
						</td>
					</tr>
				</table>  
			</div>
		</div>
		<div class="panel-footer">
			<div class="span12" align="center">
				<?php
					echo 
					$this->Form->button(__d('croogo', 'Save'), array('class' => 'btn btn-primary')) . '&nbsp;&nbsp;' .
					$this->Form->button(__d('croogo', 'Reset'), array('type'=>'reset', 'class' => 'btn btn-info')).'&nbsp;&nbsp;'.
					$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('class' => 'btn btn-danger'));
				?>
			</div>
		</div>
	</div>
	<?php echo $this->Form->end(); ?>
</section>