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
    $( "#completedDate" ).datepicker({
      changeMonth: true,
	  dateFormat: 'dd-mm-yy',
	  altFormat: 'mm-dd-yy',
      changeYear: true
    });
  });
  
  $(function() {
    $( "#puspakomDate" ).datepicker({
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
		Update Job
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Job Listing Details</a></li>
		<li class="active">Update Job</li>
	</ol>
</section>

<section class="content">
	<!-- Custom location sessionFlash -->	
		<div style="margin-left:-14px;">	
			<?php echo $this->Layout->sessionFlash(); ?>
		</div>
	<!--./location sessionFlash -->
	
	<?php echo $this->Form->create('JobTask', array('type' => 'file')); ?>
	<div class="panel panel-default">
	  <div class="panel-body">
		<div class="tab-content">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td style="height:40px;width:16%;color:black">Completed Date</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 
						echo $this->Form->input('id');
						$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
						echo $this->Form->input('installation_date', array(
							'type' => 'text',
							'id' => 'completedDate',
							'style' => 'width:200px;',
							'placeholder' => 'Completed Date',
							'onkeyup' => 'textLimit(this, 9)',
							'onkeypress' => 'return isNumber(event)',
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Puspakom Date</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->input('puspakom_date', array(
							'type' => 'text',
							'id' => 'puspakomDate',
							'style' => 'width:200px;',
							'placeholder' => 'Puspakom Date'
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Upload Installation Form</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->input('file', array(
									'type' => 'file', 
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:180px;color:black">Comment</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->input('notes', array(
							'style' => 'width:45.5%;height:150px;margin-top:-10px;resize: none;',
							'placeholder' => 'Comment'
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
				$this->Html->link(__d('croogo', 'Cancel'), $this->request->referer().'#tab_2-2', array('class' => 'btn btn-danger'));
			?>
		</div>
	  </div>
	</div>
	<?php echo $this->Form->end(); ?>
</section>