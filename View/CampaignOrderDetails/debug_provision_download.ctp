<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AMS::Advertisement Management System</title>

<style type="text/css">
html,
body{
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;	
}
</style>

</head>

<body>
	<!-- ../Header Title -->
	<div align="right">
		<table width="20%" border="1" cellspacing="0" cellpadding="0">
			<tr>
				<td style="text-align:center;font-size:16px;"><b>VISUAL FORM A</b></td>
			</tr>
		</table>
	</div>
	<!-- ../End Header Title -->
	
	<!-- ../Table 1 -->
    <div style="padding-top:15px;">
    	<table width="100%" border="1" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan="2" style="padding-left:5px;width:250px;height:40px;"><b>ORGANIZATION DETAILS</b></td>
		    </tr>
			<tr>
				<td style="padding-left:5px;width:250px;height:40px;">Organization Name</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo $myOrg['Organization']['name'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Organization Type</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo $myOrgTypes[0]['organization_types']['name'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Organization ROC</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo $myOrg['Organization']['roc'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Organization Address</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo 
						$myOrg['Organization']['address']
						.'&nbsp;'.
						$myOrg['Organization']['address2']
						.'&nbsp;'.
						$myOrg['Organization']['address3']
						.'&nbsp;'.
						$myOrg['Organization']['postcode']
						.'&nbsp;'.
						$myOrg['Organization']['town']
						.'&nbsp;'.
						$myOrg['Organization']['state']
						.'&nbsp;'.
						$myOrg['Organization']['country'];
						
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Authorized Personnel Full Name</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo $myOrg['Organization']['contact_person'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Office Telephone No</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo
						$myOrg['Organization']['contact_number'] .
						'&nbsp;&nbsp;&nbsp;&nbsp;' . '(<b>Ext :</b>' . '&nbsp;&nbsp;' . 
						$myOrg['Organization']['extension'] . ')';
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Direct Line Telephone No</td>
				<td style="padding-left:5px;height:40px;">
					<?php 
						echo $myOrg['Organization']['directline'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Fax No</td>
				<td style="padding-left:5px;height:40px;">
					<?php 
						echo $myOrg['Organization']['fax_number'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Mobile Phone No</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo $myOrganizations[0]['users']['mobile_number'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Organization Website</td>
				<td style="padding-left:5px;height:40px;">
					<?php echo h($myOrg['Organization']['website']); ?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Corporate E-mail</td>
				<td style="padding-left:5px;height:40px;">
					<?php echo h($myOrg['Organization']['contact_email']); ?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Paid Up Capital</td>
				<td style="padding-left:5px;height:40px;">
					<?php echo 'RM' . h($myOrg['Organization']['paid_capital']); ?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Authorized Capital</td>
				<td style="padding-left:5px;height:40px;">
					<?php echo 'RM'. h($myOrg['Organization']['authorized_capital']); ?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Number of Staffs</td>
				<td style="padding-left:5px;height:40px;">
					<?php echo h($myOrg['Organization']['staffs']); ?>
				</td>
			</tr>
            <tr>
				<td style="padding-left:5px;height:40px;">Date Registered</td>
				<td style="padding-left:5px;height:40px;">
					<?php 
						$dateReg = $this->Session->read('Auth.User.created');
						echo $this->Time->format($dateReg, '%d %B %Y'); 
					?>
				</td>
			</tr>
        </table>
    </div>
    <!-- ../End Table 1 -->
	
	<!-- ../Table 2 -->
	<div style="padding-top:40px;">
        <table width="100%" border="1" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan="2" style="padding-left:5px;width:250px;height:40px;"><b>ORDER DETAILS</b></td>
		    </tr>
			<tr>
				<td style="padding-left:5px;width:250px;height:40px;">Depot</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo $myDepots[0]['depots']['name'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Route</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo $myRoutes[0]['routes']['route_number'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Bus Registration Number</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo $myBuses[0]['buses']['name'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Tag Number</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo $myCampaignDesigns[0]['campaign_designs']['tag_code'];
					?>
				</td>
			</tr>
        </table>
	</div>	
	<!-- ../End Table 2 -->
	
	<!----------------------------------------------------- PAGE 2 ---------------------------------------------------------->
	
	<!-- ../Table 3 -->
	<div style="page-break-before:always">
		<!-- ../Header Title -->
		<div align="right">
			<table width="20%" border="1" cellspacing="0" cellpadding="0">
				<tr>
					<td style="text-align:center;font-size:16px;"><b>VISUAL FORM B</b></td>
				</tr>
			</table>
		</div>
		<!-- ../End Header Title -->
		
		<div style="padding-top:15px;">
			<table width="100%" border="1" cellspacing="0" cellpadding="0">
				<tr>
					<td style="padding-left:5px;width:250px;height:40px;"><b>VISUAL DESIGN</b></td>
				</tr>
				<tr>
					<td style="text-align:center;width:50px;height:30px;padding-top:40px;padding-bottom:40px;">
						<?php	
							echo $this->Html->image('http://'.$_SERVER['SERVER_NAME'].Router::url('/')."attachments/".$myCampaignDesigns[0]['campaign_designs']['files'], array('height'=> '400', 'width'=>'500'),array('style' => 'float:right'));
						?>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<!-- ../End Table 2 -->
</body>
</html>