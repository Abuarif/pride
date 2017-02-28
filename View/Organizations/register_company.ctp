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
/*
$this->viewVars['title_for_layout'] = __d('croogo', 'Organizations');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Organizations'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['Organization']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Organizations: ' . $this->data['Organization']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}
*/

echo $this->Form->create('Organization', array('type' => 'file'));

?>

<div class="panel panel-primary">
  <div class="panel-heading" align="center"><h1>Registration</h1></div>
  <div class="panel-body">
	<div class="tab-content">
		<br />
		<ul id="progressbar">
			<li class="active"><b>Step 1 : </b>Company Profile Registration</li>
			<li><b>Step 2 : </b>Upload Company Documents</li>
			<li><b>Step 3 : </b>Advertiser Registration</li>
		</ul>
		<br />
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
				<div id="collapseOne" class="panel-collapse collapse in">
				  <div class="panel-body">
					<textarea id="chatlist" class="mousescroll" cols="150" rows="15" style="text-align:left;resize:none;border:hidden;background-color:white;" disabled="disabled">
						<?php echo $this->element('tips_comp');  ?>
					</textarea>
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
				<div id="collapseTwo" class="panel-collapse collapse">
				  <div class="panel-body">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td colspan="4" style="height:40px;width:130px;text-align:center;color:red;">
							<div class="alert alert-danger" role="alert">
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
								));
							?>
							<button type="button" class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your company name. Example ABDC Coorporation Bhd.">
								<span class="glyphicon glyphicon-info-sign"></span>
							</button>							
						</td>
					  </tr>
					  <tr>
						<td style="height:40px;width:130px;color:black">Company Registration Number</td>
						<td colspan="3" style="height:40px;width:130px">
							<?php
								echo $this->Form->input('roc', array(
									'class' => 'form-control input-sm',
									'placeholder' => 'Company Registration No',
									'size' => '85',
									'style' => 'width:95%',
								));
							?>
							<button type="button" class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your company registration number. Example ABD123-EF2.">
								<span class="glyphicon glyphicon-info-sign"></span>
							</button>
						</td>
					  </tr>
					  <tr>
						<td style="height:40px;width:130px;color:black">Company Address</td>
						<td colspan="3" style="height:40px;width:130px">
							<?php
								echo $this->Form->input('address', array(
									'class' => 'form-control input-sm',
									'placeholder' => 'Street Address Line 1',
									'size' => '85',
									'style' => 'width:95%',
								));
							?>
							<button type="button" class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your company full address.">
								<span class="glyphicon glyphicon-info-sign"></span>
							</button>
						</td>
					  </tr>
					  <tr>
						<td style="height:40px;width:130px">&nbsp;</td>
						<td colspan="2" style="height:40px;width:130px">
							<?php
								echo $this->Form->input('address2', array(
									'class' => 'form-control input-sm',
									'placeholder' => 'Street Address Line 2',
									'size' => '85',
									'style' => 'width:95%',
								));
							?>
						</td>
					  </tr>
					  <tr>
						<td style="height:40px;width:130px">&nbsp;</td>
						<td colspan="2" style="height:40px;width:130px">
							<?php
								echo $this->Form->input('address3', array(
									'class' => 'form-control input-sm',
									'placeholder' => 'Street Address Line 3',
									'size' => '85',
									'style' => 'width:95%',
								));
							?>
						</td>
					  </tr>
					  <tr>
						<td style="height:40px;width:130px">&nbsp;</td>
						<td style="height:40px;width:130px">
							<?php
								echo $this->Form->input('town', array(
									'class' => 'form-control input-sm',
									'placeholder' => 'City',
									'size' => '30',
									'style' => 'width:90%',
								));
							?>
						</td>
						<td style="height:40px;width:130px">
							<?php
								echo $this->Form->input('state', array(
									'class' => 'form-control input-sm',
									'placeholder' => 'State / Province',
									'size' => '30',
									'style' => 'width:90%',
								));
							?>
						</td>
					  </tr>
					  <tr>
						<td style="height:40px;width:130px"></td>
						<td style="height:40px;width:130px">
							<?php
								echo $this->Form->input('postcode', array(
									'onkeyup' => 'textLimit(this, 5)',
									'onkeypress' => 'return isNumber(event)',
									'class' => 'form-control input-sm',
									'placeholder' => 'Postal / Zip Code',
									'size' => '30',
									'style' => 'width:90%',
								));
							?>
						</td>
						<td style="height:40px;width:130px">
							<?php
								echo $this->Form->input('country', array(
									'class' => 'form-control input-sm',
									'placeholder' => 'Country',
									'size' => '30',
									'style' => 'width:90%',
								));
							?>
						</td>
					  </tr>
					  <tr>
						<td style="height:40px;width:130px;color:black">Mobile Phone Number</td>
						<td colspan="3" style="height:40px;width:130px">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td style="width:11%">
									<input type="text" size="8" class="form-control input-sm" placeholder="Area Code" style="width:100%;"/>
								</td>
								<td style="width:3%;text-align:center">&#8212;</td>
								<td style="width:93%">
									<input name="" type="text" size="45" class="form-control input-sm" placeholder="Mobile No" style="width:94%" />
									<button type="button" class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your area code and mobile phone number. Example : Area Code (+60), Mobile Phone Number (12 3456789)">
										<span class="glyphicon glyphicon-info-sign"></span>
									</button>
								</td>
							  </tr>
							</table>
						</td>
					  </tr>
					  <tr>
						<td style="height:40px;width:130px;color:black">Office Phone Number</td>
						<td colspan="3" style="height:40px;width:130px">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td style="width:11%">
									<input type="text" size="8" class="form-control input-sm" placeholder="Area Code" style="width:100%;"/>
								</td>
								<td style="width:3%;text-align:center">&#8212;</td>
								<td style="width:90%">
									<?php
										echo $this->Form->input('contact_number', array(
											'class' => 'form-control input-sm',
											'placeholder' => 'Office No',
											'size' => '45',
											'style' => 'width:94%',
										));
									?>
									<button type="button" class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your area code and office phone number. Example : Area Code (+60), Office Phone Number (12 3456789)">
										<span class="glyphicon glyphicon-info-sign"></span>
									</button>
								</td>
							  </tr>
							</table>
						</td>
					  </tr>
					  <tr>
						<td style="height:40px;width:130px;color:black">Fax Number</td>
						<td colspan="3" style="height:40px;width:130px">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td style="width:11%">
									<input type="text" size="8" class="form-control input-sm" placeholder="Area Code" style="width:100%;"/>
								</td>
								<td style="width:3%;text-align:center">&#8212;</td>
								<td style="width:90%">
									<input name="" type="text" size="45" class="form-control input-sm" placeholder="Fax No" style="width:94%" />
									<button type="button" class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your area code and fax number. Example : Area Code (+60), Fax Number (12 3456789)">
										<span class="glyphicon glyphicon-info-sign"></span>
									</button>
								</td>
							  </tr>
							</table>
						</td>
					  </tr>
					   <tr>
						<td style="height:40px;width:130px;color:black">Company Website</td>
						<td colspan="3" style="height:40px;width:130px">
							<?php
								echo $this->Form->input('website', array(
									'class' => 'form-control input-sm',
									'placeholder' => 'Company website address',
									'size' => '85',
									'style' => 'width:95%',
								));
							?>
							<button type="button" class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your area company website address. Example : http:///www.abdc.com.my/corporate">
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
								));
							?>
							<button type="button" class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your corporate contact person name.">
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
								));
							?>
							<button type="button" class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your corporate e-mail. Example : sales@abde.com.my">
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
	<div class="span12" align="right">
		<?php
			echo
				$this->Form->button(__d('croogo', 'Reset'), array('type'=>'reset', 'class' => 'btn btn-danger', 'style'=>'outline:none')).'&nbsp;&nbsp;'.
				$this->Form->button(__d('croogo', 'Next'), array('class' => 'btn btn-primary'));
				//$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('class' => 'btn btn-danger')) ;
		?>
		</div>
  </div>
</div>
	
<?php echo $this->Form->end(); ?>
