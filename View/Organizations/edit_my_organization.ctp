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
	
	$(function() {
		$( "#CompanyStartDate" ).datepicker({
		  changeMonth: true,
		  dateFormat: 'dd-mm-yy',
		  altFormat: 'mm-dd-yy',
		  changeYear: true,
		  setDate: new Date(),
		  autoclose: true,
		});
	});
	 
</script>

<script language = 'JavaScript'>
	
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
		Register Company
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li class="active">Register Company</li>
	</ol>
</section>

<section class="content">
	<!-- Custom location sessionFlash -->	
    <div style="margin-left:-14px;">	
        <?php echo $this->Layout->sessionFlash(); ?>
    </div>
	<!--./location sessionFlash -->
		
	<?php echo $this->Form->create('Organization', array('type' => 'file')); ?>
	
	<div class="panel panel-default">
	 <!-- <div class="panel-heading">
		<div style="font-size:20px;color:#FFFFFF">Company Profile</div>
	 </div> -->
	 <div class="panel-body">
		<div class="tab-content">
			<!-- Tips Section -->
				<div class="panel-group" id="accordion">
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
						  <span class="glyphicon glyphicon-th-list"></span> Tips for company profile registration
						</a>
					  </h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse">
					  <div class="panel-body">
						<!-- Company Tips -->
						<div id="description">
						  <div>
							<?php echo $this->element('tips_comp');  ?>
						  </div>
						</div><!-- /Company Tips -->
					  </div>
					</div>
				  </div><!-- end reg tips -->
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
						  <span class="glyphicon glyphicon-th"></span> Registration form
						</a>
					  </h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse in">
					  <div class="panel-body">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td colspan="4" style="height:40px;width:130px;text-align:center;color:red;">
								<div class="alert alert-danger" role="alert" style="margin-left:0;">
								  <strong><span class="glyphicon glyphicon-asterisk"></span> All fields are mandatory.</strong>
								</div>
							</td>
						  </tr>
						  <tr>
							<td style="height:40px;width:130px;color:black">Company Name</td>
							<td colspan="3" style="height:40px;width:130px">
								<?php
									echo $this->Form->input('id');
									$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
									echo $this->Form->input('name', array(
										'class' => 'form-control input-sm',
										'placeholder' => 'Company Name',
										'size' => '85',
										'style' => 'width:95%',
										'value' => $this->Session->read('Auth.User.Organization.name'),
										'tabindex' => '1'
									));
								?>
								<button type="button" class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your company name. Example ABDC Coorporation Bhd.">
									<span class="glyphicon glyphicon-info-sign"></span>
								</button>							
							</td>
						  </tr>
						  <tr>
							<td style="height:40px;width:130px;color:black">Company Registration Date</td>
							<td colspan="3" style="height:40px;width:130px">
								<?php
									
								/*if (empty($this->request->data['Organization']['registered_date'])) {
									$bgcolor = 'background-color:#FAFAD2';
									$reg_date = '';
								}else{
									$bgcolor = '';
									$reg_date = $this->request->data['Organization']['registered_date'];
								}*/
									
									($this->request->data['Organization']['registered_date'] == '' ? $bgcolor = ';background-color:#FAFAD2':$bgcolor = '');
									echo $this->Form->input('registered_date', array(
										'class' => 'form-control input-sm',
										'onkeyup' => 'textLimit(this, 10)',
										'onkeypress' => 'return isNumber(event)',
										'placeholder' => 'Company registration date',
										'style' => 'width:95%'.$bgcolor,
										'id' => 'CompanyStartDate',
										'type'=>'text',
										//'value' => date("d/m/Y"),
										//'value' => $reg_date,
										'tabindex' => '3'
									));
									
								?>
								<button type="button" tabindex='2' class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your company registration date. Example : 04/23/2014">
									<span class="glyphicon glyphicon-info-sign"></span>
								</button>
							</td>
						  </tr>
						  <tr>
							<td style="height:40px;width:130px;color:black">Company Registration Number</td>
							<td colspan="3" style="height:40px;width:130px">
								<?php
									($this->request->data['Organization']['roc'] == '' ? $bgcolor = ';background-color:#FAFAD2':$bgcolor = '');
									echo $this->Form->input('roc', array(
										'class' => 'form-control input-sm',
										'placeholder' => 'Company Registration No',
										'size' => '85',
										'style' => 'width:95%'.$bgcolor,
										'tabindex' => '5'
									));
								?>
								<button type="button" tabindex='4' class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your company registration number. Example ABD123-EF2.">
									<span class="glyphicon glyphicon-info-sign"></span>
								</button>
							</td>
						  </tr>
						  <tr>
							<td style="height:40px;width:130px;color:black">Company Address</td>
							<td colspan="3" style="height:40px;width:130px">
								<?php
									($this->request->data['Organization']['address'] == '' ? $bgcolor = ';background-color:#FAFAD2':$bgcolor = '');
									echo $this->Form->input('address', array(
										'class' => 'form-control input-sm',
										'placeholder' => 'Street Address Line 1',
										'size' => '85',
										'style' => 'width:95%'.$bgcolor,
										'tabindex' => '7'
									));
								?>
								<button type="button" tabindex='6' class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your company full address.">
									<span class="glyphicon glyphicon-info-sign"></span>
								</button>
							</td>
						  </tr>
						  <tr>
							<td style="height:40px;width:130px">&nbsp;</td>
							<td colspan="2" style="height:40px;width:130px">
								<?php
									($this->request->data['Organization']['address2'] == '' ? $bgcolor = ';background-color:#FAFAD2':$bgcolor = '');
									echo $this->Form->input('address2', array(
										'class' => 'form-control input-sm',
										'placeholder' => 'Street Address Line 2',
										'size' => '85',
										'style' => 'width:95%'.$bgcolor,
										'tabindex' => '8'
									));
								?>
							</td>
						  </tr>
						  <tr>
							<td style="height:40px;width:130px">&nbsp;</td>
							<td colspan="2" style="height:40px;width:130px">
								<?php
									($this->request->data['Organization']['address3'] == '' ? $bgcolor = ';background-color:#FAFAD2':$bgcolor = '');
									echo $this->Form->input('address3', array(
										'class' => 'form-control input-sm',
										'placeholder' => 'Street Address Line 3',
										'size' => '85',
										'style' => 'width:95%'.$bgcolor,
										'tabindex' => '9'
									));
								?>
							</td>
						  </tr>
						  <tr>
							<td style="height:40px;width:130px">&nbsp;</td>
							<td style="height:40px;width:130px">
								<?php
									($this->request->data['Organization']['town'] == '' ? $bgcolor = ';background-color:#FAFAD2':$bgcolor = '');
									echo $this->Form->input('town', array(
										'class' => 'form-control input-sm',
										'placeholder' => 'City',
										'size' => '30',
										'style' => 'width:90%'.$bgcolor,
										'tabindex' => '10'
									));
								?>
							</td>
							<td style="height:40px;width:130px">
								<?php
									($this->request->data['Organization']['state'] == '' ? $bgcolor = ';background-color:#FAFAD2':$bgcolor = '');
									echo $this->Form->input('state', array(
										'class' => 'form-control input-sm',
										'placeholder' => 'State / Province',
										'size' => '30',
										'style' => 'width:90%'.$bgcolor,
										'tabindex' => '11'
									));
								?>
							</td>
						  </tr>
						  <tr>
							<td style="height:40px;width:130px"></td>
							<td style="height:40px;width:130px">
								<?php
									($this->request->data['Organization']['postcode'] == 0 ? $bgcolor = ';background-color:#FAFAD2':$bgcolor = '');
									echo $this->Form->input('postcode', array(
										'type' => 'text',
										'onkeyup' => 'textLimit(this, 5)',
										'onkeypress' => 'return isNumber(event)',
										'class' => 'form-control input-sm',
										'placeholder' => 'Postal / Zip Code',
										'size' => '30',
										'style' => 'width:90%'.$bgcolor,
										'tabindex' => '12'
									));
								?>
							</td>
							<td style="height:40px;width:130px">
								<?php
									($this->request->data['Organization']['country'] == '' ? $bgcolor = ';background-color:#FAFAD2':$bgcolor = '');
									echo $this->Form->input('country', array(
										'class' => 'form-control input-sm',
										'placeholder' => 'Country',
										'size' => '30',
										'style' => 'width:90%'.$bgcolor,
										'tabindex' => '13'
									));
								?>
							</td>
						  </tr>
						  <tr>
							<td style="height:40px;width:130px;color:black">Office Phone Number</td>
							<td colspan="3" style="height:40px;width:130px">
								<?php
									echo $this->Form->input('contact_number', array(
										'onkeyup' => 'textLimit(this, 10)',
										'onkeypress' => 'return isNumber(event)',
										'class' => 'form-control input-sm',
										'placeholder' => 'Office No',
										'size' => '45',
										'style' => 'width:95%',
										'tabindex' => '15'
									));
								?>
								<button type="button" tabindex='14' class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your area code and office phone number. Example : Area Code (+60), Office Phone Number (12 3456789)">
									<span class="glyphicon glyphicon-info-sign"></span>
								</button>
							</td>
						  </tr>
						  <tr>
							<td style="height:40px;width:130px;color:black">Fax Number</td>
							<td colspan="3" style="height:40px;width:130px">
								<?php
									echo $this->Form->input('fax_number', array(
										'onkeyup' => 'textLimit(this, 10)',
										'onkeypress' => 'return isNumber(event)',
										'class' => 'form-control input-sm',
										'placeholder' => 'Fax No',
										'size' => '45',
										'style' => 'width:95%',
										'tabindex' => '17'
									));
								?>
								<button type="button" tabindex='16' class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your area code and fax number. Example : Area Code (+60), Fax Number (12 3456789)">
									<span class="glyphicon glyphicon-info-sign"></span>
								</button>
							</td>
						  </tr>
						   <tr>
							<td style="height:40px;width:130px;color:black">Company Website</td>
							<td colspan="3" style="height:40px;width:130px">
								<?php
									($this->request->data['Organization']['website'] == '' ? $bgcolor = ';background-color:#FAFAD2':$bgcolor = '');
									echo $this->Form->input('website', array(
										'class' => 'form-control input-sm',
										'placeholder' => 'Company website address',
										'size' => '85',
										'style' => 'width:95%'.$bgcolor,
										'tabindex' => '19'
									));
								?>
								<button type="button" tabindex='18' class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your area company website address. Example : http:///www.abdc.com.my/corporate">
									<span class="glyphicon glyphicon-info-sign"></span>
								</button>
							</td>
						  </tr>
						  <tr>
							<td style="height:40px;width:130px;color:black">Corporate Contact Person</td>
							<td colspan="3" style="height:40px;width:130px">
								<?php
									echo $this->Form->input('contact_person', array(
										'class' => 'form-control input-sm',
										'placeholder' => 'Corporate Contact Person',
										'size' => '85',
										'style' => 'width:95%',
										'tabindex' => '21'
									));
								?>
								<button type="button" tabindex='20' class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your corporate contact person name.">
									<span class="glyphicon glyphicon-info-sign"></span>
								</button>
							</td>
						  </tr>
						  <tr>
							<td style="height:40px;width:130px;color:black">Corporate Email</td>
							<td colspan="3" style="height:40px;width:130px">
								<?php
									echo $this->Form->input('contact_email', array(
										'class' => 'form-control input-sm',
										'placeholder' => 'Corporate Email',
										'size' => '85',
										'style' => 'width:95%',
										'tabindex' => '23'
									));
								?>
								<button type="button" tabindex='22' class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your corporate e-mail. Example : sales@abde.com.my">
									<span class="glyphicon glyphicon-info-sign"></span>
								</button>
							</td>
						  </tr>
						  <tr>
							<td style="height:40px;width:130px;color:black">Paid Up Capital (RM)</td>
							<td colspan="3" style="height:40px;width:130px">
								<?php
									$value = '';
									if (!empty($this->request->data['Organization']['paid_capital'])) {
										$value = $this->Number->currency($this->request->data['Organization']['paid_capital'], '');
									}
									
									($this->request->data['Organization']['paid_capital'] == 0.00 ? $bgcolor = ';background-color:#FAFAD2':$bgcolor = '');
									echo $this->Form->input('paid_capital', array(
										'type' => 'text',
										'class' => 'form-control input-sm',
										'placeholder' => 'Company Paid Up Capital',
										'onKeyPress' => 'return MaskMoney1(event,2)', 
										'onkeyup' => 'insertcommas(this)',
										'size' => '85',
										'value' => $value,
										'style' => 'width:95%'.$bgcolor,
										'tabindex' => '25'
									));
								?>
								<button type="button" tabindex='24' class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your corporate paid-up capital.">
									<span class="glyphicon glyphicon-info-sign"></span>
								</button>
							</td>
						  </tr>
						  <tr>
							<td style="height:40px;width:130px;color:black">Authorized Capital (RM)</td>
							<td colspan="3" style="height:40px;width:130px">
								<?php
									$value = '';
									if (!empty($this->request->data['Organization']['authorized_capital'])) {
										$value = $this->Number->currency($this->request->data['Organization']['authorized_capital'], '');
									}
									
									($this->request->data['Organization']['authorized_capital'] == 0.00 ? $bgcolor = ';background-color:#FAFAD2':$bgcolor = '');
									echo $this->Form->input('authorized_capital', array(
										'type' => 'text',
										'onKeyPress' => 'return MaskMoney1(event,2)', 
										'onkeyup' => 'insertcommas(this)',
										'class' => 'form-control input-sm',
										'placeholder' => 'Company Authorized Capital',
										'size' => '85',
										'style' => 'width:95%'.$bgcolor,
										'value' => $value,
										'tabindex' => '27'
									));
								?>
								<button type="button" tabindex='26' class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your corporate authorized capital.">
									<span class="glyphicon glyphicon-info-sign"></span>
								</button>
							</td>
						  </tr>
						  <tr>
							<td style="height:40px;width:130px;color:black">Number of Staffs (excluding Directors)</td>
							<td colspan="3" style="height:40px;width:130px">
								<?php
									($this->request->data['Organization']['staffs'] == 0? $bgcolor = ';background-color:#FAFAD2':$bgcolor = '');
									echo $this->Form->input('staffs', array(
										'type' => 'text',
										'class' => 'form-control input-sm',
										'onkeyup' => 'textLimit(this, 4)',
										'onkeypress' => 'return isNumber(event)',
										'placeholder' => 'Company Number of Staffs',
										'size' => '85',
										'style' => 'width:95%'.$bgcolor,
										'tabindex' => '29'
									));
								?>
								<button type="button" tabindex='28' class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your number of staffs excluding those Directors.">
									<span class="glyphicon glyphicon-info-sign"></span>
								</button>
							</td>
						  </tr>
						</table>
					  </div>
					</div>
				  </div>
				</div>
			<!-- End tips section -->
			
		</div>
	  </div>
	  <div class="panel-footer">
		<div class="span12" align="center">
			<?php
				echo
					$this->Form->button(__d('croogo', 'Next'), array('class' => 'btn btn-primary')).'&nbsp;&nbsp;'.
					$this->Form->button(__d('croogo', 'Reset'), array('type'=>'reset', 'class' => 'btn btn-info')).'&nbsp;&nbsp;'.
					$this->Html->link(__d('croogo', 'Cancel'), array('plugin' => 'members', 'controller' => 'members', 'action' => 'index'), array('class' => 'btn btn-danger'));
			?>
			</div>
	  </div>
	</div>
		
	<?php echo $this->Form->end(); ?>
</section>