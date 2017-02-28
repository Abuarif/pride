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
		Configure Site/Unit
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">My Campaign</a></li>
		<li class="active">Configure Site/Unit</li>
	</ol>
</section>

<section class="content">
	<!-- Custom location sessionFlash -->	
		<div style="margin-left:-14px;">	
			<?php echo $this->Layout->sessionFlash(); ?>
		</div>
	<!--./location sessionFlash -->

<?php echo $this->Form->create('CampaignOrderDetail'); ?>
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
					<td style="height:40px;width:36%;color:black"><?php echo $label; ?> Name</td>
					<td style="width:30px;">:</td>
					<td colspan="3" style="width:1000px;height:40px;">
						<?php 
							echo $this->Session->read('Auth.User.Organization.name');
						?>
					</td>
				</tr>
				<tr>
					<td style="height:40px;color:black">Site/Unit Type - Available Unit(s) </td>
					<td style="width:30px;">:</td>
					<td colspan="3" style="height:40px;">
						<?php 
							echo $balance;
						?>
					</td>
				</tr>
				<tr>
					<td style="height:40px;color:black">Installation Type</td>
					<td style="width:30px;">:</td>
					<td colspan="3" style="height:40px;">
						<?php 
							echo $this->Form->input('campaign_order_type_id', array( 
								'style' => 'width:370px',
								'empty' => 'Choose your installation type',			
							));
						?>
					</td>
				</tr>
				<tr>
					<td style="height:40px;color:black">How many site/unit do you want to allocate for this campaign?</td>
					<td style="width:30px;">:</td>
					<td colspan="3" style="height:40px;">
						<?php 
							echo $this->Form->input('quantity', array( 
								'onkeyup' => 'textLimit(this, 4)',
								'onkeypress' => 'return isNumber(event)',
								'placeholder' => 'Total site / unit',
								'type'=>'text',
								'value' => $balance,
								'style' => 'width:370px'
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
				$this->Form->button(__d('croogo', 'Allocate'), array('class' => 'btn btn-primary'), array('escape' => false, 'confirm' => __('Are you sure you want to proceed?'))) . '&nbsp;&nbsp;' .
				$this->Form->button(__d('croogo', 'Reset'), array('type'=>'reset', 'class' => 'btn btn-info')).'&nbsp;&nbsp;'.
				$this->Html->link(__d('croogo', 'Cancel'), array('controller' => 'campaigns', 'action' => 'view', $this->request->pass[0]), array('class' => 'btn btn-danger')); 
			?>
		</div>
	  </div>
	</div>
<?php echo $this->Form->end(); ?>
</section>