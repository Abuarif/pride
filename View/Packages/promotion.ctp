<section class="content">	
	<div class="row">
		<?php // check for open_reservation_id 
			if (!empty($this->request->pass)) {
				$open_reservation_id = $this->request->pass[0];
			} else if (!empty($myReservation)) {
				$open_reservation_id = $myReservation['Reservation']['id'];
			}else{
				$open_reservation_id = null;
			}
		
		?>
		<?php $counter = 1; ?>
		<?php foreach ($packages as $package){ ?>
		<div class="col-md-6">
			<div class="box box-danger">
				<div class="box-header">
					<i class="fa fa-suitcase"></i>
					<h3 class="box-title"><?php echo $package['Package']['name']; ?></h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="alert alert-danger alert-dismissable">
						<i class="fa fa-th"></i>
						<b>Quantity : <?php echo h($package['Package']['quantity']); ?> Unit</b>
					</div>
					<div class="alert alert-info alert-dismissable">
						<i class="fa fa-clock-o"></i>
						<b>Duration : <?php echo h($package['Package']['duration']); ?> Month</b>
					</div>
					<div class="alert alert-warning alert-dismissable">
						<i class="fa fa-tag"></i>
						<b>Price : RM<?php echo h($this->Number->currency($package['Package']['price'], '')); ?></b>
					</div>
					<div class="alert alert-success alert-dismissable">
						<i class="fa fa-check"></i>
						<b>Type : <?php echo $this->Html->link($package['ItemType']['name'], array('controller' => 'item_types', 'action' => 'view', $package['ItemType']['id'])); ?></b>
					</div>
				</div><!-- /.box-body -->
				<!-- Footer Button -->
				<div class="panel-footer">
					<div align="center">
						<?php
							echo $this->Html->link('Book this package', array('controller' => 'campaign_orders', 'action' => 'purchase_promotion', $package['Package']['id'], $open_reservation_id), array('class'=>'btn btn-primary', 'confirm' => __('Are you sure you want to book %s?', $package['Package']['name'])), array('escape'=>false));
						?>
					</div>
				</div>
				<!-- End Footer Button -->
			</div><!-- /.box -->
		</div>
		<?php } ?>
	</div>	
</section><!-- right col -->

