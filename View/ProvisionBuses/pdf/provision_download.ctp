	
	<div class="provisionBuses view">

<div class="panel panel-primary">
  <div class="panel-heading">
		<div style="font-size:36px;color:#FFFFFF">Provision Bus</div>
  </div>
  <div class="panel-body" align="center">
	<table cellpadding="0" cellspacing="0" width="100%" class="table" style="border-width:1px;border-style:solid;border-left-color:#D6D7D7;border-right-color:#D6D7D7;border-top-color:#D6D7D7;border-bottom-color:#D6D7D7;">
	<thead>
		<tr style="background:#F1F0F0;">
				<th style="text-align:center;width:50px;height:30px;">Requester</th>
				<th style="text-align:center;width:50px;height:30px;">Campaign Name</th>
				<th style="text-align:center;width:50px;height:30px;">Start Date</th>
				<th style="text-align:center;width:50px;height:30px;">End Date</th>
		</tr>
	</thead>
		<tr>
			<td style="text-align:center;width:50px;height:30px;">
				<?php echo h($myOrg['Organization']['name']); ?>
			</td>
			<td style="text-align:center;width:50px;height:30px;">
				<?php echo h($myCampaign['Campaign']['name']); ?>
			</td>
			<td style="text-align:center;width:50px;height:30px;">
				<?php echo $this->Time->format($myCampaign['Campaign']['start_date'], '%d-%m-%Y'); ?>
			</td>
					<td style="text-align:center;width:50px;height:30px;">
				<?php echo $this->Time->format($myCampaign['Campaign']['end_date'], '%d-%m-%Y'); ?>
			</td>
		</tr>
	</table>
	<br/>
	<table cellpadding="0" cellspacing="0" width="100%" class="table" style="border-width:1px;border-style:solid;border-left-color:#D6D7D7;border-right-color:#D6D7D7;border-top-color:#D6D7D7;border-bottom-color:#D6D7D7;">
		<thead>
			<tr style="background:#F1F0F0;">
					<th style="text-align:center;width:50px;height:30px;">Depot</th>
					<th style="text-align:center;width:50px;height:30px;">Route</th>
					<th style="text-align:center;width:50px;height:30px;">Bus Registration No</th>
								<th style="text-align:center;width:50px;height:30px;">Tag No</th>
			</tr>
		</thead>
			<tr>
				<td style="text-align:center;width:50px;height:30px;">
					<?php echo $provisionBus['Depot']['name']; ?>
				</td>
				<td style="text-align:center;width:50px;height:30px;">
					<?php echo $provisionBus['RouteDetail']['route_number']; ?>
				</td>
				<td style="text-align:center;width:50px;height:30px;">
					<?php echo $provisionBus['Bus']['registration_number']; ?>
				</td>
						<td style="text-align:center;width:50px;height:30px;">
					<?php echo $provisionBus['CampaignDesign']['tag_code']; ?>
				</td>
		</tr>
	</table>
	<br/>
<?php if (!empty($provisionBus['CampaignDesign']['id'])) { ?>
<table cellpadding="0" cellspacing="0" width="100%" class="table" style="border-width:1px;border-style:solid;border-left-color:#D6D7D7;border-right-color:#D6D7D7;border-top-color:#D6D7D7;border-bottom-color:#D6D7D7;">
	<thead>
	<tr style="background:#F1F0F0;">
			<th style="text-align:center;width:50px;height:30px;">Design Preview</th>
	</tr>
	</thead>
	<tr>
		<td style="text-align:center;width:50px;height:30px;">
                <br/>
                <?php	echo $this->Html->image('http://'.$_SERVER['SERVER_NAME'].Router::url('/')."attachments/".$provisionBus['CampaignDesign']['files'], array('height'=> '400', 'width'=>'500'),array('style' => 'float:right'));?>
                <br/><br/>
		</td>
	</tr>
        <tr>
                 <td style="text-align:center;width:50px;height:30px;">
                <br/>
                <?php echo 'Caption : ' . h($provisionBus['CampaignDesign']['files']); ?>
                <br/><br/>
		</td>    
        </tr>
	</table>
	
	<?php  } ?>
  </div>
</div>
</div>