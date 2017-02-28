<br/><br/><br/>
<table cellpadding="0" cellspacing="0" width="100%" class="TFtable" style="border-width:1px;border-style:solid;border-left-color:#D6D7D7;border-right-color:#D6D7D7;border-top-color:#D6D7D7;border-bottom-color:#D6D7D7;">
	<thead>
	<tr style="background:#F1F0F0;">
			<th style="text-align:center;width:20px;height:30px;">No</th>
			<th style="text-align:left;width:40%;height:30px;">&nbsp;&nbsp;Item (Total)</th>
			<th style="text-align:center;width:50%;height:30px;">Distribution</th>
			
	</tr>
	</thead>
	<tbody>
	<tr>
		<td style="text-align:center;width:20px;height:25px;">1</td>
		<td style="text-align:left;height:30px;">Registered Advertisers (<?php //echo h($total); ?>)</td>
		<td style="text-align:center;height:30px;">
		
		
			<div class="progress" style="margin-bottom:0px">
			  <div class="progress-bar progress-bar-success progress-bar-striped" style="width: <?php //echo $percentApproved; ?>%">
				<span class="sr-only"><?php //echo $this->Html->link($approved.' (Approved)', '/pride/organizations/approved_index', array('style' => 'color:#fff'));?></span>
			  </div>
			  <div class="progress-bar progress-bar-danger progress-bar-striped" style="width: <?php //echo $percentNew; ?>%">
				<span class="sr-only"><?php //echo $this->Html->link($new .' (New)', '/organizations', array('style' => 'color:#fff'));?></span>
			  </div>
			</div>
		</td>
	
	</tr>
</table>