<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Campaign Visuals
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">My Visuals</a></li>
		<li class="active">New Submission</li>
	</ol>
</section>

<section class="content">
	<!-- Custom location sessionFlash -->
		<div style="margin-left:-14px;">		
			<?php echo $this->Layout->sessionFlash(); ?>
		</div>
	<!--./location sessionFlash -->

	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Campaign Details</h3>
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
				<div class="box-body table-responsive no-padding">
					<?php if (!empty($campaignDesigns)) {?>
						<table class="table table-hover">
						<tr>
								<th style="text-align:center;width:20px;height:30px;">No</th>
								<th style="text-align:center;width:120px;height:30px;">Visual Name</th>
								<th style="text-align:center;width:170px;height:30px;">Campaign Name</th>
								<th style="text-align:center;width:120px;height:30px;">Design Image</th>
								<th style="text-align:center;width:70px;height:30px;">Tag Code</th>
								<th style="text-align:center;width:100px;height:30px;"><?php echo __('Actions'); ?></th>
						</tr>
						<?php 
							$page = $this->params['paging']['CampaignDesign']['page'];
							$limit = $this->params['paging']['CampaignDesign']['limit'];
							$counter = ($page * $limit) - $limit + 1;
						?>
						<?php foreach ($campaignDesigns as $campaignDesign): ?>
						<tr>
							<td style="text-align:center;width:20px;height:25px;vertical-align:middle;"><?php echo h($counter); ?></td>
							<td style="text-align:center;width:120px;height:30px;vertical-align:middle;"><?php echo h($campaignDesign['CampaignDesign']['name']); ?>&nbsp;</td>
							<td style="text-align:center;width:120px;height:30px;vertical-align:middle;">
								<?php echo $this->Html->link($campaignDesign['Campaign']['name'], array('controller' => 'campaigns', 'action' => 'view', $campaignDesign['Campaign']['id'])); ?>
							</td>
							<td style="text-align:center;width:120px;height:30px;vertical-align:middle;"><?php echo $this->Html->image("../attachments/".$campaignDesign['CampaignDesign']['files'], array('height'=> '30', 'width'=>'30'),array('style' => 'float:right'));			?>
							<?php //echo h($campaignDesign['CampaignDesign']['files']); ?>&nbsp;</td>
							<td style="text-align:center;width:70px;height:30px;vertical-align:middle;"><?php echo h($campaignDesign['CampaignDesign']['tag_code']); ?>&nbsp;</td>
							<td style="text-align:center;width:100px;height:30px;vertical-align:middle;">
								
								<?php  if ($this->Session->read('Auth.User.role_id') == 6) { ?>
									
									<?php
										echo $this->Html->link('', array('action' => 'approval_preview', $campaignDesign['CampaignDesign']['id']), array('class'=>'fa fa-gavel', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Approval Preview', 'escape' => false));
									?>
								
								<?php } else if ($this->Session->read('Auth.User.role_id') == 4) {  ?>
								
									<?php
										echo $this->Html->link('', array('action' => 'view', $campaignDesign['CampaignDesign']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View', 'escape' => false));
									?>
									
									&nbsp;&nbsp;
								
									<?php
									
										if(empty($campaignDesign['CampaignDesign']['tag_code'])) {
											echo $this->Html->link('', array('action' => 'edit', $campaignDesign['CampaignDesign']['id']), array('class'=>'fa fa-edit', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Edit', 'escape' => false));
										}
									?>
								
								<?php } else { ?>
								
									<?php
										echo $this->Html->link('', array('action' => 'view', $campaignDesign['CampaignDesign']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View', 'escape' => false));
									?>
									
								<?php } ?>
							</td>
						</tr>
						<?php $counter++; ?>
						<?php endforeach; ?>
						</table>
						
						<?php }else{ ?>
			
						<table class="table table-hover">
								<tr>
									<td>
										<br />
										<div class="alert alert-warning alert-dismissable">
											<i class="fa fa-info"></i>
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											No design details are available.
											
											<div class="no-margin pull-right">
												<?php
													echo $this->Html->link($this->Form->button('<i class="fa fa-upload"></i>&nbsp;&nbsp;&nbsp;Upload Campaign Visuals', array('class'=>'btn btn-warning', 'style'=>'color:#fff;width:300px;')), array('plugin' => 'pride', 'controller' => 'campaign_designs', 'action' => 'add'), array('escape'=>false));
												?>
											</div><br/>
											&nbsp;
											
										</div>
									</td>
								</tr>
						</table>
						
						<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

