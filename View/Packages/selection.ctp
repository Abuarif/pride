<section class="content">
<!-- Small boxes (Stat box) -->
		<div class="row">
			<?php $counter = 1; ?>
		<?php foreach ($packages as $package){ ?>
			<div class="col-lg-4 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3>
							<?php echo $package['Package']['name']; ?>
						</h3>
						<table cellpadding="0" cellspacing="0" width="100%" class="table" style="border-width:1px;border-style:solid;border-left-color:#D6D7D7;border-right-color:#D6D7D7;border-top-color:#D6D7D7;border-bottom-color:#D6D7D7;">
						<thead>
							<tr>
									<th style="text-align:center;width:50px;height:30px;">Quantity</th>
									<th style="text-align:center;width:120px;height:30px;">Duration (Month)</th>
									<th style="text-align:center;width:90px;height:30px;">Price (RM)</th>
									<th style="text-align:center;width:50px;height:30px;">Type</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="text-align:center;width:50px;height:30px;"><?php echo h($package['Package']['quantity']); ?></td>
								<td style="text-align:center;width:120px;height:30px;"><?php echo h($package['Package']['duration']); ?></td>
								<td style="text-align:center;width:50px;height:30px;"><?php echo h($this->Number->currency($package['Package']['price'], '')); ?></td>
								<td style="text-align:center;width:50px;height:30px;">
									<?php echo $this->Html->link($package['ItemType']['name'], array('controller' => 'item_types', 'action' => 'view', $package['ItemType']['id'])); ?>
								</td>
								
							</tr>
							</tbody>
						</table>
					</div>
					<!--<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					 <a href="<?=$this->webroot.'pride/campaign_orders/purchase_selection/'.$this->request->pass[0].'/'.$this->request->pass[1].'/'.$package['Package']['id'];?>" class="small-box-footer">
						Purchase this package <i class="fa fa-arrow-circle-right"></i>
					</a> -->
					<?php echo $this->Html->link(' Purchase this package', array('controller' => 'campaign_orders', 'action' => 'purchase_selection', $this->request->pass[0], $this->request->pass[1], $package['Package']['id']), array('class' => 'small-box-footer fa fa-shopping-cart', 'confirm' => __('Are you sure you want to purchase %s?', $package['Package']['name']))); ?>
				</div>
			</div><!-- ./col -->
			<?php } ?>
			
		</div><!-- /.row -->
	</section><!-- right col -->
</div><!-- /.row (main row) -->

