<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Reservation List
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">My Bookings</a></li>
		<li class="active">List</li>
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
					<?php if ($this->request->pass[0] == 1){ ?>
						<h3 class="box-title">Approved Reservations</h3>
					<?php } else { ?>
						<h3 class="box-title">Pre-Approved Reservations</h3>
					<?php } ?>
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
					<?php if (!empty($campaignOrders)) {?>
					<table class="table table-hover">
						<tr>
							<th style="text-align:center;width:20px;height:30px;">No</th>
							<th style="text-align:center;width:50px;height:30px;">Organization</th>
							<th style="text-align:center;width:50px;height:30px;">Contact Person</th>
							<th style="text-align:center;width:50px;height:30px;">Mobile Number</th>
							<th style="text-align:center;width:200px;height:30px;">Package</th>
							<th style="text-align:center;width:50px;height:30px;">Product Type</th>
							<th style="text-align:center;width:50px;height:30px;">Total Products (Unit)</th>
							<th style="text-align:center;width:120px;height:30px;">Purchased Date</th>
							<th style="text-align:center;width:50px;height:30px;"><?php echo __('Actions'); ?></th>
						</tr>
					<?php 
						$page = $this->params['paging']['CampaignOrder']['page'];
						$limit = $this->params['paging']['CampaignOrder']['limit'];
						$counter = ($page * $limit) - $limit + 1; 
					?>
					<?php foreach ($campaignOrders as $campaignOrder): ?>
						<?php 
							if (!empty($campaignOrder['Package']['item_type_id'])) {
							$itemType = $this->requestAction('/pride/item_types/get_item_type/'.$campaignOrder['Package']['item_type_id']);
							} else {
							$itemType = array('ItemType' => array('name' => ''));
							}
						?>
						<tr>
							<td style="text-align:center;width:20px;height:25px;"><?php echo h($counter); ?></td>
							<td style="text-align:center;width:120px;height:25px;"><?php echo h($campaignOrder['Organization']['name']);?></td>
							<td style="text-align:center;width:120px;height:25px;"><?php echo h($campaignOrder['Organization']['contact_person']);?></td>
							<td style="text-align:center;width:120px;height:25px;"><?php echo h($campaignOrder['Organization']['contact_number']);?> (<?php echo h($campaignOrder['Organization']['extension']);?>) </td>
							<td style="text-align:center;width:50px;height:30px;">
								<?php echo $this->Html->link($campaignOrder['Package']['name'], array('controller' => 'packages', 'action' => 'view', $campaignOrder['Package']['id'])); ?>
							</td>
							<td style="text-align:center;width:120px;height:25px;"><?php echo h($itemType['ItemType']['name']);?></td>
							<td style="text-align:center;width:120px;height:25px;"><?php echo h($campaignOrder['Package']['quantity']);?></td>
							<td style="text-align:center;width:120px;height:25px;"><?php echo h($this->Time->nice($campaignOrder['CampaignOrder']['updated']));?></td>
							<td style="text-align:center;width:50px;height:30px;">
								 
								<!-- Original View Method	-->
								<?php //echo $this->Html->link(__('View'), array('action' => 'view', $campaignOrder['CampaignOrder']['id'])); ?>
									
								<?php
									echo $this->Html->link('', array('action' => 'view', $campaignOrder['CampaignOrder']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View', 'escape' => false));
								?>
								
								&nbsp;&nbsp;
								
								<?php			
									echo $this->Form->postLink('', array('action' => 'delete', $campaignOrder['CampaignOrder']['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $campaignOrder['CampaignOrder']['id'])));			
								?>	
								
								
								<!-- Original Delete Method	-->		
								<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $campaignOrder['CampaignOrder']['id']), array(), __('Are you sure you want to delete # %s?', $campaignOrder['CampaignOrder']['id'])); ?>
								
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
										No reservations are available.
									</div>
								</td>
							</tr>
					</table>
					
					<?php } ?>
				</div>
				
				<!-- Footer -->
				<div class="panel-footer">
					<div class="span12" align="center">
						<?php
							echo $this->Html->link($this->Form->button('Book Package Reservation', array('class'=>'btn btn-success', 'style'=>'color:#fff;')), array('plugin' => 'pride', 'controller' => 'packages', 'action' => 'promotion'), array('escape'=>false));
						?>
					</div>
				</div>
				<!-- End Footer -->
				
			</div>
		</div>
	</div>
<!------------------------------------------------------------------------------------------>
</section>