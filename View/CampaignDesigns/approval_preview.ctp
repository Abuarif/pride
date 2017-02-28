<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Design Approval Preview
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Visuals</a></li>
		<li class="active">Design Approval Preview</li>
	</ol>
</section>

<section class="content">
	<!-- Multiple Tab -->
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab_1-1" data-toggle="tab">Details</a></li>
			<li class=""><a href="#tab_2-2" data-toggle="tab">Design</a></li>
			<li class=""><a href="#tab_3-3" data-toggle="tab">Download</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="tab_1-1">
				<div class="box box-primary">
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover">
							<tr>
								<th style="width:130px;">Campaign Name</th>
								<td style="width:30px;">:</td>
								<td>
									<?php 
										echo $this->Html->link($campaignDesign['Campaign']['name'], array('controller' => 'campaigns', 'action' => 'view', $campaignDesign['Campaign']['id'])); 
									?>
								</td>
							</tr>
							<tr>
								<th>Visual Name</th>
								<td>:</td>
								<td>
									<?php echo h($campaignDesign['CampaignDesign']['name']); ?>
								</td>
							</tr>
							<tr>
								<th>Tag Code</th>
								<td>:</td>
								<td>
									<?php 
										if(!empty($campaignDesign['CampaignDesign']['tag_code'])) {
											echo h($campaignDesign['CampaignDesign']['tag_code']); 
										}else{
											echo '<small class="label label-danger"><i class="fa fa-check-square-o"></i> Pending for Approval</small>';
										}
									?>
								</td>
							</tr>
							<?php if($campaignDesign['CampaignDesignApproval']['0']['updated'] != 				$campaignDesign['CampaignDesignApproval']['0']['created']) { ?>
							<tr>
								<th>Comment</th>
								<td>:</td>
								<td>
									<?php 
										echo $campaignDesign['CampaignDesignApproval'][0]['comments'];
									?>
								</td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div><!-- /.tab-pane -->
			<div class="tab-pane" id="tab_2-2">
				<div class="box box-danger">
					<div class="box-body table-responsive no-padding">
						<?php if (!empty($campaignDesign['CampaignDesign']['files'])) { ?>
							<table class="table table-hover">
								<tr>
									<td style="text-align:center;width:100%;height:30px;">
										<?php	echo $this->Html->image("../attachments/".$campaignDesign['CampaignDesign']['files'], array('height'=> '400', 'width'=>'500'),array('style' => 'float:right'));?>
									</td>
								</tr>
								<!--/.temporary closed 
								<tr>
									<td style="text-align:center;width:100%;height:30px;">
										<?php echo 'Caption : ' . h($campaignDesign['CampaignDesign']['files']); ?>
									</td>
								</tr>
								/.temporary closed-->
							</table>
							
						<?php }else{ ?>
			
							<table class="table table-hover">
									<tr>
										<td>
											<br />
											<div class="alert alert-warning alert-dismissable">
												<i class="fa fa-info"></i>
												No design images are available.
											</div>
										</td>
									</tr>
							</table>
							
						<?php } ?>
					</div>
				</div>
			</div><!-- /.tab-pane -->
			<div class="tab-pane" id="tab_3-3">
				<div class="box box-success">
					<div class="box-body table-responsive no-padding">
						<?php if (!empty($campaignDesign['CampaignDesign']['src_files'])) { ?>
							
							<table class="table table-hover">
									<tr>
										<td>
											<br />
											<div class="alert alert-success alert-dismissable">
												<i class="fa fa-cloud-download"></i>
												<?php	
													echo $this->Html->link(__('CLICK HERE TO DOWNLOAD'), "/attachments/".$campaignDesign['CampaignDesign']['src_files'], array('style' => 'font-size:16px;color:green;', 'target' => '_blank', 'escape'=>false)); 
												?>
											</div>
										</td>
									</tr>
							</table>							
							
						<?php }else{ ?>
			
							<table class="table table-hover">
									<tr>
										<td>
											<br />
											<div class="alert alert-success alert-dismissable">
												<i class="fa fa-info"></i>
												No downloaded files are available.
											</div>
										</td>
									</tr>
							</table>
							
						<?php } ?>
					</div>
				</div>
			</div><!-- /.tab-pane -->
			<div class="tab-pane" id="tab_4-4">
				<div class="box box-success">
					<div class="box-body table-responsive no-padding">
						<?php if (!empty($campaignDesign['CampaignDesignApproval'])) { ?>
							
							<table class="table table-hover">
									<tr>
										<td>
											<br />
											<div class="alert alert-success alert-dismissable">
												<i class="fa fa-cloud-download"></i>
												<?php	
													echo $this->Html->link(__('CLICK HERE TO DOWNLOAD'), "/attachments/".$campaignDesign['CampaignDesign']['src_files'], array('style' => 'font-size:16px;color:green;', 'target' => '_blank', 'escape'=>false)); 
												?>
											</div>
										</td>
									</tr>
							</table>							
							
						<?php }else{ ?>
			
							<table class="table table-hover">
									<tr>
										<td>
											<br />
											<div class="alert alert-success alert-dismissable">
												<i class="fa fa-info"></i>
												No downloaded files are available.
											</div>
										</td>
									</tr>
							</table>
							
						<?php } ?>
					</div>
				</div>
			</div><!-- /.tab-pane -->
		</div><!-- /.tab-content -->
		<div class="panel-footer">
			<div class="span12" align="center">
				<?php
					echo $this->Html->link($this->Form->button('Design Approval', array('class'=>'btn btn-primary', 'style'=>'color:#fff;')), array('plugin' => 'pride', 'controller' => 'campaign_design_approvals','action' => 'edit', $campaignDesign['CampaignDesignApproval'][0]['id']), array('escape'=>false));
				?>					
			</div>
		</div>
	</div>	
	<!-- End Multiple Tab -->


	<!-- ../temporary closed
	<?php //if($this->Session->read('Auth.User.Role.alias') ==  Configure::read('AMS.role_pride_advertiser')) { ?>
		<div class="box box-solid box-success">
			<div class="box-header">
				<h3 class="box-title">&nbsp;Actions</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div align="center">
					<?php //echo 
						//'<i class="fa fa-pencil-square-o" style="font-size:18px;"></i>'.
						//'&nbsp;&nbsp;'.
						//$this->Html->link(__('List Campaign Designs'), array('action' => 'index')); 
					?> 
				</div>
			</div>
		</div>
	<?php //} ?>
	../temporary closed -->
</section>
