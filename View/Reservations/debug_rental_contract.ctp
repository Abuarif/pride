<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AMS::Advertisement Management System</title>

<style type="text/css">
html,
body{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;	
}
</style>

</head>

<body>
	<!-- ../Header Title -->
	<div align="right">
		<table width="25%" border="0" cellspacing="0" cellpadding="0" style="border:1px;border-style:solid">
			<tr>
				<td style="text-align:center;font-size:16px;"><b>RENTAL CONTRACT</b></td>
			</tr>
		</table>
	</div>
	<!-- ../End Header Title -->
    
    <!-- ../Header Text -->
    <div style="padding-top:15px;">
    	<table width="98%" border="0" cellspacing="0" cellpadding="0" style="border:0;">
			<tr>
				<td style="text-align:justify;">
					The undersigned Advertising Agency (acting on behalf of the Advertiser) or the Advertiser hereby contracts with <b>Prasarana Integrated Development Sdn. Bhd. (938203-U)</b>("the Company") for the rental of outdoor advertising structures owned or controlled by the Company for the products or services named herein, upon all terms and conditions set forth and back hereof.
				</td>
			</tr>
        </table>
    </div>
    <!-- ../End Header Text -->
	
	<!-- ../Table 1 -->
    <div style="padding-top:15px;">
    	<table width="100%" border="1" cellspacing="0" cellpadding="0">
			<tr>
				<td style="padding-left:2px;width:200px;">Contract No</td>
				<td style="padding-left:2px;">PRIDE/CD/AMS/RC/2</td>
			</tr>
			<tr>
				<td style="padding-left:2px;">Agency</td>
				<td style="padding-left:2px;"><?php echo $reservation['Organization']['name'] ?></td>
			</tr>
			<tr>
				<td style="padding-left:2px;">Address</td>
				<td style="padding-left:2px;">
					<?php 
						echo $reservation['Organization']['address'] . 
						'&nbsp;' .
						$reservation['Organization']['address2'] . 
						'&nbsp;' .
						$reservation['Organization']['address3'] .
						'&nbsp;' .
						$reservation['Organization']['postcode'] .
						'&nbsp;' .
						$reservation['Organization']['town'] .
						'&nbsp;' .
						$reservation['Organization']['state'] .
						'&nbsp;' .
						$reservation['Organization']['country'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:2px;">Telephone</td>
				<td style="padding-left:2px;"><?php echo $reservation['Organization']['contact_number']; ?></td>
			</tr>
			<tr>
				<td style="padding-left:2px;">Email</td>
				<td style="padding-left:2px;"><?php echo $reservation['Organization']['contact_email']; ?></td>
			</tr>
			<tr>
				<td style="padding-left:2px;">Payment Term</td>
				<td style="padding-left:2px;">Full Payment Upon Confirmation</td>
			</tr>
        </table>
    </div>
    <!-- ../End Table 1 -->
	
	
	
	<!-- ../Table 2 -->
    <div style="padding-top:15px;">
    	<?php if (!empty($reservation['CampaignOrder'])) { ?>
								<table class="table table-hover">
									<tr>
											<th style="text-align:center;width:20px;height:30px;">No</th>
											<th style="text-align:center;width:50px;height:30px;">Package Name</th>
											<th style="text-align:center;width:50px;height:30px;">Product Type</th>
											<th style="text-align:center;width:50px;height:30px;">Total Products (Unit)</th>
											<th style="text-align:center;width:50px;height:30px;">Total Payable (Unit)</th>
											<th style="text-align:center;width:50px;height:30px;">Total FOC (Unit)</th>
											<th style="text-align:center;width:120px;height:30px;">Purchased Date</th>
									</tr>
									<?php $counter = 1; $total_reservation_cost = 0; ?>
									<?php foreach ($reservation['CampaignOrder'] as $campaignOrder): ?>
									<?php
										$package = $this->requestAction('/pride/packages/get_package/'.$campaignOrder['package_id']);
										if (!empty($package['Package']['item_type_id'])) {
											$itemType = $this->requestAction('/pride/item_types/get_item_type/'.$package['Package']['item_type_id']);
										} else {
											$itemType = array('ItemType' => array('name' => ''));
										}
									?>
									<tr>
										<td style="text-align:center;width:20px;height:30px;">
											<?php echo h($counter); ?>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php echo h($package['Package']['name']); ?>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php echo h($itemType['ItemType']['name']);?></td>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php echo h($package['Package']['quantity']);?></td>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php echo h($package['Package']['paid']);?></td>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php echo h($package['Package']['foc']);?></td>
										</td>
										<td style="text-align:center;width:50px;height:30px;">
											<?php echo h($this->Time->nice($campaignOrder['updated']));?></td>
										
										</td>
									</tr>
									<tr>
										<td colspan="3" style="padding-top:25px;">
											<div class="box box-danger">
												<div class="box-header">
													<!-- <h3 class="box-title">Condensed Full Width Table</h3> -->
												</div>
												<div class="box-body no-padding">
													<table class="table table-condensed">
														<tr>
															<th style="width:235px;">Gross Rental Price</th>
															<td style="text-align:center;width:30px;">:</td>
															<td><?php echo $this->Number->currency($package['Package']['price'], 'RM'); ?></td>
														</tr>
														<tr>
															<th>Less Agency Fees (<?php echo $package['Package']['discount']; ?>%)</th>
															<td style="text-align:center;">:</td>
															<td>
																<?php 
																$discountedPrice = $package['Package']['price'] * ( $package['Package']['discount']) / 100;
																echo $this->Number->currency($discountedPrice, 'RM'); ?>
															</td>
														</tr>
														<tr>
															<th>Total Rental Charges</th>
															<td style="text-align:center;">:</td>
															<td>
																<?php 
																$totalRental = $package['Package']['price'] - $discountedPrice;
																echo $this->Number->currency($totalRental, 'RM'); ?>
															</td>
														</tr>
													</table>
												</div>
											</div>
										</td>
										<td colspan="3" style="padding-top:25px;">
											<div class="box box-danger">
												<div class="box-header">
													<!-- <h3 class="box-title">Condensed Full Width Table</h3> -->
												</div>
												<div class="box-body no-padding">
													<table class="table table-condensed">
														<tr>
															<th style="width:235px;">Production Amount Per Unit</th>
															<td style="text-align:center;width:30px;">:</td>
															<td><?php echo $this->Number->currency($package['Package']['production_cost'], 'RM'); ?></td>
														</tr>
														<tr>
															<th>Production Amount Payable</th>
															<td style="text-align:center;">:</td>
															<td>
															<?php
																$total_production = $package['Package']['production_cost']*$package['Package']['quantity'];
																echo $this->Number->currency($total_production, 'RM'); ?>
															</td>
														</tr
														<tr>
															<th>Total Payable Amount</th>
															<td style="text-align:center;">:</td>
															<td>
															<?php
																$total_payable = $totalRental + $total_production;
																$total_reservation_cost += $total_payable;
																echo $this->Number->currency($total_payable, 'RM'); ?>
															</td>
														</tr>
													</table>
												</div>
											</div>
										</td>
									</tr>
									<?php $counter++; ?>
									<?php endforeach; ?>
								</table>
							<?php } else { ?>
								<table class="table table-hover">
										<tr>
											<td>
												<br />
												<div class="alert alert-success alert-dismissable">
													<i class="fa fa-info"></i>
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
													No available campaign resources found. Please proceed to purchase our promotional package. 
													
												</div>
											</td>
										</tr>
								</table>
							<?php } ?>
    </div>
    <!-- ../End Table 2 -->
	
	<!-- ../Table 3 -->
    <div style="padding-top:15px;">
    	<div><b>Payment Details</b></div>
		<?php 
		// check for payment advice on full payment only - advice_type_id = 3
		foreach($reservation['PaymentAdvice'] as $paymentAdvice) {
			if ($paymentAdvice['advice_type_id'] == 3) {
				$printedPaymentAdvice = $paymentAdvice;
				$paymentSchedules = $this->requestAction('/pride/payment_schedules/getPaymentSchedule/'.$paymentAdvice['id']);
			}
		}
		
		//echo $paymentAdvice['id'];
		
		?>
        <table width="90%" border="1" cellspacing="0" cellpadding="0">
			<tr>
				<td style="width:100%;text-align:center;"><div style="padding-left:5px;padding-right:5px;padding-top:5px;padding-bottom:5px;">Summary of Total Payables (RM)<div></td>
			</tr>
			<tr>
				<td style="text-align:center;"><?php echo $this->Number->currency($printedPaymentAdvice['amount'], 'RM '); ?></td>
			</tr>
			
        </table>
    </div>
    <!-- ../End Table 3 -->
	
	<!-- ../Table 3.1 -->
    <div style="padding-top:15px;">
    	<div><b>Payment Schedule</b></div>
		<table width="90%" border="1" cellspacing="0" cellpadding="0">
			<tr>
				<td style="width:170px;text-align:center;">Descriptions</td>
				<td style="width:150px;text-align:center;"><div style="padding-left:5px;padding-right:5px;padding-top:5px;padding-bottom:5px;">Total Payable (RM)<div></td>
				<td style="width:100px;text-align:center;">On/Before Due Date</td>
			</tr>
			<?php
				foreach($paymentSchedules as $paymentSchedule) {
			?>
			<tr>
				<td style="text-align:center;"><?php echo $paymentSchedule['PaymentSchedule']['description']; ?></td>
				<td style="text-align:center;"><?php echo $this->Number->currency($paymentSchedule['PaymentSchedule']['amount'], 'RM '); ?></td>
				<td style="text-align:center;"><?php echo $this->Time->format($paymentSchedule['PaymentSchedule']['due_date'], '%d-%m-%Y'); ?></td>
			</tr>
			<?php } ?>
        </table>
		<div>
        	<i>* The final rate charge is subject to the statutory rates as determind by the Government. The new GST system is effective 1st April 2015 and will be applied to this contract accordingly. The Company reserves the right to collect any statutory tax levied during the contract period.</i>
        </div>
    </div>
    <!-- ../End Table 3.1 -->
	
	<!-- ../Table 1.1 -->
	<?php 
	//looping by campaigns
	foreach ($reservation['Campaign'] as $campaign) {
	
	?>
		<div style="padding-top:15px;">
			<table width="100%" border="1" cellspacing="0" cellpadding="0">
				<tr>
					<td style="padding-left:2px;">Work Order No</td>
					<td style="padding-left:2px;">WO/AMS/OCT/14/2</td>
				</tr>
				<tr>
					<td style="padding-left:2px;">Advertiser</td>
					<td style="padding-left:2px;"><?php //echo $campaign['advertiser_name'] ?></td>
				</tr>
				<tr>
					<td style="padding-left:2px;">Medium</td>
					<td style="padding-left:2px;">Bus Rapid Kuantan - Bus Wrap (drivers side, passenger side and rear side)</td>
				</tr>
				<tr>
					<td style="padding-left:2px;">Product / Sites</td>
					<td style="padding-left:2px;"><?php echo $campaign['name']; ?></td>
				</tr>
				<tr>
					<td style="padding-left:2px;">No. Sites / Units</td>
					<td style="padding-left:2px;">&nbsp;</td>
				</tr>
				<tr>
					<td style="padding-left:2px;">In-Charge</td>
					<td style="padding-left:2px;">
						<?php
							echo $this->Time->format($campaign['start_date'], '%d-%m-%Y');
						?>
					</td>
				</tr>
				<tr>
					<td style="padding-left:2px;">Out-Charge</td>
					<td style="padding-left:2px;">
						<?php 
							echo
							$this->Time->format($campaign['end_date'], '%d-%m-%Y');
						?>
					</td>
				</tr>
				<tr>
					<td style="padding-left:2px;">Period</td>
					<td style="padding-left:2px;">
						<?php 
							$date1 = strtotime($this->Time->format($campaign['start_date'], '%Y-%m-%d'));
							$date2 = strtotime($this->Time->format($campaign['end_date'], '%Y-%m-%d'));
							$total = 0;

							while (($date1 = strtotime('+1 MONTH', $date1)) <= $date2)
							$total++;

							//echo $total;
		
							if ($total == 0) {
								$grandTotal = 1 . ' MONTH';
							}else{
								$grandTotal = $total . ' MONTH(S)';
							}
							echo $grandTotal;
						?>
					</td>
				</tr>
			</table>
		</div>
    <!--../End Table 1.1 -->
	
	<!--../Campaign Order Detail Table 1.2 -->
	<?php 
		$campaignOrderDetails = $this->requestAction('/pride/campaign_order_details/getCampaignOrderDetail/'.$campaign['id']);
		
		foreach($campaignOrderDetails as $campaignOrderDetail) { ?>
			<table class="table table-hover">
				<tr>
					<th>No</th>
					<th style="width:150px;">Model</th>
					<th>Depot</th>
					<th>Route</th>
					<th>Reg. No</th>
					<th>Tenure (Month)</th>
					<th>Period</th>
				</tr>
				<?php $counter = 1;
					foreach ($campaignOrderDetail['ProvisionBus'] as $provisionBus) { 
					// get Job Task Details
					$busDetail = $this->requestAction('/pride/provision_buses/getProvisionBus/'.$provisionBus['id']);
					
					$depot = $this->requestAction('/pride/depots/get_depot/'.$busDetail['ProvisionBus']['depot_id']);
					
					$route = $this->requestAction('/pride/route_details/get_route_details/'.$busDetail['ProvisionBus']['route_id']);
					
					$bus = $this->requestAction('/pride/buses/get_bus/'.$busDetail['ProvisionBus']['bus_id']);
						
						if (!empty($depot)) {
						?>
						<tr>
							<td>
								<?php 
									echo $counter; 
								?>
							</td>
							<td>
								<?php 
									echo $bus['Bus']['brand']; 
								?>
							</td>
							<td>
								<?php 
									echo $depot['Depot']['name']; 
								?>
							</td>
							<td>
								<?php 
									echo $route['RouteDetail']['route_number']; 
								?>
							</td>
							<td>
								<?php 
									echo $bus['Bus']['registration_number']; 
								?>
							</td>
							<td>
								<?php 
									echo $total; 
								?>
							</td>
							<td>
								<?php 
								$jobTask = $this->requestAction('/pride/job_tasks/getJobTaskDetail/'.$campaignOrderDetail['CampaignOrderDetail']['id'].'/'.$provisionBus['id']); 
								
								echo $this->Time->format($jobTask['JobTask']['installation_date'],  '%d/%m/%Y');
								?> - 
								<?php
									$endDate = $this->requestAction('/pride/reservations/getEndDate/'.strtotime($jobTask['JobTask']['installation_date']).'/'.$total); 
									
									echo $this->Time->format($endDate[0][0]['end_date'],  '%d/%m/%Y');;
								?>
							</td>
						</tr>
							
				<?php 	
						$counter++;
						} 
					} // end campaignOrderDetail['ProvisionBus']
				?>
			</table>
	<?php 		} // end campaignOrderDetail	?>
	<!--../End Table 1.2 -->
	<?php 	} // end of campaign ?>
	
	
	<!-- ../Terms & Conditions -->
    <div style="padding-top:15px;">
    	<div style="padding-bottom:5px;"><b>Terms & Conditions</b></div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td style="width:15px;height:15px;vertical-align:text-top;">1.</td>
				<td style="height:17px;vertical-align:text-top;">
					The contract is irrevocable and will be valid for the duration specified in the contract.
				</td>
			</tr>
			<tr>
				<td style="height:15px;vertical-align:text-top;">2.</td>
				<td style="height:30px;vertical-align:text-top;">
					Payment terms : All cheques should be crossed and made payable to <b>Prasarana Integrated Development Sdn. Bhd. (938203-U)</b> full production payment upon booking and the remaining rental payment prior to campaign commencement. Late payments shall incur an interest payment of 0.5% per day.
				</td>
			</tr>
			<tr>
				<td style="height:15px;vertical-align:text-top;">3.</td>
				<td style="height:35px;vertical-align:text-top;">
					The Advertising Agency / Advertiser shall submit two (2) copies of colour visuals before proceeding to Final Artwork / for approval / by the relevant authorities on or before __________________________________________.
				</td>
			</tr>
			<tr>
				<td style="height:15px;vertical-align:text-top;">4.</td>
				<td style="height:18px;vertical-align:text-top;">
					The approved Final Artwork must be submitted to the Company on or before __________________________________________.
				</td>
			</tr>
			<tr>
				<td style="height:15px;vertical-align:text-top;">5.</td>
				<td style="height:18px;vertical-align:text-top;">
					The acceptance of this order shall constitute a contract including terms and conditions as attached hereof.
				</td>
			</tr>
			<tr>
				<td style="height:15px;vertical-align:text-top;">6.</td>
				<td style="height:18px;vertical-align:text-top;">
					Posters produced and supplied by any other source will be not entertained.
				</td>
			</tr>
			<tr>
				<td style="height:15px;vertical-align:text-top;">7.</td>
				<td style="height:15px;vertical-align:text-top;">
					Contracted bus routes are subject to changes within the same zone without prior notice to Advertisers and subject to RapidKL's perogative. The Company will not be held reponsible to the said changes.
				</td>
			</tr>
        </table>
    </div>
    <!-- ../End Terms & Conditions -->
	
	<!-- ../Signatures -->
    <div style="padding-top:30px;">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td style="width:300px;">Signed by</td>
				<td style="width:5px;">}</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:300px;">Signed by</td>
				<td style="width:5px;">}</td>
				<td style="width:200px;">&nbsp;</td>
			</tr>
			<tr>
				<td style="width:300px;">Name</td>
				<td style="width:5px;">}</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:300px;">Name</td>
				<td style="width:5px;">}</td>
				<td style="width:200px;">&nbsp;</td>
			</tr>
			<tr>
				<td style="width:300px;">Designation</td>
				<td style="width:5px;">}</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:300px;">Designation</td>
				<td style="width:5px;">}</td>
				<td style="width:200px;">&nbsp;</td>
			</tr>
			<tr>
				<td style="width:300px;">for/on behalf of</td>
				<td style="width:5px;">}</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:500px;"><b>Prasarana Integrated Development</b></td>
				<td style="width:5px;">}</td>
				<td style="width:200px;">&nbsp;</td>
			</tr>
			<tr>
				<td style="width:300px;">the Advertiser/Agency</td>
				<td style="width:5px;">}</td>
				<td style="width:200px;">____________________________</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:330px;"><b>Sdn. Bhd. (938203-U)</b></td>
				<td style="width:5px;"></td>
				<td style="width:200px;">____________________________</td>
			</tr>
			<tr>
				<td style="width:300px;">Date :</td>
				<td style="width:5px;">&nbsp;</td>
				<td style="width:200px;">Authorised Signature</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:300px;">Date :</td>
				<td style="width:5px;">&nbsp;</td>
				<td style="width:200px;">Authorised Signature</td>
			</tr>
			<tr>
				<td style="width:300px;">&nbsp;</td>
				<td style="width:5px;">&nbsp;</td>
				<td style="width:200px;">Company stamp</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:300px;">&nbsp;</td>
				<td style="width:5px;">&nbsp;</td>
				<td style="width:200px;">Company stamp</td>
			</tr>
        </table>
    </div>
    <!-- ../End Signatures -->
	
	<!----------------------------------------------------- PAGE 2 ---------------------------------------------------------->
	
	<!-- ../Header Title -->
	<div align="right" style="page-break-before:always">
		<table width="20%" border="0" cellspacing="0" cellpadding="0" style="border:1px;border-style:solid">
			<tr>
				<td style="text-align:center;font-size:16px;"><b>WORK ORDER</b></td>
			</tr>
		</table>
	</div>
	<!-- ../End Header Title -->
	
	<!-- ../Header Text -->
    <div style="padding-top:15px;">
    	<table width="98%" border="0" cellspacing="0" cellpadding="0" style="border:0;">
			<tr>
				<td style="text-align:justify;">
					The undersigned contractor hereby contracts with <b>Prasarana Integrated Development Sdn. Bhd. (938203-U)</b>("the Company") for the production of outdoor advertising display on outdoor advertising structures owned or controlled by the Company for the prodcuts or services named herein, upon all terms and conditions set forth and back hereof.
				</td>
			</tr>
        </table>
    </div>
    <!-- ../End Header Text -->
	
	<!-- ../Table 1 -->
    <div style="padding-top:30px;">
    	<table width="100%" border="1" cellspacing="0" cellpadding="0">
			<tr>
				<td style="padding-left:2px;width:200px;">Contract No</td>
				<td style="padding-left:2px;">PRIDE/CD/AMS/RC/2</td>
			</tr>
			<tr>
				<td style="padding-left:2px;">Work Order No</td>
				<td style="padding-left:2px;">WO/AMS/DEC/14/2</td>
			</tr>
			<tr>
				<td style="padding-left:2px;">Agency</td>
				<td style="padding-left:2px;"><?php echo $reservation['0']['Organization']['name'] ?></td>
			</tr>
			<tr>
				<td style="padding-left:2px;">Address</td>
				<td style="padding-left:2px;">
					<?php 
						echo $reservation['Organization']['address'] . 
						'&nbsp;' .
						$reservation['Organization']['address2'] . 
						'&nbsp;' .
						$reservation['Organization']['address3'] .
						'&nbsp;' .
						$reservation['Organization']['postcode'] .
						'&nbsp;' .
						$reservation['Organization']['town'] .
						'&nbsp;' .
						$reservation['Organization']['state'] .
						'&nbsp;' .
						$reservation['Organization']['country'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:2px;">Advertiser</td>
				<td style="padding-left:2px;"><?php echo $reservation['0']['Campaign']['advertiser_name'] ?></td>
			</tr>
			<tr>
				<td style="padding-left:2px;">Address</td>
				<td style="padding-left:2px;">No 14, 14, 18&22, Jalan Nirwana 37, Taman Nirwana, Off Jalan Kampung Pandan, 68000 Ampang</td>
			</tr>
			<tr>
				<td style="padding-left:2px;">Telephone</td>
				<td style="padding-left:2px;"><?php echo $reservation['Organization']['contact_number']; ?></td>
			</tr>
			<tr>
				<td style="padding-left:2px;">Email</td>
				<td style="padding-left:2px;"><?php echo $reservation['Organization']['contact_email']; ?></td>
			</tr>
			<tr>
				<td style="padding-left:2px;">Medium</td>
				<td style="padding-left:2px;">Bus Rapid Kuantan - Bus Wrap (drivers side, passenger side and rear side)</td>
			</tr>
			<tr>
				<td style="padding-left:2px;">Product / Sites</td>
				<td style="padding-left:2px;"><?php echo $reservation['Campaign']['name']; ?></td>
			</tr>
			<tr>
				<td style="padding-left:2px;">No. Sites / Units</td>
				<td style="padding-left:2px;">1 Bus</td>
			</tr>
			<tr>
				<td style="padding-left:2px;">In-Charge</td>
				<td style="padding-left:2px;">
					<?php
						echo $this->Time->format($reservation['Campaign']['start_date'], '%d-%m-%Y');
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:2px;">Out-Charge</td>
				<td style="padding-left:2px;">
					<?php 
						echo
						$this->Time->format($reservation['Campaign']['end_date'], '%d-%m-%Y');
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:2px;">Period</td>
				<td style="padding-left:2px;">
					<?php 
						$total = $reservation['0']['0']['month'];
	
						if ($total == 0) {
							$grandTotal = 1 . ' MONTH';
						}else{
							$grandTotal = $total . ' MONTH(S)';
						}
						echo $grandTotal;
					?>
				</td>
			</tr>
        </table>
    </div>
    <!-- ../End Table 1 -->
	
	<!-- ../Table 2 -->
	<div style="padding-top:30px;">
		<table width="100%" border="1" cellspacing="0" cellpadding="0">
			<tr>
				<td style="width:30px;text-align:center;">No.</td>
				<td style="width:100px;text-align:center;">Model</td>
				<td style="width:100px;text-align:center;">Route</td>
				<td style="width:100px;text-align:center;">Reg No.</td>
				<td style="width:100px;text-align:center;">Depot</td>
				<td style="width:100px;text-align:center;">Display</td>
				<td style="width:100px;text-align:center;">Tenure (Month)</td>
				<td style="width:130px;text-align:center;">Period</td>
				<td style="width:100px;text-align:center;">Remarks</td>
			</tr>
			<tr>
				<td style="text-align:center;">1</td>
				<td style="text-align:center;">Scania 10m</td>
				<td style="text-align:center;">200</td>
				<td style="text-align:center;">CDH 8905</td>
				<td style="text-align:center;">Hentian Bandar</td>
				<td style="text-align:center;">Wrap Around</td>
				<td style="text-align:center;">
					<?php 
						$totalMonth = $reservation['0']['0']['month'];
	
						if ($totalMonth == 0) {
							$month = 1;
						}else{
							$month = $total;
						}
						echo $month;
					?>
				</td>
				<td style="text-align:center;">
					<?php
						echo
						$this->Time->format($reservation['Campaign']['start_date'], '%d/%m/%Y') . ' - ' .
						$this->Time->format($reservation['Campaign']['end_date'], '%d/%m/%Y');
					?>
				</td>
				<td style="text-align:center;">Payable</td>
			</tr>
        </table>
	</div>
	<!-- ../End Table 2 -->
	
	<!-- ../Table 3 -->
    <div style="padding-top:30px;">
    	<div><b>Payment Schedule</b></div>
        <table width="73%" border="1" cellspacing="0" cellpadding="0">
			<tr>
				<td style="width:170px;text-align:center;">Descriptions</td>
				<td style="width:170px;text-align:center;">Period</td>
				<td style="width:100px;text-align:center;">Quantity</td>
				<td style="width:100px;text-align:center;">Unit</td>
				<td style="width:100px;text-align:center;">Price Per Unit (RM)</td>
				<td style="width:100px;text-align:center;">Total Payable (RM)</td>
			</tr>
			<tr>
				<td style="text-align:center;">Charges</td>
				<td style="text-align:center;">
					<?php
						echo
						$this->Time->format($reservation['Campaign']['start_date'], '%d/%m/%Y') . ' - ' .
						$this->Time->format($reservation['Campaign']['end_date'], '%d/%m/%Y');
					?>
				</td>
				<td style="text-align:center;">1</td>
				<td style="text-align:center;">Per Bus</td>
				<td style="text-align:center;">2,400.00</td>
				<td style="text-align:center;">2,400.00</td>
			</tr>
			<tr>
				<td style="text-align:center;">Total Payable</td>
				<td style="text-align:center;">&nbsp;</td>
				<td style="text-align:center;">&nbsp;</td>
				<td style="text-align:center;">&nbsp;</td>
				<td style="text-align:center;">&nbsp;</td>
				<td style="text-align:center;"><b>2,400.00</b></td>
			</tr>
        </table>
    </div>
    <!-- ../End Table 3 -->
	
	<!-- ../Terms & Conditions -->
    <div style="padding-top:30px;">
    	<div style="padding-bottom:5px;"><b>Terms & Conditions</b></div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td style="width:15px;height:15px;vertical-align:text-top;">1.</td>
				<td style="height:17px;vertical-align:text-top;">
					The acceptance of this order shall constitute a contract including terms and conditions as attached hereof and an agreement for PAN to proceed with printing.
				</td>
			</tr>
			<tr>
				<td style="height:15px;vertical-align:text-top;">2.</td>
				<td style="height:17px;vertical-align:text-top;">
					Posters produced and supplied by any other source will not be entertained.
				</td>
			</tr>
			<tr>
				<td style="height:15px;vertical-align:text-top;">3.</td>
				<td style="height:17px;vertical-align:text-top;">
					The copy of SPAD compliance must be submitted to the respect depots and Prasarana Integrated Sdn. Bhd. prior to installation commencement.
				</td>
			</tr>
			<tr>
				<td style="height:15px;vertical-align:text-top;">4.</td>
				<td style="height:17px;vertical-align:text-top;">
					Payment shall be made upon satifactory delivery of the contracted work duty acknowledge by PRIDE representative.
				</td>
			</tr>
			<tr>
				<td style="height:15px;vertical-align:text-top;">5.</td>
				<td style="height:17px;vertical-align:text-top;">
					PAN to ensure installation commencement by __________________________________________.
				</td>
			</tr>
        </table>
    </div>
    <!-- ../End Terms & Conditions -->
	
	<!-- ../Signatures -->
    <div style="padding-top:30px;">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td style="width:400px;">Contractor's Authorised Signatory</td>
				<td style="width:5px;">}</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:300px;">Signed by</td>
				<td style="width:5px;">}</td>
				<td style="width:200px;">&nbsp;</td>
			</tr>
			<tr>
				<td style="width:300px;">Name</td>
				<td style="width:5px;">}</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:300px;">Name</td>
				<td style="width:5px;">}</td>
				<td style="width:200px;">&nbsp;</td>
			</tr>
			<tr>
				<td style="width:300px;">Designation</td>
				<td style="width:5px;">}</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:300px;">Designation</td>
				<td style="width:5px;">}</td>
				<td style="width:200px;">&nbsp;</td>
			</tr>
			<tr>
				<td style="width:300px;">
					<b><?php echo $reservation['Organization']['name']; ?></b>
				</td>
				<td style="width:5px;">}</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:500px;"><b>Prasarana Integrated Development</b></td>
				<td style="width:5px;">}</td>
				<td style="width:200px;">&nbsp;</td>
			</tr>
			<tr>
				<td style="width:300px;">
					<b><?php echo '('.$reservation['Organization']['roc'].')'; ?></b>
				</td>
				<td style="width:5px;">&nbsp;</td>
				<td style="width:200px;">____________________________</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:330px;"><b>Sdn. Bhd. (938203-U)</b></td>
				<td style="width:5px;"></td>
				<td style="width:200px;">____________________________</td>
			</tr>
			<tr>
				<td style="width:300px;">Date :</td>
				<td style="width:5px;">&nbsp;</td>
				<td style="width:200px;">Authorised Signature</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:300px;">Date :</td>
				<td style="width:5px;">&nbsp;</td>
				<td style="width:200px;">Authorised Signature</td>
			</tr>
			<tr>
				<td style="width:300px;">&nbsp;</td>
				<td style="width:5px;">&nbsp;</td>
				<td style="width:200px;">Company stamp</td>
				<td style="width:200px;">&nbsp;</td>
				<td style="width:300px;">&nbsp;</td>
				<td style="width:5px;">&nbsp;</td>
				<td style="width:200px;">Company stamp</td>
			</tr>
		</table>
	</div>
	<!-- ../End Signatures -->
</body>
</html>