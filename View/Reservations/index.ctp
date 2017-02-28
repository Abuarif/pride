<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Reservation List
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">My Reservations</a></li>
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
					<?php if (!empty($reservations)) {?>
					<table class="table table-hover">
						<tr>
							<th style="text-align:center;width:20px;height:30px;">No</th>
							<th style="text-align:center;width:50px;height:30px;">Organization</th>
							<th style="text-align:center;width:50px;height:30px;">Contact Person</th>
							<th style="text-align:center;width:50px;height:30px;">Created</th>
							<th style="text-align:center;width:200px;height:30px;">Updated</th>
							<th style="text-align:center;width:50px;height:30px;"><?php echo __('Actions'); ?></th>
						</tr>
					<?php 
						$page = $this->params['paging']['Reservation']['page'];
						$limit = $this->params['paging']['Reservation']['limit'];
						$counter = ($page * $limit) - $limit + 1; 
					?>
					<?php foreach ($reservations as $reservation): ?>
						<tr>
							<td style="text-align:center;width:20px;height:25px;"><?php echo h($counter); ?></td>
							<td style="text-align:center;width:120px;height:25px;"><?php echo h($reservation['Organization']['name']);?></td>
							<td style="text-align:center;width:120px;height:25px;"><?php echo h($reservation['User']['name']);?></td>
							<td style="text-align:center;width:120px;height:25px;"><?php echo h($this->Time->niceShort($reservation['Reservation']['created']));?>  </td>
							<td style="text-align:center;width:120px;height:25px;"><?php echo h($this->Time->niceShort($reservation['Reservation']['updated']));?>  </td>
							<td style="text-align:center;width:50px;height:30px;">
								
								<?php 
									
									if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_finance') || $this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_administrator') ) {
								
									echo $this->Html->link('', array('action' => 'approval_preview', $reservation['Reservation']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Approval Preview', 'escape' => false));
								
								} else {
								
									echo 
									
									$this->Html->link('', array('plugin' => 'pride', 'controller' => 'packages', 'action' => 'promotion', $reservation['Reservation']['id']), array('class'=>'fa fa-shopping-cart', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Purchase Package', 'escape' => false)) .
									
									'&nbsp;&nbsp;&nbsp;' .
									
									$this->Html->link('', array('action' => 'view', $reservation['Reservation']['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View', 'escape' => false)) .
									
									'&nbsp;&nbsp;&nbsp;' .
									
									$this->Form->postLink('', array('action' => 'delete', $reservation['Reservation']['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $counter)));
								} 
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
										No reservations are available.
									</div>
								</td>
							</tr>
					</table>
					
					<?php } ?>
				</div>
				
				
				<?php 
					if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_advertiser') ) {
				?>
				<!-- Footer -->
				<div class="panel-footer">
					<div class="span12" align="center">
						<?php
							echo $this->Html->link($this->Form->button('Create New Resources Reservation', array('class'=>'btn btn-success', 'style'=>'color:#fff;')), array('plugin' => 'pride', 'controller' => 'reservations', 'action' => 'add'), array('escape'=>false));
						?>
					</div>
				</div>
				<!-- End Footer -->
				<?php
					}
				?>
			</div>
		</div>
	</div>
<!------------------------------------------------------------------------------------------>
</section>
