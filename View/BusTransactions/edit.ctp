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
    $( "#StartDate" ).datepicker({
      changeMonth: true,
	  dateFormat: 'dd-mm-yy',
	  altFormat: 'mm-dd-yy',
      changeYear: true
    });
  });
  $(function() {
    $( "#EndDate" ).datepicker({
      changeMonth: true,
	  dateFormat: 'dd-mm-yy',
	  altFormat: 'mm-dd-yy',
      changeYear: true
    });
  });
  
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
		Edit Bus Calendar Details
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">List of Buses Calendar</a></li>
		<li class="active">Edit Bus Calendar Details</li>
	</ol>
</section>

<section class="content">
	<!-- Custom location sessionFlash -->	
		<div style="margin-left:-14px;">	
			<?php echo $this->Layout->sessionFlash(); ?>
		</div>
	<!--./location sessionFlash -->

	<?php echo $this->Form->create('BusTransaction'); ?>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="tab-content">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td style="height:40px;width:11%;color:black">Bus Plate No</td>
						<td style="width:30px;">:</td>
						<td colspan="3" style="width:1000px;height:40px;">
							<?php
								echo $this->Form->input('id');
								$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
								echo $this->Form->input('bus_id', array(
									'style' => 'width:370px'
								));
								
								echo $this->Form->hidden('organization_id', array(
									'value' => $this->Session->read('Auth.User.organization_id'),
								));
								
								echo $this->Form->hidden('user_id', array(
									'value' => $this->Session->read('Auth.User.id'),
								));
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Bus Status</td>
						<td style="width:30px;">:</td>
						<td colspan="3" style="height:40px;">
							<?php
								echo $this->Form->input('bus_status_id', array(
									'style' => 'width:370px'
								));
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Start Date</td>
						<td style="width:30px;">:</td>
						<td style="height:40px;">
							<?php 
								echo $this->Form->input('start_date',array(
								   'id' => 'StartDate', 
								   'type'=>'text',
								   'style' => 'width:370px',
								   'placeholder' => 'Start Date',
								   'onkeyup' => 'textLimit(this, 9)',
								   'onkeypress' => 'return isNumber(event)'
								));
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black;padding-bottom:20px;padding-top:10px;">End Date</td>
						<td style="width:30px;padding-bottom:20px;padding-top:10px;">:</td>
						<td colspan="3" style="height:40px;padding-bottom:20px;padding-top:10px;">
							<?php
								echo $this->Form->input('end_date',array(
								   'id' => 'EndDate', 
								   'type'=>'text',
								   'style' => 'width:370px',
								   'placeholder' => 'End Date',
								   'onkeyup' => 'textLimit(this, 9)',
								   'onkeypress' => 'return isNumber(event)'
								));
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Comments</td>
						<td style="width:30px;">:</td>
						<td colspan="3" style="height:40px;">
							<?php
								echo $this->Form->input('comments', array(
									'style' => 'width:370px;resize: none;',
									'placeholder' => 'Comments'
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
					$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('class' => 'btn btn-danger'));
				?>
			</div>
		</div>
	</div>
	<?php echo $this->Form->end(); ?>
</section>