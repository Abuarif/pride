<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		My P.O.I
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Point of Interest (P.O.I)</a></li>
		<li class="active">My P.O.I</li>
	</ol>
</section>

<section class="content">
	<!-- Custom location sessionFlash -->
		<div style="margin-left:-14px;">
			<?php echo $this->Layout->sessionFlash(); ?>
		</div>
	<!--./location sessionFlash -->
	
	<!-- My POI Details -->
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="tab-content">	
				<div class="campaigns index">
					<div class="row">
						<div class="col-xs-12">
							<div class="box box-primary">
								<div class="box-header">
									<h3 class="box-title">
										My P.O.I Details
									</h3>
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
									<?php if (!empty($poiCarts)) { ?>
									<table class="table table-hover">
									<tr>
										<td style="text-align:center;width:20px;height:30px;">No</td>
										<td style="text-align:center;width:150px;height:30px;">Depot</td>
										<td style="text-align:center;width:150px;height:30px;">Origin</td>
										<td style="text-align:center;width:120px;height:30px;">Destination</td>
										<td style="text-align:center;width:120px;height:30px;">Route No</td>
										<td class="actions" style="text-align:center;width:100px;height:30px;">Actions</td>
									</tr>
									<?php 
										$page = $this->params['paging']['PoiCart']['page'];
										$limit = $this->params['paging']['PoiCart']['limit'];
										$counter = ($page * $limit) - $limit + 1; 
									?>
									<?php foreach ($poiCarts as $poiCart): ?>
									<tr>
										<td style="text-align:center;width:20px;height:25px;">
											<?php echo h($counter); ?>
										</td>
										<td style="text-align:center;width:150px;height:30px;">
											<?php echo h($poiCart['Depot']['name']); ?>
										</td>
										<td style="text-align:center;width:80px;height:30px;">
											<?php echo h($poiCart['RouteDetail']['origin']); ?>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php echo h($poiCart['RouteDetail']['destination']); ?>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php echo h($poiCart['PoiCart']['route_number']); ?>
										</td>
										<td class="actions" style="text-align:center;width:100px;height:30px;">								
											<?php			
												echo $this->Html->link('', array('plugin' => 'pride', 'controller' => 'route_details', 'action' => 'view', $poiCart['RouteDetail']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View Details', 'escape' => false));			
											?>	
											
											&nbsp;&nbsp;
											
											<?php			
												echo $this->Form->postLink('', array('action' => 'delete', $poiCart['PoiCart']['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $poiCart['PoiCart']['id'])));			
											?>	
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
															No point of interest are available yet.
														</div>
													</td>
												</tr>
										</table>
									
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			<div class="span12" align="center">
				<?php
					echo
						$this->Html->link(__d('croogo', 'Search New Location'), array('plugin' => 'pride', 'controller' => 'route_details'), array('class' => 'btn btn-primary', //'target'=>'_blank',
						'escape'=>false));
				?>
				</div>
		  </div>
	</div>
	<!-- End My POI Details -->

	<!--
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Poi Cart'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Depots'), array('controller' => 'depots', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Depot'), array('controller' => 'depots', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	-->
</section>