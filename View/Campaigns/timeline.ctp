<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Campaign Timeline
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">My Campaigns</a></li>
		<li class="active">Campaign Timeline</li>
	</ol>
</section>

<section class="content">

<!-- Custom location sessionFlash -->	
    <div style="margin-left:-14px;">	
        <?php echo $this->Layout->sessionFlash(); ?>
    </div>
<!--./location sessionFlash -->

<div class="campaigns index">
	<div class="row">
		<div class="col-xs-12">
			<?php 
				$page = $this->params['paging']['Campaign']['limit'];
				
				if($page > 10) {
			?>
				<div class="box-header">
					<div class="box-tools"> 
						<ul class="pagination pagination-sm no-margin pull-right">
								<?php
							   echo $this->Paginator->prev(__('Prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
						   
						   echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
						   
						   echo $this->Paginator->next(__('Next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
							   ?>
						</ul>
					</div>
				</div>
				<br/>&nbsp;
			<?php } ?>
	<!-- ------------Timeline --------------------------------------------->
	<?php 
	//$counter = 1; 
	if (!empty($campaigns)) {
		$page = $this->params['paging']['Campaign']['page'];
		$limit = $this->params['paging']['Campaign']['limit'];
		$counter = ($page * $limit) - $limit + 1; 
		
		foreach ($campaigns as $campaign): 
	?>

		<div class="box box-primary pull-right">
			<div class="box-header">
				<h3 class="box-title">Campaign <?php echo h($counter) . ': ' . h($campaign['Campaign']['advertiser_name'].': '.$campaign['Campaign']['name']); ?></h3>
				<div class="box-tools pull-right">
					<?php if($counter > 1) { ?>
					<button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-plus"></i></button>
					<?php } else { ?>
					<button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<?php } ?>
				</div>
			</div>
			<div class="box-body" <?php if($counter > 1) echo 'style="display:none"';?>>
				<!-- Campaign Timeline -->
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<!-- The time line -->
						<ul class="timeline">
							<!-- timeline time label -->
							<li class="time-label">
								<span class="bg-light-blue col-md-6" style="padding-bottom:20px;">
									<div style="padding-left:10px;">
										<h4 class="box-title">
										<b><?php echo h($campaign['Campaign']['name']); ?></b>
										</h4>
									</div>
									<div>
										<div class="box-body col-md-6">
											<ul>
												<li>Start: <?php echo $this->Time->format($campaign['Campaign']['start_date'], '%d-%m-%Y'); ?></li>
												<li>End: <?php echo $this->Time->format($campaign['Campaign']['end_date'], '%d-%m-%Y'); ?></li>
											</ul>
										</div>
										<div class="col-md-4 pull-right" style="padding-top:10px;">
											<a href="<?=$this->webroot.'/pride/campaigns/view/'.$campaign['Campaign']['id'];?>" class="btn btn-default">
												<i class="fa fa-fw fa-search"></i>
												View Detail
											</a>
										</div>
									</div>
								</span>
							</li>
							<!-- /.timeline-label -->
							<!-- 
							<li>
								<i class="fa fa-dollar bg-green"></i>
								<div class="timeline-item col-md-6">
									<h3 class="timeline-header"><a href="#">Payment Advice</a></h3>
									<?php if(count($campaign['PaymentAdvice']) > 0) { ?>
									<div class="timeline-body">
										<?php foreach ($campaign['PaymentAdvice'] as $payment_advice) { ?>
											<div class="alert alert-warning">
												<div class="row">
													<div class="margin">
														<h4>
														<?php
														$advice_str = $this->requestAction('/pride/advice_types/get_advice_type/'.$payment_advice['advice_type_id']);
														echo $advice_str['AdviceType']['name'];
														?>
														</h4>
															<table class="table table-condensed">
																<tbody>
																	<tr>
																		<th style="width: 10px">#</th>
																		<th>Item</th>
																		<th style="width: 200px">Remark</th>
																		<th style="width: 50px">Progress</th>
																	</tr>
																	<tr>
																		<td>1.</td>
																		<td>Invoice</td>
																		<td>
																			<?php
																			if(!empty($payment_advice['invoice_number'])) {
																				echo $payment_advice['invoice_number'];
																				$invoice_status = '<span class="badge bg-green"><i class="fa fa-check"></i> Done</span>';
																			} else {
																				echo '<a href="#">[ Pending ]</a>';
																				$invoice_status = '<span class="badge bg-orange"><i class="fa fa-exclamation-triangle"></i> Pending</span>';
																			}
																			?>
																		</td>
																		<td><?=$invoice_status;?></td>
																	</tr>
																	<tr>
																		<td>2.</td>
																		<td>Receipt</td>
																		<td>
																			<?php
																			if(!empty($payment_advice['receipt_number'])) {
																				echo $payment_advice['receipt_number'];
																				$receipt_status = '<span class="badge bg-green"><i class="fa fa-check"></i> Done</span>';
																			} else {
																				echo '<a href="#">[ Pending ]</a>';
																				$receipt_status = '<span class="badge bg-orange"><i class="fa fa-exclamation-triangle"></i> Pending</span>';
																			}
																			?>
																		</td>
																		<td><?=$receipt_status;?></td>
																	</tr>
																	<tr>
																		<td>3.</td>
																		<td>Approval</td>
																		<td>
																			<?php
																			if($payment_advice['approval_status']) {
																				echo 'Approved';
																				$approval_status = '<span class="badge bg-green"><i class="fa fa-check"></i> Done</span>';
																			} else {
																				echo '<a href="#">[ Pending ]</a>';
																				$approval_status = '<span class="badge bg-orange"><i class="fa fa-exclamation-triangle"></i> Pending</span>';
																			}
																			?>
																		</td>
																		<td><?=$approval_status;?></td>
																	</tr>
																	<tr>
																		<td>4.</td>
																		<td>Schedule</td>
																		<td>
																			<?php
																			if($payment_advice['isScheduled']) {
																				$val = 2;
																				$progress = ceil($val / $payment_advice['schedule_count'] * 100);
																				echo '<div class="progress xs progress-striped active" style="margin-top:7px;">
																							<div class="progress-bar progress-bar-aqua" style="width: '.$progress.'%"></div>
																					  </div>';
																				if ($progress == 100) {
																					$schedule_status = '<span class="badge bg-green"><i class="fa fa-check"></i> Done</span>';
																				} else {
																					$schedule_status = '<span class="badge bg-aqua"><i class="fa fa-retweet"></i> '.$val .' of '. $payment_advice['schedule_count'].'</span>';
																				}
																			} else {
																				echo '<a href="#">[ Pending ]</a>';
																				$schedule_status = '<span class="badge bg-orange"><i class="fa fa-exclamation-triangle"></i> Pending</span>';
																			}
																			?>
																		</td>
																		<td><?=$schedule_status;?></td>
																	</tr>
																</tbody>
															</table>
														<!-- <div class="row" style="padding-left:20px;padding-bottom:5px;">
															<i class="fa fa-flag-checkered"></i>&nbsp;&nbsp;
																Progress 
														</div> -->
													</div>
												</div>
											</div>
										<?php } ?>
									</div>
									<?php } else { ?>
										<div class="timeline-body">
											You don't have any payment advice at this moment. There will be payment advices on registration, campaign booking deposit and full payment. Please keep track your advices here. <br/><br/>Thank you.
										</div>
									<?php } ?>
								</div>
							</li>
							-->
							<!-- END timeline item -->
							
							<!-- timeline item -->
							<!-- 
							<li>
								<i class="fa fa-shopping-cart bg-blue"></i>
								<div class="timeline-item col-md-6">
									
									<h3 class="timeline-header"><a href="#">Package Bookings</a></h3>
									<?php if(count($campaign['CampaignOrder']) > 0) { ?>
										<div class="timeline-body">
											<?php foreach ($campaign['CampaignOrder'] as $campaign_order) { ?>
											<?php // call model direct from UI
												$package = $this->requestAction('/pride/packages/get_package/'.$campaign_order['package_id']);
												$total_provision_slot = $this->requestAction('/pride/provision_buses/get_completed_provision/'.$campaign_order['id']);
												
												$total_package_slot = $package['Package']['quantity'];
												$percentage = ($total_provision_slot/$total_package_slot*100);
											?>
												<!-- <div style="border-top:3px solid #F1E7BC;"> -->
													<!-- <div class="callout callout-warning"> -->
													<div class="alert alert-<?php if($percentage == 100) echo 'success'; else echo 'danger';?>">
														<div class="row">
															<div class="col-md-8">
																<h4><?php echo $package['Package']['name']; ?></h4>
																<div class="row" style="padding-left:20px;padding-bottom:5px;">
																		<i class="fa fa-flag-checkered"></i>&nbsp;&nbsp;Progress : 
																		<?php 
																			echo $total_provision_slot.' / '. $total_package_slot; 
																		?>
																	&nbsp;&nbsp;&nbsp;
																		<?php
																		echo $this->Html->link('', array('plugin' => 'pride', 'controller' => 'campaign_orders', 'action' => 'view', $campaign_order['id']), array('class'=>'fa fa-gears', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Configure', 'escape' => false));
																		?>
																</div>
																<div class="row" style="padding-left:20px;padding-bottom:5px;">
																	<i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?php echo $this->Time->nice($campaign_order['updated']); ?>
																</div>
															</div>
															<div class="col-md-4 pull-right clearfix" >
																<div style="float:right;">
																	<input type="text" class="knob" value="<?=$percentage;?>" data-thickness="0.2" data-width="50" data-height="50" data-readonly="true" readonly="readonly" data-bgcolor="#FFFFFF" data-fgcolor="<?php if($percentage == 100) echo '#00a65a'; else echo '#B15654';?>" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(0, 192, 239); padding: 0px; -webkit-appearance: none; background: none;">
																</div>
																<?php if($percentage == 100) { ?>
																<div class="pull-right" style="font-size:0.9em;">
																	<i class="fa fa-check"></i>
																	Completed
																</div>
																<?php } ?>
															</div>
														</div>
													</div>
												<!-- </div> -->
											<?php } ?>
										</div>
									<?php } else { ?>
										<div class="timeline-body">
											You don't have any package selected for this campaign.<br>Please add a package.
										</div>
										<div class='timeline-footer'>
											<a href="<?=$this->webroot.'pride/packages/selection/'. $campaign['Campaign']['id'].'/'. $campaign['Job'][0]['id'];?>" class="btn btn-success"><i class="fa fa-fw fa-plus"></i>Review Campaign Packages</a>
										</div>
									<?php } ?>
								</div>
							</li> -->
							<!-- END timeline item -->

							<!-- timeline item -->
							<li>
								<i class="fa fa-magic bg-yellow"></i>
								<div class="timeline-item col-md-7">
									<!-- <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span> -->
									<h3 class="timeline-header"><a href="#">Visuals</a></h3>
									<div class="timeline-body">
										<?php foreach($campaign['CampaignDesign'] as $campaignDesign) { ?>
											<div class="col-md-4" >
												<a href="<?=$this->webroot.'pride/campaign_designs/view/'.$campaignDesign['id'].'#tab_2-2';?>" style="color:#000;" data-toggle="tooltip" data-placement="right" title="" class="thumbnail" data-original-title="<?=$campaignDesign['tag_code'];?>">
												<img src="<?php echo $this->webroot.'attachments/'.$campaignDesign['files']   ;?>" alt="" class="" style="width:140px;height:100px;" />
												<div class="clearfix" style="margin:2px;margin-top:4px;">
												<?=(!empty($campaignDesign['tag_code']) ? '<span class="label label-success col-md-12"><i class="fa fa-check"></i> Approved</span>' : '<span class="label label-danger col-md-12"><i class="fa fa-retweet"></i> Pending</span>');?>
												</div>
												</a>
											</div>
										<?php } 

											if(count($campaign['CampaignDesign']) == 0) {
										?>
										<div class="timeline-body">
											You don't have any visual attached to this campaign.<br>Please add a visual.
										</div>
										<?php } ?>
									</div>
									<div class='timeline-footer col-md-12'>
										<div class='timeline-footer'>
											<a href="<?=$this->webroot.'pride/campaign_designs/add';?>" class="btn btn-success"><i class="fa fa-fw fa-plus"></i>Add New Visual</a>
										</div>
									</div>
								</div>
							</li>
							<!-- END timeline item -->
							
							<?php // recurse on Jobs ?>
							<?php if(count($campaign['Job']) > 0) { ?>
								<?php 
									foreach($campaign['Job'] as $job) { 
									$jobType = $this->requestAction('/pride/job_types/get_job_type/'.$job['job_type_id']); 
								?>
							<!-- timeline item -->
							<li>
								<i class="fa fa-check bg-aqua"></i>
								<div class="timeline-item col-md-6">
									<span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
									<h3 class="timeline-header"><a href="#"><?php echo $jobType['JobType']['name']; ?></a></h3>
									<div class="timeline-body">
										Text
									</div>
									<div class='timeline-footer'>
										<a class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus-circle"></i>Button 1</a>
										<a class="btn btn-danger btn-sm">Button 2</a>
									</div>
								</div>
							</li>
							<!-- END timeline item -->
								<?php } ?>
							<?php } ?>
							
							<li>
								<i class="fa fa-clock-o"></i>
							</li>
						</ul><br><br>
					</div><!-- /.col -->
				</div><!-- /.row -->	
				<!-- Campaign Timeline -->

			</div><!-- /.box-body -->
		</div>
		<?php $counter++; endforeach; ?>
	<?php } else { ?>
		
						<div class="alert alert-warning alert-dismissable">
							<i class="fa fa-info"></i>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							No campaign is available. Please proceed to <strong>My Reservations</strong> and <strong>Create New Resources</strong>.
							
							<div class="no-margin pull-right">
								<?php
									echo $this->Html->link($this->Form->button('<i class="fa fa-cloud"></i>&nbsp;&nbsp;&nbsp;Create New Resources', array('class'=>'btn btn-warning', 'style'=>'color:#fff;width:300px;')), array('plugin' => 'pride', 'controller' => 'reservations', 'action' => 'add'), array('escape'=>false));
								?>
							</div>
							<br/>&nbsp;	
							
						</div>
	<?php } ?> 
	
	<!-- ------------Timeline --------------------------------------------->
		<!-- ../temporary closed	
			<div>
				<div class="span12" align="center">
					<?php
						echo $this->Html->link($this->Form->button('Create Campaign', array('class'=>'btn btn-success', 'style'=>'color:#fff;')), array('plugin' => 'pride', 'controller' => 'campaigns', 'action' => 'add'), array('escape'=>false));
					?>
				</div>
			</div>
		../temporary closed -->		
		</div>
	</div>
</section>