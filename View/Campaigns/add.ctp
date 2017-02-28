<?php
	echo $this->Html->css(array(
            'jquery-ui.css',
        ));
		
	echo $this->Html->script(array(
            'jquery.min',
            'jquery-1.4.2.min.js',
            'jquery-ui.min.js',
		));
?>

<script>
	
	$(function() {
		$( "#CampaignStartDate" ).datepicker({
			changeMonth: true,
			dateFormat: 'dd-mm-yy',
			altFormat: 'mm-dd-yy',
			changeYear: true
		});
	});
  
	function changeDate() {
	
		var extendDate = document.getElementById('CampaignStartDate').value;
		var formatExtendDate = extendDate.split('/');
		
		var y = formatExtendDate[2];
		var m = formatExtendDate[1];
		var d = formatExtendDate[0];
		
		var newExtendDate = new Date(m + '/' + d + '/' + y);
		var period = document.getElementById('period').value;
		
		//Notes: xxxx.format("dd/mm/yyyy") need to attach library file dateFormat.js
		newExtendDate.setMonth(newExtendDate.getMonth() + eval(period));
		document.getElementById("CampaignEndDate").value = newExtendDate.format("dd/mm/yyyy");
	}
	
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
		Add New Campaign
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">My Campaign</a></li>
		<li class="active">Add New Campaign</li>
	</ol>
</section>

<section class="content">
<!-- Custom location sessionFlash -->	
    <div style="margin-left:-14px;">	
        <?php echo $this->Layout->sessionFlash(); ?>
    </div>
<!--./location sessionFlash -->

<?php echo $this->Form->create('Campaign'); ?>
	<?php 
		echo $this->Form->input('id');
		$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
		echo $this->Form->hidden('organization_id', array(
			'label' => 'Organization Id',
			'value' => CakeSession::read('Auth.User.Organization.id'),
		));
	?>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="tab-content">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<?php 
							if ($this->Session->read('Auth.User.Organization.alias') != Configure::read('AMS.role_pride_advertiser')) { // if organization not advertiser. 
								$orgType = $this->requestAction('/pride/organization_types/get_organization_type/'.$this->Session->read('Auth.User.Organization.organization_type_id'));
								$label = $orgType['OrganizationType']['name'];
							
							}
						?>
					<tr>
						<td style="height:40px;width:10%;color:black"><?php echo $label; ?> Name</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php 
								echo $this->Session->read('Auth.User.Organization.name');
							?>
						</td>
					</tr>
					<?php if ($this->Session->read('Auth.User.Organization.alias') != Configure::read('AMS.role_pride_advertiser')) { // if organization not advertiser. ?>
					<tr>
						<td style="height:40px;color:black">Advertiser Name</td>
						<td style="width:30px;">:</td>
						<td style="width:1000px;height:40px;">
							<?php 
								echo $this->Form->input('id');
								$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
								
								echo $this->Form->hidden('organization_id', array(
									'label' => 'Organization Id',
									'value' => CakeSession::read('Auth.User.Organization.id'),
								));
								
								echo $this->Form->input('advertiser_name', array( 
									'type'=>'text',
									'style' => 'width:370px'
								));
							?>
						</td>
					</tr>
					<?php } ?>
					<tr>
						<td style="height:40px;width:11%;color:black">Campaign Name</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php 
								echo $this->Form->input('name', array( 
									'type'=>'text',
									'style' => 'width:370px'
								));	
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">In Charge Date</td>
						<td style="width:30px;">:</td>
						<td style="height:40px;">
							<?php
								echo $this->Form->input('start_date',array(
								   'id' => 'CampaignStartDate',
								   'onkeyup' => 'textLimit(this, 9)',
								   'onkeypress' => 'return isNumber(event)',
								   'type' => 'text',
								   'style' => 'width:150px;'
								));
							?>
							<div style="padding-left:170px;margin-top:-23px;color:red;"><i>(<?php echo Configure::read('AMS.grace_period_note'); ?>)</i></div>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Period</td>
						<td style="width:30px;">:</td>
						<td style="height:40px;">
							<?php 
								
								$category = array(1 => '1 Month', 2 => '2 Months', 3 => '3 Months', 4 => '4 Months', 5 => '5 Months');
								echo $this->Form->input('period', array(
									'id' => 'period',
									'type' => 'select', 
									'options' => $category, 
									'label' => false,
									'onchange' => 'changeDate();',
									'empty' => 'Select Period',
									'style' => 'width:150px;height:25px;'
								)); 
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Out Charge Date</td>
						<td style="width:30px;">:</td>
						<td style="height:40px;padding-top:5px;">
							<?php
								   echo $this->Form->input('end_date',array(
								   'id' => 'CampaignEndDate', 
								   'type' => 'text',
								   'readonly' => 'readonly',
								   'style' => 'width:150px;border:none;'
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