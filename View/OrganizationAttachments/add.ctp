<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Upload Documentation
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li class="active">Upload Documentation</li>
	</ol>
</section>

<section class="content">
	<!-- Custom location sessionFlash -->
		<div style="margin-left:-14px;">
			<?php echo $this->Layout->sessionFlash(); ?>
		</div>
	<!--./location sessionFlash -->
	
	<?php echo $this->Form->create('OrganizationAttachment', array('type' => 'file')); ?>
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
						  <span class="glyphicon glyphicon-th-list"></span> Tips for upload documents
						</a>
					  </h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse">
					  <div class="panel-body">
						<!-- Company Tips -->
						<div id="description">
						  <div>
							<?php echo $this->element('tips_upload_docs');  ?>
						  </div>
						</div><!-- /Company Tips -->
					  </div>
					</div>
				  </div><!-- end reg tips -->
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
						  <span class="glyphicon glyphicon-th"></span> Upload documents form
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
						<td style="height:40px;width:130px;color:black">Document Type</td>
						<td colspan="3" style="height:40px;width:130px">
							<?php
								echo $this->Form->input('id');
								$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
								echo $this->Form->input('document_reference_id', array(
									'style' => 'width:95%',
								));
							?>
							<button type="button" class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Fill in your file name.">
								<span class="glyphicon glyphicon-info-sign"></span>
							</button>
						</td>
					  </tr>
					  <tr>
						<td style="height:40px;width:130px;color:black">File Upload</td>
						<td colspan="3" style="height:40px;width:130px">
							<?php
								echo $this->Form->input('file', array(
									'type' => 'file', 
								));
							?>
							<button type="button" class="btnInfo" data-toggle="popover" data-trigger="focus" title="Info" data-placement="left" data-content="Upload your file here.">
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
				echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
				$this->Form->button(__d('croogo', 'Upload'), array('class' => 'btn btn-primary')) . '&nbsp;&nbsp;'.
				$this->Form->button(__d('croogo', 'Reset'), array('type'=>'reset', 'class' => 'btn btn-info')). '&nbsp;&nbsp;'.
				$this->Html->link(__d('croogo', 'Cancel'), array('plugin' => 'pride', 'controller' => 'organizations', 'action' => 'upload_documentation',$this->Session->read('Auth.User.organization_id')), array('class' => 'btn btn-danger')) .
				$this->Html->endBox();
			?>
		</div>
	  </div>
	</div>
<?php echo $this->Form->end(); ?>
</section>
