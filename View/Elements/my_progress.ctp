
<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">M Y&nbsp;&nbsp; P R O G R E S S </h3>
					</div>
					<div class="panel-body">
					
					<table cellpadding="0" cellspacing="0" width="100%" class="TFtable" style="border-width:1px;border-style:solid;border-left-color:#D6D7D7;border-right-color:#D6D7D7;border-top-color:#D6D7D7;border-bottom-color:#D6D7D7;">
	<thead>
	<tr style="background:#F1F0F0;">
			<th style="text-align:center;width:2%;height:30px;">No</th>
			<!-- <th style="text-align:left;width:20%;height:30px;">&nbsp;Organization</th> -->
			<th style="text-align:left;width:20%;height:30px;">Campaign</th>
			<th style="text-align:left;width:8%;height:30px;">Booked Bus</th>
			<th style="text-align:center;width:50%;height:30px;">Progress</th>
	
	</tr>
	</thead>
	<tbody>
	<?php $counter = 1; ?>
	<?php foreach ($campaign_progress as $progress) { ?>
	<tr>
		<td style="text-align:right;width:20px;height:25px;"><?php echo $counter; ?>&nbsp;</td>
		<!-- <td style="text-align:left;height:30px;">&nbsp;<?php echo h($progress['organization']['name']); ?></td> -->
		<td style="text-align:left;height:30px;">&nbsp;<?php echo h($progress['campaign']['name']); ?></td>
		<td style="text-align:left;height:30px;"><?php echo h($progress['pack']['quantity']); ?></td>
		<td style="text-align:center;height:30px;">
		
			<div class="progress" style="margin-bottom:0px">
			  <div class="progress-bar progress-bar-success progress-bar-striped" style="width: <?php echo ($progress['0']['totalProvisionedBus']/$progress['pack']['quantity']*100); ?>%">
				<span class="sr-only"><?php echo $this->Html->link($progress['0']['totalProvisionedBus'], '/my_order/'.$progress['co']['id'], array('style' => 'color:#fff'));?></span>
			  </div>
			  <div class="progress-bar progress-bar-danger progress-bar-striped" style="width: <?php echo ($progress['0']['balance']/$progress['pack']['quantity']*100); ?>%">
				<span class="sr-only"><?php echo $this->Html->link($progress['0']['balance'], '/my_order/'.$progress['co']['id'], array('style' => 'color:#fff'));?></span>
			  </div>
			</div>
			
		</td>
	
	</tr>
		<?php $counter++; ?>
	<?php } ?>
</table>
</div>
				</div>