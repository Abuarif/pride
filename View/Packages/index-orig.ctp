<div class="packages index">
	
	<div class="panel panel-primary">
	  <div class="panel-heading">
			<div style="font-size:36px;color:#FFFFFF">Packages</div>
	  </div>
	  <div class="panel-body" align="center">
		<table cellpadding="0" cellspacing="0" width="100%" class="table" style="border-width:1px;border-style:solid;border-left-color:#D6D7D7;border-right-color:#D6D7D7;border-top-color:#D6D7D7;border-bottom-color:#D6D7D7;">
		<thead>
			<tr style="background:#F1F0F0;">
					<th style="text-align:center;width:20px;height:30px;">No</th>
					<th style="text-align:left;width:140px;height:30px;">&nbsp;&nbsp;Name</th>
					<th style="text-align:center;width:50px;height:30px;">Quantity</th>
					<th style="text-align:center;width:120px;height:30px;">Duration (Month)</th>
					<th style="text-align:center;width:90px;height:30px;">Price (RM)</th>
					<th style="text-align:center;width:50px;height:30px;">Type</th>
					<th style="text-align:center;width:50px;height:30px;"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
		<?php $counter = 1; ?>
		<?php foreach ($packages as $package): ?>
			<tr>
				<td style="text-align:center;width:20px;height:25px;"><?php echo h($counter); ?></td>
				<td style="text-align:left;width:140px;height:30px;"><?php echo h($package['Package']['name']); ?></td>
				<td style="text-align:center;width:50px;height:30px;"><?php echo h($package['Package']['quantity']); ?></td>
				<td style="text-align:center;width:120px;height:30px;"><?php echo h($package['Package']['duration']); ?></td>
				<td style="text-align:center;width:50px;height:30px;"><?php echo h($this->Number->currency($package['Package']['price'], '')); ?></td>
				<td style="text-align:center;width:50px;height:30px;">
					<?php echo $this->Html->link($package['ItemType']['name'], array('controller' => 'item_types', 'action' => 'view', $package['ItemType']['id'])); ?>
				</td>
				<td class="actions" style="text-align:center;width:50px;height:30px;">
					
					<?php echo $this->Html->link(
							$this->Html->image('/uploads/viewBig22.png', array('style' => 'height:22px;width:22px')),
							array('action' => 'view', $package['Package']['id']),
							array('rel'=>'tooltip', 'data-placement'=>'top', 'title'=>'View',
							'escape' => false)
					); ?>
					
					<script>
						  $('[rel="tooltip"]').tooltip('toggle')
						  $('[rel="tooltip"]').tooltip('hide');   
					</script>
				</td>
			</tr>
			<?php $counter++; ?>
			<?php endforeach; ?>
			</tbody>
		</table>
	  </div>
	</div>
	
	<div align="center"> 
		<ul class="pagination">
				<?php
			   echo $this->Paginator->prev(__('Prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
		   
		   echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
		   
		   echo $this->Paginator->next(__('Next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
			   ?>
		</ul>
	</div>
	
</div>
