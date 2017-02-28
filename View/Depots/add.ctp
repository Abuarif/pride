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
		New Depot
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">System Settings</a></li>
		<li class="active">New Depot</li>
	</ol>
</section>

<section class="content">
	<?php echo $this->Form->create('Depot'); ?>
	<div class="panel panel-default">
	  <div class="panel-body">
		<div class="tab-content">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td style="height:40px;width:11%;color:black">Depot</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 
						echo $this->Form->input('id');
						$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
						echo $this->Form->hidden('organization_id', array(
							'label' => 'Organization Id',
							'value' => CakeSession::read('Auth.User.Organization.id'),
						));
						echo $this->Form->input('name', array( 
							'type'=>'text',
							'style' => 'width:370px',
							'placeholder' => 'Depot Name'
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Depot Number</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->input('depot_number', array(
							'style' => 'width:370px',
							'onkeyup' => 'textLimit(this, 4)',
							'onkeypress' => 'return isNumber(event)',
							'placeholder' => 'Depot Number'
						));
					?>
				</td>
			  </tr>
			  <!-- ../temporary closed
			  <tr>
				<td style="height:40px;color:black">Status</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->input('status');
					?>
				</td>
			  </tr>
			  ../temporary closed -->
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