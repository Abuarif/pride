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

<script>
  $(function() {
    $( "#ValidityStartDate" ).datepicker({
      changeMonth: true,
	  dateFormat: 'dd-mm-yy',
	  altFormat: 'mm-dd-yy',
      changeYear: true
    });
  });
  $(function() {
    $( "#ValidityEndDate" ).datepicker({
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
		Add Discounted Rate
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">My Organization</a></li>
		<li class="active">Add Discounted Rate</li>
	</ol>
</section>

<section class="content">
<?php echo $this->Form->create('OrganizationDiscount'); ?>
	<div class="panel panel-default">
	  <div class="panel-body">
		<div class="tab-content">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td style="height:40px;width:20%;color:black">Discounted Rate (%)</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 
						echo $this->Form->input('id');
						$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
						echo $this->Form->hidden('organization_id', array(
							'label' => 'Organization Id',
							'value' => $this->request->pass[0],
						));
						echo $this->Form->hidden('user_id', array(
							'label' => 'Organization Id',
							'value' => $this->Session->read('Auth.User.id'),
						));
						echo $this->Form->input('rate', array( 
							'type' => 'text',
							'placeholder' => 'Discounted Rate (%)',
							'onkeyup' => 'textLimit(this, 2)',
							'onkeypress' => 'return isNumber(event)',
							'style' => 'width:370px',
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Validity Start Date</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->input('validity_start_date',array(
						   'id' => 'ValidityStartDate', 
						   'placeholder' => 'Start Date',
						   'type'=>'text',
						   'onkeyup' => 'textLimit(this, 9)',
						   'onkeypress' => 'return isNumber(event)',
						   'style' => 'width:370px',
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Validity End Date</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->input('validity_end_date',array(
						   'id' => 'ValidityEndDate', 
						   'placeholder' => 'End Date',
						   'type'=>'text',
						   'onkeyup' => 'textLimit(this, 9)',
						   'onkeypress' => 'return isNumber(event)',
						   'style' => 'width:370px',
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Apply this discount</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->checkbox('status', array(
							'default' => 0,
							//'style' => 'width:90%',
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
				$this->Html->link('Cancel', $this->request->referer(), array('escape'=>false, 'class'=>'btn btn-danger', 'style'=>'color:#fff;')); 
			?>
		</div>
	  </div>
	</div>
<?php echo $this->Form->end(); ?>
</section>

