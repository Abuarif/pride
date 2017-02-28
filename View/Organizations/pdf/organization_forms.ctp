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
				<td style="text-align:center;font-size:16px;"><b>FORM A</b></td>
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
				<td style="padding-left:5px;width:280px;height:40px;">Organization Name</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo $organization['Organization']['name'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Organization Type</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo $organizationType['OrganizationType']['name'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Organization ROC</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo $organization['Organization']['roc'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Organization Address</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo 
						$organization['Organization']['address'];
						/*.'&nbsp;'.
						$organization['Organization']['address2']
						.'&nbsp;'.
						$organization['Organization']['address3']
						.'&nbsp;'.
						$organization['Organization']['postcode']
						.'&nbsp;'.
						$organization['Organization']['town']
						.'&nbsp;'.
						$organization['Organization']['state']
						.'&nbsp;'.
						$organization['Organization']['country'];*/
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Organization Address Street Name 1</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo $organization['Organization']['address2'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Organization Address Street Name 2</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo $organization['Organization']['address3'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Organization Address Postcode</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo $organization['Organization']['postcode'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Organization Address Town</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo $organization['Organization']['town'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Organization Address State</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo $organization['Organization']['state'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Organization Address Country</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo $organization['Organization']['country'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Authorized Personnel Name</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo $organization['Organization']['contact_person'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Office Telephone No</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo
						$organization['Organization']['contact_number'] .
						'&nbsp;&nbsp;&nbsp;&nbsp;' . '(<b>Ext :</b>' . '&nbsp;&nbsp;' . 
						$organization['Organization']['extension'] . ')';
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Direct Line Telephone No</td>
				<td style="padding-left:5px;height:40px;">
					<?php 
						echo $organization['Organization']['directline'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Fax No</td>
				<td style="padding-left:5px;height:40px;">
					<?php 
						echo $organization['Organization']['fax_number'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Mobile Phone No</td>
				<td style="padding-left:5px;height:40px;">
					<?php
						echo $myUsers[0]['users']['mobile_number'];
					?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Organization Website</td>
				<td style="padding-left:5px;height:40px;">
					<?php echo h($organization['Organization']['website']); ?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Corporate E-mail</td>
				<td style="padding-left:5px;height:40px;">
					<?php echo h($organization['Organization']['contact_email']); ?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Paid Up Capital</td>
				<td style="padding-left:5px;height:40px;">
					<?php echo 'RM' . h($organization['Organization']['paid_capital']); ?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Authorized Capital</td>
				<td style="padding-left:5px;height:40px;">
					<?php echo 'RM'. h($organization['Organization']['authorized_capital']); ?>
				</td>
			</tr>
			<tr>
				<td style="padding-left:5px;height:40px;">Number of Staffs</td>
				<td style="padding-left:5px;height:40px;">
					<?php echo h($organization['Organization']['staffs']); ?>
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
	
	<!----------------------------------------------------- PAGE 2 ---------------------------------------------------------->
	
	<!-- ../Table 2 -->
	<div style="padding-top:40px;page-break-before:always">
		<!-- ../Header Title -->
		<div align="right">
			<table width="20%" border="1" cellspacing="0" cellpadding="0">
				<tr>
					<td style="text-align:center;font-size:16px;"><b>FORM B</b></td>
				</tr>
			</table>
		</div>
		<!-- ../End Header Title -->
		
		<div style="padding-top:15px;">
			<table width="100%" border="1" cellspacing="0" cellpadding="0">
				<tr>
					<td colspan="7" style="padding-left:5px;width:250px;height:40px;"><b>SHARE HOLDERS</b></td>
				</tr>
				<tr>
					<td style="width:50px;height:40px;text-align:center;">No</td>
					<td style="padding-left:8px;width:600px;height:40px;text-align:left;">Name</td>
					<td style="width:250px;height:40px;text-align:center;">MyKad / Passport No / MyCoID</td>
					<td style="width:120px;height:40px;text-align:center;">Director</td>
					<td style="width:120px;height:40px;text-align:center;">Shareholder</td>
					<td style="width:170px;height:40px;text-align:center;">Key Personnel</td>
					<td style="width:150px;height:40px;text-align:center;">Shares Alloted</td>
				</tr>
				
				<?php 
					$page = $this->params['paging']['OrganizationShareholder']['page'];
					$limit = $this->params['paging']['OrganizationShareholder']['limit'];
					$counter = ($page * $limit) - $limit + 1; 
				
				foreach ($organization['OrganizationShareholder'] as $shareHolder): 
					$orgId = $this->Session->read('Auth.User.organization_id');
					//$myDoc = $this->requestAction('/pride/organization_attachments/getFilename/'.$orgId.'/'.$documentReference['DocumentReference']['id']);
				?>			
				
				<tr>
					<td style="height:40px;text-align:center;">
						<?php echo $counter; ?>
					</td>
					<td style="padding-left:8px;height:40px;text-align:left;">
						<?php echo $shareHolder['name']; ?>
					</td>
					<td style="height:40px;text-align:center;">
						<?php echo $shareHolder['nric']; ?>
					</td>
					<td style="height:40px;text-align:center;">
						<?php 
							if($shareHolder['is_director'] == true){
								echo ($shareHolder['is_director'] ? '&#x2714;': ''); 
							}else{
								echo '&#x2716;';
							}
						?>
					</td>
					<td style="height:40px;text-align:center;">
						<?php 
								
							if($shareHolder['is_shareholder'] == true){
								echo ($shareHolder['is_shareholder'] ? '&#x2714;': ''); 
							}else{
								echo '&#x2716;'; 
							}
						?>
					</td>
					<td style="height:40px;text-align:center;">
						<?php 
							if($shareHolder['is_active_personal'] == true){
								echo ($shareHolder['is_active_personal'] ? '&#x2714;': ''); 
							}else{
								echo '&#x2716;';
							}
						?>
					</td>
					<td style="height:40px;text-align:center;">
						<?php echo $this->Number->currency($shareHolder['shareholding'], 'RM'); ?>
					</td>
				</tr>
				<?php $counter++ ?>
				<?php endforeach; ?>
			</table>
		</div>
	</div>	
	<!-- ../End Table 2 -->
	
	<!----------------------------------------------------- PAGE 3 ---------------------------------------------------------->
	
	<!-- ../Table 3 -->
    <div style="padding-top:40px;page-break-before:always">
		<!-- ../Header Title -->
		<div align="right">
			<table width="20%" border="1" cellspacing="0" cellpadding="0">
				<tr>
					<td style="text-align:center;font-size:16px;"><b>FORM C</b></td>
				</tr>
			</table>
		</div>
		<!-- ../End Header Title -->
		
		<div style="padding-top:15px;">
			<table width="100%" border="1" cellspacing="0" cellpadding="0">
				<tr>
					<td colspan="3" style="padding-left:5px;width:250px;height:40px;"><b>KEY PERSONNELS</b></td>
				</tr>
				<tr>
					<td style="width:50px;height:40px;text-align:center;">No</td>
					<td style="padding-left:8px;width:1500px;height:40px;text-align:left;">Name</td>
					<td style="width:1500px;height:40px;text-align:center;">Position</td>
				</tr>
				<?php 
					$page = $this->params['paging']['OrganizationKeyPersonnel']['page'];
					$limit = $this->params['paging']['OrganizationKeyPersonnel']['limit'];
					$counter = ($page * $limit) - $limit + 1; 
					
					foreach ($organization['OrganizationKeyPersonnel'] as $keyPersonnel): 
				?>
				<tr>
					<td style="height:40px;text-align:center;">
						<?php echo $counter; ?>
					</td>
					<td style="padding-left:8px;height:40px;text-align:left;">
						<?php echo $keyPersonnel['name']; ?>
					</td>
					<td style="height:40px;text-align:center;">
						<?php echo $keyPersonnel['position']; ?>
					</td>
				</tr>
				<?php $counter++ ?>
				<?php endforeach; ?>
			</table>
		</div>
    </div>
    <!-- ../End Table 3 -->
	
	<!----------------------------------------------------- PAGE 4 ---------------------------------------------------------->
    
    <!-- ../Header Title -->
	<div align="right" style="page-break-before:always">
		<table width="20%" border="1" cellspacing="0" cellpadding="0">
			<tr>
				<td style="text-align:center;font-size:16px;"><b>FORM D</b></td>
			</tr>
		</table>
	</div>
	<!-- ../End Header Title -->
    
    <!-- ../Table 1 -->
    <div style="padding-top:15px;">
    	<table width="100%" border="1" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan="2" style="padding-left:5px;width:250px;height:40px;"><b>UPLOADED DOCUMENTS</b></td>
			</tr>
			<tr>
				<td style="width:50px;height:40px;text-align:center;">No</td>
				<td style="padding-left:8px;width:2000px;height:40px;text-align:left;">Document Title</td>
			</tr>
			<?php 
				$page = $this->params['paging']['OrganizationAttachment']['page'];
				$limit = $this->params['paging']['OrganizationAttachment']['limit'];
				$counter = ($page * $limit) - $limit + 1; 
				
				foreach ($organization['OrganizationAttachment'] as $organizationAttachment): 
			?>
            <tr>
				<td style="width:50px;height:40px;text-align:center;">
					<?php echo $counter; ?>
				</td>
				<td style="padding-left:8px;width:2000px;height:40px;text-align:left;">
					<?php echo $organizationAttachment['name']; ?>
				</td>
			</tr>
            <?php $counter++ ?>
			<?php endforeach; ?>
        </table>
    </div>
    <!-- ../End Table 1 -->
	
	<!-- ../Table 2 -->
	<?php if(!empty($organization['OrganizationDiscount'])) { ?>
		<div style="padding-top:40px;">
			<table width="100%" border="1" cellspacing="0" cellpadding="0">
				<tr>
					<td colspan="7" style="padding-left:5px;width:250px;height:40px;"><b>DISCOUNTED RATES</b></td>
				</tr>
				<tr>
					<td style="width:50px;height:40px;text-align:center;">No</td>
					<td style="padding-left:8px;width:350px;height:40px;text-align:center;">Rates</td>
					<td style="width:350px;height:40px;text-align:center;">Validity Start Date</td>
					<td style="width:350px;height:40px;text-align:center;">Validity End Date</td>
					<td style="width:350px;height:40px;text-align:center;">Status</td>
					<td style="width:350px;height:40px;text-align:center;">Assigned By</td>
				</tr>
				<?php 
						$page = $this->params['paging']['OrganizationDiscount']['page'];
						$limit = $this->params['paging']['OrganizationDiscount']['limit'];
						$counter = ($page * $limit) - $limit + 1; 
						
						foreach ($organization['OrganizationDiscount'] as $discount): 
						
						$assigner = $this->requestAction('/users/users/get_user/'. $discount['user_id'] );
				?>
				<tr>
					<td style="height:40px;text-align:center;">
						<?php echo $counter; ?>
					</td>
					<td style="padding-left:8px;height:40px;text-align:center;">
						<?php echo $discount['rate']; ?>
					</td>
					<td style="height:40px;text-align:center;">
						<?php echo $this->Time->format($discount['validity_start_date'], '%d-%m-%Y');  ?>
					</td>
					<td style="height:40px;text-align:center;">
						<?php	echo $this->Time->format($discount['validity_end_date'], '%d-%m-%Y'); ?>
					</td>
					<td style="height:40px;text-align:center;">
						<?php 
							if($discount['status'] == true){
								echo ($discount['status'] ? '&#x2714;': ''); 
							}else{
								echo '&#x2716;';
							}
						?>
					</td>
					<td style="height:40px;text-align:center;">
						<?php echo $assigner['User']['name']; ?>
					</td>
				</tr>
				<?php $counter++ ?>
				<?php endforeach; ?>
			</table>
		</div>
	<?php } ?>
	<!-- ../End Table 2 -->
	
	<!-- ../Table 3 -->
	<?php if(!empty($organization['PaymentAdvice'])) { ?>
		<div style="padding-top:40px;">
			<table width="100%" border="1" cellspacing="0" cellpadding="0">
				<tr>
					<td colspan="7" style="padding-left:5px;width:250px;height:40px;"><b>PAYMENT ADVICES</b></td>
				</tr>
				<tr>
					<td style="width:50px;height:40px;text-align:center;">No</td>
					<td style="width:300px;height:40px;text-align:center;">Invoice No</td>
					<td style="width:300px;height:40px;text-align:center;">Payment Type</td>
					<td style="width:300px;height:40px;text-align:center;">Payment Receipt</td>
					<td style="width:200px;height:40px;text-align:center;">Amount Due</td>
					<td style="width:300px;height:40px;text-align:center;">Updated</td>
				</tr>
				<?php 
						$page = $this->params['paging']['PaymentAdvice']['page'];
						$limit = $this->params['paging']['PaymentAdvice']['limit'];
						$counter = ($page * $limit) - $limit + 1; 
						
						foreach ($organization['PaymentAdvice'] as $advice): 
				?>
				<tr>
					<td style="height:40px;text-align:center;">
						<?php echo $counter; ?>
					</td>
					<td style="height:40px;text-align:center;">
						<?php echo $advice['invoice_number']; ?>
					</td>
					<td style="height:40px;text-align:center;">
						<?php 
							$adviceType =  $this->requestAction('/pride/advice_types/get_advice_type/'.$advice['advice_type_id']); echo $adviceType['AdviceType']['name']; 
						?>
					</td>
					<td style="height:40px;text-align:center;">
						<?php 
							if (!empty($advice['receipt_number'])) {
								echo $advice['receipt_number'];
							} else {
								echo 'Please update your receipt number';
							} 
						?>
					</td>
					<td style="height:40px;text-align:center;">
						<?php echo $this->Number->currency($advice['amount'], 'RM'); ?>
					</td>
					<td style="height:40px;text-align:center;">
						<?php //echo $this->Time->niceShort($advice['updated']); ?>
						<?php echo $this->Time->format($advice['updated'], '%d/%m/%Y'); ?>
					</td>
				</tr>
				<?php $counter++ ?>
				<?php endforeach; ?>
			</table>
		</div>	
	<?php } ?>
	<!-- ../End Table 3 -->
</body>
</html>