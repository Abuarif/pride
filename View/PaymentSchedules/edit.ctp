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
	
	function MaskMoney1(evt, allow) {

            if (!(evt.keyCode == 46 || (evt.keyCode >= 48 && evt.keyCode <= 57))) return false;
            var parts = evt.srcElement.value.split('.');
            if (parts.length > 2) return false;
            if (evt.keyCode == 46) return (parts.length == 1);
            if (parts[0].length >= 14) return false;
            if (parts.length == 2 && parts[1].length >= allow) return false;
        }


    function insertcommas(nField) {
        if (/^0/.test(nField.value)) {
            nField.value = nField.value.substring(0, 1);
        }
        if (Number(nField.value.replace(/,/g, ""))) {
            var tmp = nField.value.replace(/,/g, "");
            tmp = tmp.toString().split('').reverse().join('').replace(/(\d{3})/g, '$1,').split('').reverse().join('').replace(/^,/, '');
            if (/\./g.test(tmp)) {
                tmp = tmp.split(".");
                tmp[1] = tmp[1].replace(/\,/g, "").replace(/ /, "");
                nField.value = tmp[0] + "." + tmp[1]
            }
            else {
                nField.value = tmp.replace(/ /, "");
            }
        }
        else {
            nField.value = nField.value.replace(/[^\d\,\.]/g, "").replace(/ /, "");
        }

    }
	
</script>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Edit Payment Schedules
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Payment Advice</a></li>
		<li class="active">Edit Payment Schedules</li>
	</ol>
</section>

<section class="content">
	<!-- Custom location sessionFlash -->
		<div style="margin-left:-14px;">
			<?php echo $this->Layout->sessionFlash(); ?>
		</div>
	<!--./location sessionFlash -->
	
	<?php echo $this->Form->create('PaymentSchedule'); ?>
	<div class="panel panel-default">
	  <div class="panel-body">
		<div class="tab-content">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td style="height:40px;width:10%;color:black">Description</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 
						echo $this->Form->input('id');
						$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
						echo $this->Form->input('description', array(
									//'type' => 'text',
									'placeholder' => 'Key-in your payment description here...',
									//'onKeyPress' => 'return MaskMoney1(event,2)', 
									//'onkeyup' => 'insertcommas(this)',
									'style' => 'width:370px',
								));
					?>
				</td>
			  </tr>
			   <tr>
				<td style="height:40px;width:10%;color:black">Amount (RM)</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 
						echo $this->Form->input('amount', array(
									'type' => 'text',
									'value' => $unallocated,
									'placeholder' => 'Amount Due (RM)',
									//'onKeyPress' => 'return MaskMoney1(event,2)', 
									'onkeyup' => 'insertcommas(this)',
									'style' => 'width:370px',
								));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Due Date</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 
						echo $this->Form->input('due_date', array(
							'id' => 'DueDate', 
							'type'=>'text',
							'style' => 'width:370px',
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
				$this->Form->button(__d('croogo', 'Update'), array('class' => 'btn btn-primary')) . '&nbsp;&nbsp;' .
				$this->Form->button(__d('croogo', 'Reset'), array('type'=>'reset', 'class' => 'btn btn-info')).'&nbsp;&nbsp;'.
				$this->Html->link(__d('croogo', 'Cancel'), array('plugin' => 'members', 'controller' => 'payment_advices', 'action' => 'view', $this->request->data['PaymentAdvice']['id']), array('class' => 'btn btn-danger'));
			?>
		</div>
	  </div>
	</div>

<?php echo $this->Form->end(); ?>
</section>