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
		Shareholder Declaration
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li class="active">Shareholder Declaration</li>
	</ol>
</section>

<section class="content">
	<?php echo $this->Form->create('OrganizationShareholder'); ?>
	<div class="panel panel-default">
	 <div class="panel-body">
		<div class="tab-content">
			<!-- Tips Section -->
				<div class="panel-group" id="accordion">
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
						  <span class="glyphicon glyphicon-th-list"></span> Tips for Shareholder Declaration Form
						</a>
					  </h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse">
					  <div class="panel-body">
						<!-- Company Tips -->
						<div id="description">
						  <div>
							<?php echo $this->element('tips_shareholders');  ?>
						  </div>
						</div><!-- /Company Tips -->
					  </div>
					</div>
				  </div><!-- end reg tips -->
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
						  <span class="glyphicon glyphicon-th"></span> Shareholder Declaration Form
						</a>
					  </h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse in">
						<div class="panel-body">			
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td colspan="4" style="height:40px;width:120px;text-align:center;color:red;">
										<div class="alert alert-danger" role="alert" style="margin-left:0;">
										  <strong><span class="glyphicon glyphicon-asterisk"></span> All fields are mandatory.</strong>
										</div>
									</td>
								</tr>
								<tr>
									<td style="height:40px;width:120px;color:black">Full Name</td>
									<td colspan="3" style="height:40px;width:130px">
										<?php
											echo $this->Form->input('id');
											$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
											echo $this->Form->input('name', array(
												'placeholder' => 'Full Name',
												'size' => '85',
												'style' => 'width:95%',
												'tabindex' => '1'
											));
										?>
										<button type="button" tabindex = '2' class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Please provide full name as in Identity Card or Passport">
											<span class="glyphicon glyphicon-info-sign"></span>
										</button>							
									</td>
								</tr>
								<tr>
									<td style="height:40px;width:130px;color:black">MyKad / Passport Number / MyCoID</td>
									<td colspan="3" style="height:40px;width:130px">
										<?php
											echo $this->Form->input('nric', array(
												'onkeyup' => 'textLimit(this, 12)',
												'placeholder' => 'MyKad / Passport Number / MyCoID',
												'style' => 'width:31%',
												'tabindex' => '4'
											));
										?>
										<button type="button" tabindex = '3' class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Key in your MyKad / Passport number / MyCoID. Example : 711210014344">
											<span class="glyphicon glyphicon-info-sign"></span>
										</button>
									</td>
								</tr>
								<tr>
									<td style="height:40px;width:130px;color:black">Role in the company</td>
									<td style="height:40px;width:130px">
										<?php
											echo $this->Form->input('is_director', array(
												'label' => '&nbsp;&nbsp;Director',
												'tabindex' => '6'
											));
										?>
									</td>
									<td style="height:40px;width:130px">
										<?php
											echo $this->Form->input('is_shareholder', array(
												'label' => '&nbsp;&nbsp;Shareholder',
												'tabindex' => '7'
											));
										?>
									</td>
									<td style="height:40px;width:130px">
										<?php
											echo $this->Form->input('is_active_personal', array(
												'label' => '&nbsp;&nbsp;Active Personnel',
												'tabindex' => '8'
											));
										?>
										<button type="button" tabindex = '5' class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Tick on one or more roles as applicable.">
											<span class="glyphicon glyphicon-info-sign"></span>
										</button>
									</td>
								</tr>
								<tr>
									<td style="height:40px;width:130px;color:black">Number of Shares Allotted (RM)</td>
									<td colspan="3" style="height:40px;width:130px">
										<?php
											echo $this->Form->input('shareholding', array(
												'type' => 'text',
												'placeholder' => 'Number of Shares Allotted (RM)',
												'onKeyPress' => 'return MaskMoney1(event,2)', 
												'onkeyup' => 'insertcommas(this)',
												'style' => 'width:27%',
											));
											
											echo $this->Form->hidden('balance', array(
												'type' => 'text',
												'value' => $balance,
												'placeholder' => 'Number of Shares Allotted (RM)',
												'tabindex' => '10'
											));
										?>
										<button type="button" tabindex = '9' class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Key in the number of shares allotted based on the Paid-Up Capital (<?php echo $this->Number->currency($this->Session->read('Auth.User.Organization.paid_capital'), 'RM'); ?>)">
											<span class="glyphicon glyphicon-info-sign"></span>
										</button>
									</td>
								</tr>
								<tr>
									<td style="height:40px;width:130px;color:black">Your Balance Paid Up Capital</td>
									<td colspan="3" style="height:40px;width:130px">
										<?php
											echo $this->Number->currency($balance, 'RM').'/'.$this->Number->currency($this->Session->read('Auth.User.Organization.paid_capital'), 'RM');
										?>
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
	  <!-- Custom location sessionFlash -->
			<div style="margin-left:2px;width:98%">
				<?php echo $this->Layout->sessionFlash(); ?>
			</div>
		<!--./location sessionFlash -->
		
	  <div class="panel-footer">
		<div class="span12" align="center">
			<?php
				echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
				$this->Form->button(__d('croogo', 'Save'), array('class' => 'btn btn-primary')) . '&nbsp;&nbsp;'.
				$this->Form->button(__d('croogo', 'Reset'), array('type'=>'reset', 'class' => 'btn btn-info')). '&nbsp;&nbsp;'.
				$this->Html->link(__d('croogo', 'Cancel'), array('plugin' => 'pride', 'controller' => 'organizations', 'action' => 'declare_shareholder',$this->Session->read('Auth.User.organization_id')), array('class' => 'btn btn-danger')) .
				$this->Html->endBox();
			?>
		</div>
	  </div>
	</div>
<?php echo $this->Form->end(); ?>
</section>

