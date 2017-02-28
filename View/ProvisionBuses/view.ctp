<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Provision Bus
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Provision Order</a></li>
		<li class="active">Provision Bus</li>
	</ol>
</section>

<section class="content">
<!-- Provision Bus Details -->
	<!-- Multiple Tab -->
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab_1-1" data-toggle="tab">Details</a></li>
			<li class=""><a href="#tab_2-2" data-toggle="tab">Design</a></li>
			<li class=""><a href="#tab_3-3" data-toggle="tab">Download</a></li>
			<li class=""><a href="#tab_4-4" data-toggle="tab">Design Templates</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="tab_1-1">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Provision Bus Details</h3>
						<div class="box-tools">
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover">
						<?php if (!empty($myOrg['Organization']['name'])) {  ?>
							<tr>
								<th style="width:150px;">Agency</th>
								<td style="width:30px;">:</td>
								<td><?php echo h($myOrg['Organization']['name']); ?></td>
							</tr>
						<?php } ?>
							<tr>
								<th style="width:150px;">Advertiser</th>
								<td style="width:30px;">:</td>
								<td>
									<?php 
										if(!empty($myCampaign)) {
											echo $myCampaign['Campaign']['advertiser_name']; 
										}
									?>
								</td>
							</tr>
							<tr>
								<th style="width:150px;">Campaign Name</th>
								<td style="width:30px;">:</td>
								<td>
									<?php 
										if(!empty($myCampaign)) {
											echo $myCampaign['Campaign']['name']; 
										}
									?>
								</td>
							</tr>
							<tr>
								<th>Start Date</th>
								<td>:</td>
								<td>
									<?php 
										if(!empty($myCampaign)) {	
											echo $this->Time->format($myCampaign['Campaign']['start_date'], '%d-%m-%Y'); 
										}
									?>
								</td>
							</tr>
							<tr>
								<th>End Date</th>
								<td>:</td>
								<td>
									<?php 
										if(!empty($myCampaign)) {	
											echo $this->Time->format($myCampaign['Campaign']['end_date'], '%d-%m-%Y');
										}	
									?>
								</td>
							</tr>
							<tr>
								<th>Depot</th>
								<td>:</td>
								<td>
									<?php 
										echo $this->Html->link($provisionBus['Depot']['name'], array('controller' => 'depots', 'action' => 'view', $provisionBus['Depot']['id'])); 
									?>
								</td>
							</tr>
							<tr>
								<th>Route</th>
								<td>:</td>
								<td>
									<?php 
										echo $this->Html->link($provisionBus['RouteDetail']['route_number'], array('controller' => 'route_details', 'action' => 'view', $provisionBus['RouteDetail']['id'])); 
									?>
								</td>
							</tr>
							<tr>
								<th>Bus Registration No</th>
								<td>:</td>
								<td>
									<?php 
										echo $this->Html->link($provisionBus['Bus']['registration_number'], array('controller' => 'buses', 'action' => 'view', $provisionBus['Bus']['id'])); 
									?>
								</td>
							</tr>
							<tr>
								<th>Tag No</th>
								<td>:</td>
								<td>
									<?php echo $this->Html->link($provisionBus['CampaignDesign']['tag_code'], array('controller' => 'campaign_designs', 'action' => 'view', $provisionBus['CampaignDesign']['id'])); ?>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div><!-- /.tab-pane -->
			<div class="tab-pane" id="tab_2-2">
				<div class="box box-danger">
					<div class="box-body table-responsive no-padding">
						<?php if (!empty($provisionBus['CampaignDesign']['id'])) { ?>
							<table class="table table-hover">
								<tr>
									<td style="text-align:center;width:100%;height:30px;">
										<?php	
											echo $this->Html->image("../attachments/".$provisionBus['CampaignDesign']['files'], array('height'=> '400', 'width'=>'500'),array('style' => 'float:right'));
										?>
									</td>
								</tr>
								<!--/.temporary closed 
								<tr>
									<td style="text-align:center;width:100%;height:30px;">
										<?php echo 'Caption : ' . h($provisionBus['CampaignDesign']['files']); ?>
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
						<?php if (!empty($provisionBus['CampaignDesign']['src_files'])) { ?>
							
							<table class="table table-hover">
									<tr>
										<td>
											<br />
											<div class="alert alert-success alert-dismissable">
												<i class="fa fa-cloud-download"></i>
												<?php	
													echo $this->Html->link(__('CLICK HERE TO DOWNLOAD'), "/attachments/".$provisionBus['CampaignDesign']['src_files'], array('style' => 'font-size:16px;color:green;', 'target' => '_blank', 'escape'=>false)); 
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
					<?php if(!empty($provisionBus['Bus']['brand_id'])) {  ?>
					<?php
						$brand = array();
						//echo 'Nizar: '.$provisionBus['Bus']['brand_id'];
						$brand = $this->requestAction('/pride/brands/get_brand/'.$provisionBus['Bus']['brand_id']);
						//print_r($brand);
					?>
						<?php if (!empty($brand['Brand'])) { ?>
							
							<table class="table table-hover">
								<!-- ../temporary closed
								<tr>
									<td style="text-align:center;width:100%;">
										<?php	
											echo 
											$this->Html->image("../templates/".$brand['Brand']['files'], 
											array('height'=> '400', 'width'=>'500'),
											array('style' => 'float:right')
											);
											
										?>
									</td>
								</tr>
								../temporary closed -->
								<tr>
									<td>
										<br />
										<div class="alert alert-success alert-dismissable">
											<i class="fa fa-cloud-download"></i> 
											<?php	
												echo $this->Html->link(__('CLICK HERE TO DOWNLOAD'), "/templates/".$brand['Brand']['src_files'], array('style' => 'font-size:16px;color:green;', 'target' => '_blank', 'escape'=>false)); 
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
							
						<?php }
						} else { ?>
							<table class="table table-hover">
									<tr>
										<td>
											<br />
											<div class="alert alert-success alert-dismissable">
												<i class="fa fa-info"></i>
												No data available.
											</div>
										</td>
									</tr>
							</table>
						<?php } ?>
					</div>
				</div>
			</div><!-- /.tab-pane -->
		</div><!-- /.tab-content -->
	</div>	
	<!-- End Multiple Tab -->
<!-- End Provision Bus Details -->

<!-- ../temporary closed
<div class="panel panel-success">
  <div class="panel-heading">
	<h3 class="panel-title">
		<div class="box-title" align="center">
			<?php echo $this->Html->image('/uploads/listOrdered23.png', array('style' => 'height:22px;width:22px')).'&nbsp;'. __('Actions'); ?>
		</div>
	</h3>
  </div>
  <div class="panel-body" align="center">
	<?php echo 
		$this->Html->image('/uploads/busIco.png', array('style' => 'height:22px;width:22px')).
		'&nbsp;&nbsp;'.
		$this->Html->link(__('My Buses'), '/my_order/'.$provisionBus['CampaignOrder']['id']); 
	?>
	<br/><br/>
	<?php echo $this->Html->link('Download PDF', array(
        'action' => 'provision_download', $provisionBus['ProvisionBus']['id'], 'ext' => 'pdf'), array('target'=>'_blank','escape'=>false));
	?>br/><br/>
	<?php echo $this->Html->link('Download PDF', array(
        'action' => 'download', $provisionBus['ProvisionBus']['id'], 'ext' => 'pdf'), array('target'=>'_blank','escape'=>false));
	?>
  </div>
</div> -- ../temporary closed
</section>