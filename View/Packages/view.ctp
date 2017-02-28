<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Package Details
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">List of Packages</a></li>
		<li class="active">Package Details</li>
	</ol>
</section>

<section class="content">
	<div class="box box-primary">
		<div class="box-header">
		</div>
		<div class="box-body table-responsive no-padding">
			<table class="table table-hover">
					<tr>
						<td style="height:40px;width:18%;color:black">Business Owner</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php 
								$org_name =  $this->requestAction('/pride/organizations/get_organization/'.$package['Package']['organization_id']);
								
								echo $org_name['Organization']['name'];
							?>
							
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Package Item Type</td>
						<td style="width:30px;">:</td>
						<td style="height:40px;">
							<?php								
								$item_name =  $this->requestAction('/pride/itemTypes/get_item/'.$package['Package']['item_type_id']);

								echo $item_name['ItemType']['name'];
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Package Name</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php
								echo $package['Package']['name'];
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Package Quantity</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php
								echo $package['Package']['quantity'];
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Package Paid</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php
								echo $package['Package']['paid'];
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Package Free Of Charge</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php
								echo $package['Package']['foc'];
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Package Duration</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php
								echo $package['Package']['duration'];
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Package Duration Unit</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php
								echo $package['Package']['duration_unit'];
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px; color:black">Package Price</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php
								echo $package['Package']['price'];
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;width:11%;color:black">Package Price Unit</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php
								echo $package['Package']['price_unit'];
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;width:11%;color:black">Package Discount</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php
								echo $package['Package']['discount'];
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;width:11%;color:black">Package Production Cost (RM)</td>
						<td style="width:30px;">:</td>
						<td colspan="2" style="width:1000px;height:40px;">
							<?php
								echo $package['Package']['production_cost'];
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Package Image</td>
						<td style="width:30px;">:</td>
						<td style="height:40px;">
							<?php	
								echo $this->Html->link(__('Click here to view'), "/packages/".$package['Package']['image'], array('target' => '_blank', 'escape'=>false)); 
							?>
						</td>
					</tr>
					<tr>
						<td style="height:40px;color:black">Status</td>
						<td style="width:30px;">:</td>
						<td style="height:40px;">
							<?php
								echo $package['Package']['status'];
							?>
						</td>
					</tr>
				</table>  
			</div>
			<div class="panel-footer">
				<div class="span12" align="center">
					<?php
						echo $this->Html->link(__d('croogo', 'Back'), array('action' => 'index'), array('class' => 'btn btn-danger'));
					?>
				</div>
			</div>
		</div>
	</div>
</section>