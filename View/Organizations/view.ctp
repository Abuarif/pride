<style type="text/css">
    .popover{
        max-width:800px;
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Submitted Application
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li class="active">Submitted Application</li>
	</ol>
</section>

<section class="content">

<!-- Custom location sessionFlash -->	
    <div style="margin-left:-14px;">	
        <?php echo $this->Layout->sessionFlash(); ?>
    </div>
<!--./location sessionFlash -->

<!-- Organization Details -->
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Organization Details</h3>
			<div class="box-tools">
				<?php if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_finance') ) { ?>
					<div class="no-margin pull-right">
						<?php
							echo $this->Html->link($this->Form->button('<i class="fa fa-print"></i>&nbsp;&nbsp;&nbsp;Print All', array('class'=>'btn btn-warning', 'style'=>'color:#fff;width:100px;')), array('action' => 'organization_forms', $organization['Organization']['id'], 'ext' => 'pdf'), array('target'=>'_blank','escape'=>false));
							
							//echo $this->Html->link($this->Form->button('<i class="fa fa-print"></i>&nbsp;&nbsp;&nbsp;Print All', array('class'=>'btn btn-warning', 'style'=>'color:#fff;width:100px;')), array('action' => 'debug_org_details', $organization['Organization']['id']), array('target'=>'_blank','escape'=>false));
						?>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="box-body table-responsive no-padding">
			<table class="table table-hover">
				<tr>
					<th style="width:230px;">Organization Name</th>
					<td style="width:30px;">:</td>
					<td><?php echo h($organization['Organization']['name']); ?></td>
				</tr>
				<tr>
					<th>Organization Type</th>
					<td>:</td>
					<td>
						<?php 
							echo $organizationType['OrganizationType']['name'];
						?>
					</td>
				</tr>
				<tr>
					<th>Organization ROC</th>
					<td>:</td>
					<td><?php echo h($organization['Organization']['roc']); ?></td>
				</tr>
				<tr>
					<th>Organization Address</th>
					<td>:</td>
					<td>
						<?php 
							echo $organization['Organization']['address'].
							'&nbsp;'.
							$organization['Organization']['address2'].
							'&nbsp;'.
							$organization['Organization']['address3'].
							'&nbsp;'.
							$organization['Organization']['postcode'].
							'&nbsp;'.
							$organization['Organization']['town'].
							'&nbsp;'.
							$organization['Organization']['state'].
							'&nbsp;'.
							$organization['Organization']['country'];
						?>
					</td>
				</tr>
				<tr>
					<th>Authorized Personnel Full Name</th>
					<td>:</td>
					<td>
						<?php 
							//echo $this->Session->read('Auth.User.name'); 
							echo $organization['Organization']['contact_person'];
						?>
					</td>
				</tr>
				<tr>
					<th>Office Telephone No</th>
					<td>:</td>
					<td>
						<?php 
							/*echo 
							$this->Session->read('Auth.User.Organization.contact_number') .
							'&nbsp;&nbsp;&nbsp;&nbsp;' . '(<b>Ext :</b>' . '&nbsp;&nbsp;' . 
							$this->Session->read('Auth.User.Organization.extension') . ')'; */
							
							echo 
							$organization['Organization']['contact_number'] .
							'&nbsp;&nbsp;&nbsp;&nbsp;' . '(<b>Ext :</b>' . '&nbsp;&nbsp;' . 
							$organization['Organization']['extension'] . ')';
						?>
					</td>
				</tr>
				<tr>
					<th>Direct Line Telephone No</th>
					<td>:</td>
					<td>
						<?php 
							//echo $this->Session->read('Auth.User.Organization.directline'); 
							echo $organization['Organization']['directline'];
						?>
					</td>
				</tr>
				<tr>
					<th>Fax No</th>
					<td>:</td>
					<td>
						<?php 
							//echo $this->Session->read('Auth.User.Organization.fax_number'); 
							echo $organization['Organization']['fax_number'];
						?>
					</td>
				</tr>
				<tr>
					<th>Mobile Phone No</th>
					<td>:</td>
					<td>
						<?php 
							echo $myUsers[0]['users']['mobile_number'];
						?>
					</td>
				</tr>
				<tr>
					<th>Organization Website</th>
					<td>:</td>
					<td><?php echo h($organization['Organization']['website']); ?></td>
				</tr>
				<tr>
					<th>Corporate E-mail</th>
					<td>:</td>
					<td><?php echo h($organization['Organization']['contact_email']); ?></td>
				</tr>
				<tr>
					<th>Paid Up Capital</th>
					<td>:</td>
					<td><?php echo 'RM' . h($organization['Organization']['paid_capital']); ?></td>
				</tr>
				<tr>
					<th>Authorized Capital</th>
					<td>:</td>
					<td><?php echo 'RM'. h($organization['Organization']['authorized_capital']); ?></td>
				</tr>
				<tr>
					<th>Number of Staffs</th>
					<td>:</td>
					<td><?php echo h($organization['Organization']['staffs']); ?></td>
				</tr>
				<tr>
					<th>Date Registered</th>
					<td>:</td>
					<td>
						<?php 
							$dateReg = $this->Session->read('Auth.User.created');
							echo $this->Time->format($dateReg, '%d %B %Y'); 
						?>
					</td>
				</tr>
			</table>
		</div>
	</div>
<!-- End Organization Details -->

<!-- List of Share Holders -->
	<div class="box box-info">
		<div class="box-header">
			<h3 class="box-title">List of Share Holders</h3>
			<div class="box-tools"></div>
		</div>
		<div class="box-body table-responsive no-padding">
			<?php if(!empty($organization['OrganizationShareholder'])) {?>
				<table class="table table-hover">
					<tr>
						<th style="text-align:center;width:30px;height:30px;">No</th>
						<th style="text-align:center;width:150px;height:30px;">Full Name</th>
						<th style="text-align:center;width:200px;height:30px;">MyKad / Passport Number / MyCoID</th>
						<th style="text-align:center;width:30px;height:30px;">Director</th>
						<th style="text-align:center;width:30px;height:30px;">Shareholder</th>
						<th style="text-align:center;width:30px;height:30px;">Key Personnel</th>
						<th style="text-align:center;width:100px;height:30px;">Shares Allotted</th>
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
						<td style="text-align:center;width:30px;height:30px;"><?php echo $counter; ?></td>
						<td style="text-align:center;width:50px;height:30px;"><?php echo $shareHolder['name']; ?></td>
						<td style="text-align:center;width:50px;height:30px;"><?php echo $shareHolder['nric']; ?></td>
						<td style="text-align:center;width:50px;height:30px;">
							<?php 
								if($shareHolder['is_director'] == true){
									echo ($shareHolder['is_director'] ? '<i class="fa fa-check-circle" style = "color:green"></i>': ''); 
								}else{
									echo '<i class="fa fa-times-circle" style = "color:red"></i>';
								}
							?>
						</td>
						<td style="text-align:center;width:50px;height:30px;">
							<?php 
								
								if($shareHolder['is_shareholder'] == true){
									echo ($shareHolder['is_shareholder'] ? '<i class="fa fa-check-circle" style = "color:green"></i>': ''); 
								}else{
									echo '<i class="fa fa-times-circle" style = "color:red"></i>'; 
								}
							?>
						</td>
						<td style="text-align:center;width:50px;height:30px;">
							<?php 
								if($shareHolder['is_active_personal'] == true){
									echo ($shareHolder['is_active_personal'] ? '<i class="fa fa-check-circle" style = "color:green"></i>': ''); 
								}else{
									echo '<i class="fa fa-times-circle" style = "color:red"></i>';
								}
							?>
						</td>
						<td style="text-align:center;width:50px;height:30px;"><?php echo $this->Number->currency($shareHolder['shareholding'], 'RM'); ?></td>
					</tr>
					<?php $counter++ ?>
					<?php endforeach; ?>
				</table>
			<?php }else{ ?>
				
				<table class="table table-hover">
					<tr>
						<td>
							<br />
							<div class="alert alert-success alert-dismissable">
								<i class="fa fa-info"></i>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								No list of share holders are available.
							</div>
						</td>
					</tr>
				</table>
			
			<?php } ?>
		</div>
	</div>
<!-- End List of Share Holders -->

<!--List of Key Personnels -->
	<div class="box box-danger">
		<div class="box-header">
			<h3 class="box-title">List of Key Personnels</h3>
			<div class="box-tools"></div>
		</div>				
		<div class="box-body table-responsive no-padding">
			<?php if(!empty($organization['OrganizationKeyPersonnel'])) {?> 
				<table class="table table-hover">
					<tr>
						<th style="text-align:center;width:30px;height:30px;">No</th>
						<th style="text-align:center;width:200px;height:30px;"><?php echo __('Full Name'); ?></th>
						<th style="text-align:center;width:150px;height:30px;"><?php echo __('Position'); ?></th>
						<th style="text-align:center;width:30px;height:30px;"><?php echo __('Background'); ?></th>
					</tr>
					<?php 
						$page = $this->params['paging']['OrganizationKeyPersonnel']['page'];
						$limit = $this->params['paging']['OrganizationKeyPersonnel']['limit'];
						$counter = ($page * $limit) - $limit + 1; 
					?>
					<?php foreach ($organization['OrganizationKeyPersonnel'] as $keyPersonnel): ?>
					<tr>
						<td style="text-align:center;width:30px;height:30px;"><?php echo $counter; ?></td>
						<td style="text-align:center;width:200px;height:30px;"><?php echo $keyPersonnel['name']; ?></td>
						<td style="text-align:center;width:30px;height:30px;"><?php echo $keyPersonnel['position']; ?></td>
						<td style="text-align:center;width:30px;height:30px;">
							<button type="button" data-container="body" data-toggle="popover" data-placement="left" data-content="<?php echo $keyPersonnel['background']; ?>" style="background-color:transparent;border:none;">
									 <span class="label label-danger">View Details</span>
							</button>
						</td>										
					</tr>
					<?php $counter++ ?>
					<?php endforeach; ?>
				</table>
			<?php }else{ ?>
			
				<table class="table table-hover">
					<tr>
						<td>
							<br />
							<div class="alert alert-success alert-dismissable">
								<i class="fa fa-info"></i>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								No list of key personnel are available.
							</div>
						</td>
					</tr>
				</table>
			
			<?php } ?>
		</div>
	</div>
<!-- End List of Key Personnels -->

<!-- Uploaded Documents -->
	<div class="box box-success">
		<div class="box-header">
			<h3 class="box-title">Uploaded Documents</h3>
			<div class="box-tools"></div>
		</div>
		<div class="box-body table-responsive no-padding">
			<?php if (!empty($organization['OrganizationAttachment'])) { ?>
			<table class="table table-hover">
			<tr>
				<th style="text-align:center;width:50px;height:30px;">No</th>
				<th style="text-align:center;width:600px;height:30px;"><?php echo __('Title'); ?></th>
				<th style="text-align:center;width:80px;height:30px;"><?php echo __('Files'); ?></th>
			</tr>
			<?php 
				$page = $this->params['paging']['OrganizationAttachment']['page'];
				$limit = $this->params['paging']['OrganizationAttachment']['limit'];
				$counter = ($page * $limit) - $limit + 1; 
			?>
			<?php foreach ($organization['OrganizationAttachment'] as $organizationAttachment): ?>
				<tr>
					<td style="text-align:center;width:30px;height:30px;"><?php echo $counter; ?></td>
					<td style="text-align:center;width:50px;height:30px;"><?php echo $organizationAttachment['name']; ?></td>
					<td style="text-align:center;width:50px;height:30px;">
					<?php	echo $this->Html->link('Click here', "/attachments/".$organizationAttachment['files'], array('target' => '_blank')); ?>
					</td>
				</tr>
			<?php $counter++ ?>
			<?php endforeach; ?>
			</table>
			
			<?php }else{ ?>
			
			<table class="table table-hover">
					<tr>
						<td>
							<br />
							<div class="alert alert-success alert-dismissable">
								<i class="fa fa-info"></i>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								No uploaded documents are available.
							</div>
						</td>
					</tr>
			</table>
			
			<?php } ?>
		</div>
	</div>
<!-- End Upload Documentation -->

<!-- ../temporary closed
<div class="box box-warning">
	<div class="box-header">
		<h3 class="box-title">Related Users</h3>
		<div class="box-tools"></div>
	</div>
	<div class="box-body table-responsive no-padding">
		<?php if (!empty($organization['User'])) { ?>
		<table class="table table-hover">
		<tr>
			<th style="text-align:center;width:30px;height:30px;">No</th>
			<th style="text-align:center;width:150px;height:30px;"><?php echo __('Name'); ?></th>
			<th style="text-align:center;width:50px;height:30px;"><?php echo __('Username'); ?></th>
			<th style="text-align:center;width:50px;height:30px;"><?php echo __('Email'); ?></th>
			<th style="text-align:center;width:50px;height:30px;"><?php echo __('Image'); ?></th>
		</tr>
		<?php $counter = 1; ?>
		<?php foreach ($organization['User'] as $user): ?>
			<tr>
				<td style="text-align:center;width:30px;height:30px;vertical-align:middle;"><?php echo $counter; ?></td>
				<td style="text-align:center;width:150px;height:30px;vertical-align:middle;"><?php echo $user['name']; ?></td>
				<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php echo $user['username']; ?></td>
				<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php echo $user['email']; ?></td>
				<td style="text-align:center;width:50px;height:30px;vertical-align:middle;">
					<?php if($user['image'] != '') { ?>
						<?php	echo $this->Html->image("../profiles/".$user['image'], array('height'=> '30', 'width'=>'30'),array('style' => 'float:right')); ?>
					<?php } else {?>
						<?php	echo $this->Html->image("../uploads/empty.jpg", array('height'=> '30', 'width'=>'30'),array('style' => 'float:right')); ?>
					<?php } ?>
				</td>
				
			</tr>
		<?php $counter++ ?>
		<?php endforeach; ?>
		</table>
		
		<?php }else{ ?>
			
		<table class="table table-hover">
				<tr>
					<td>
						<br />
						<div class="alert alert-success alert-dismissable">
							<i class="fa fa-info"></i>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							No related users are available.
						</div>
					</td>
				</tr>
		</table>
		
		<?php } ?>
	</div>
</div>	
../temporary closed  -->

<!-- Organization Discounts -->
	<?php if(!empty($organization['OrganizationDiscount'])) {?>
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"> Discounted Rates </h3>
				<div class="box-tools">
					<?php if ($this->Session->read('Auth.User.Role.alias') == Configure::read('AMS.role_pride_finance')) {?>
						<div class="no-margin pull-right">
							<?php
								echo $this->Html->link($this->Form->button('<i class="fa fa-upload"></i>&nbsp;&nbsp;&nbsp;Assign Discounted Rate', array('class'=>'btn btn-warning', 'style'=>'color:#fff;width:300px;')), array('plugin' => 'pride', 'controller' => 'organization_discounts', 'action' => 'add', $organization['Organization']['id']), array('escape'=>false));
								
								//echo $this->Html->link('aaa', array('plugin' => 'pride', 'controller' => 'organization_discounts', 'action' => 'add', $organization['Organization']['id']), array('escape'=>false));
							?>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="box-body table-responsive no-padding">
				<?php if (!empty($organization['OrganizationDiscount'])) { ?>
				<table class="table table-hover">
					<tr>
						<th style="text-align:center;width:30px;height:30px;">No</th>
						<th style="text-align:center;width:50px;height:30px;"><?php echo __('Rates'); ?></th>
						<th style="text-align:center;width:50px;height:30px;"><?php echo __('Validity Start Date'); ?></th>
						<th style="text-align:center;width:50px;height:30px;"><?php echo __('Validity End Date'); ?></th>
						<th style="text-align:center;width:50px;height:30px;"><?php echo __('Status'); ?></th>
						<th style="text-align:center;width:50px;height:30px;"><?php echo __('Assigned By'); ?></th>
						<th style="text-align:center;width:50px;height:30px;">Actions</th>
					</tr>
					<?php 
						$page = $this->params['paging']['OrganizationDiscount']['page'];
						$limit = $this->params['paging']['OrganizationDiscount']['limit'];
						$counter = ($page * $limit) - $limit + 1; 
					?>
					<?php foreach ($organization['OrganizationDiscount'] as $discount): ?>
						<?php 
							$assigner = $this->requestAction('/users/users/get_user/'. $discount['user_id'] ); 
						?>
						<tr>
							<td style="text-align:center;width:30px;height:30px;vertical-align:middle;"><?php echo $counter; ?></td>
							<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php echo $discount['rate']; ?></td>
							<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php echo $this->Time->format($discount['validity_start_date'], '%d-%m-%Y');  ?></td>
							<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php	echo $this->Time->format($discount['validity_end_date'], '%d-%m-%Y'); ?></td>
							<td style="text-align:center;width:50px;height:30px;vertical-align:middle;">
								<?php 
									if($discount['status'] == true){
										echo ($discount['status'] ? '<i class="fa fa-check-circle" style = "color:green"></i>': ''); 
									}else{
										echo '<i class="fa fa-times-circle" style = "color:red"></i>';
									}
								?>
							</td>
							<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php echo $assigner['User']['name']; ?></td>
							<td class="actions" style="text-align:center;width:30px;height:30px;">
								<?php
									//echo $this->Html->link('', array('plugin' => 'pride', 'controller' => 'organization_discounts', 'action' => 'view', $discount['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View Discount Rate', 'escape' => false));
									
								?>
								&nbsp;&nbsp;
								<?php
									echo $this->Html->link('', array('plugin' => 'pride', 'controller' => 'organization_discounts', 'action' => 'edit', $discount['id']), array('class'=>'fa fa-pencil', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Edit Discount Rate',
									'escape' => false));
									
								?>
								&nbsp;&nbsp;
								<?php								
									echo $this->Form->postLink('', array('plugin' => 'pride', 'controller' => 'organization_discounts', 'action' => 'delete', $discount['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete the rate : %s?', $discount['rate'])));
								?>							
							</td>
						</tr>
					<?php $counter++ ?>
					<?php endforeach; ?>
					</table>
					<?php }else{ ?>
				
					<table class="table table-hover">
						<tr>
							<td>
								<br />
								<div class="alert alert-success alert-dismissable">
									<i class="fa fa-info"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									No discount rate is awarded.
								</div>
							</td>
						</tr>
					</table>
					
					<?php } ?>
					
			</div>
		</div>
	<?php } ?>
<!-- End Organization Discounts -->

<!-- Payment Advices -->
	<?php if(!empty($organization['PaymentAdvice'])) {?>
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Payment Advices</h3>
				<div class="box-tools">
					
				</div>
			</div>
			<div class="box-body table-responsive no-padding">
				<?php if (!empty($organization['PaymentAdvice'])) { ?>
				<table class="table table-hover">
					<tr>
						<th style="text-align:center;width:30px;height:30px;">No</th>
						<th style="text-align:center;width:50px;height:30px;"><?php echo __('Invoice Number'); ?></th>
						<th style="text-align:center;width:50px;height:30px;"><?php echo __('Payment Type'); ?></th>
						<th style="text-align:center;width:50px;height:30px;"><?php echo __('Invoice for Download'); ?></th>
						<th style="text-align:center;width:50px;height:30px;"><?php echo __('Payment Receipt'); ?></th>
						<th style="text-align:center;width:50px;height:30px;"><?php echo __('Receipt File'); ?></th>
						<th style="text-align:center;width:50px;height:30px;"><?php echo __('Amount Due'); ?></th>
						<th style="text-align:center;width:50px;height:30px;"><?php echo __('Updated'); ?></th>
						<th style="text-align:center;width:50px;height:30px;">Actions</th>
					</tr>
					<?php 
						$page = $this->params['paging']['PaymentAdvice']['page'];
						$limit = $this->params['paging']['PaymentAdvice']['limit'];
						$counter = ($page * $limit) - $limit + 1; 
					?>
					<?php foreach ($organization['PaymentAdvice'] as $advice): ?>
						<tr>
							<td style="text-align:center;width:30px;height:30px;vertical-align:middle;"><?php echo $counter; ?></td>
							<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php echo $advice['invoice_number']; ?></td>
							<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php $adviceType =  $this->requestAction('/pride/advice_types/get_advice_type/'.$advice['advice_type_id']); echo $adviceType['AdviceType']['name']; ?></td>
							<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php	echo $this->Html->link('Download', "/payments/".$advice['invoice_attachment'], array('target' => '_blank')); ?></td>
							<td style="text-align:center;width:50px;height:30px;vertical-align:middle;">
							<?php if (!empty($advice['receipt_number'])) { ?>
								<?php echo $advice['receipt_number']; ?>
							<?php } else { ?>
								Please update your receipt number
							<?php } ?>
							</td>
							<td style="text-align:center;width:50px;height:30px;vertical-align:middle;">
							<?php if (!empty($advice['receipt_attachment'])) { ?>
								<?php	echo $this->Html->link('Download', "/payments/".$advice['receipt_attachment'], array('target' => '_blank')); ?>
							<?php } else { ?>
								Pending receipt file
							<?php } ?>
							</td>
							<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php echo $this->Number->currency($advice['amount'], 'RM'); ?></td>
							<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php echo $this->Time->niceShort($advice['updated']); ?></td>
							<td class="actions" style="text-align:center;width:30px;height:30px;">
								<?php
									echo $this->Html->link('', array('plugin' => 'members', 'controller' => 'payment_advices', 'action' => 'view', $advice['id']), array('class'=>'fa fa-desktop', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'View Payment Advice',
									'escape' => false));
									
								?>
								&nbsp;&nbsp;
								<?php
									echo $this->Html->link('', array('plugin' => 'members', 'controller' => 'payment_advices', 'action' => 'edit', $advice['id']), array('class'=>'fa fa-pencil', 'style'=>'color:#000;','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Edit Payment Advice',
									'escape' => false));
									
								?>
								&nbsp;&nbsp;
								<?php								
									echo $this->Form->postLink('', array('plugin' => 'members', 'controller' => 'payment_advices', 'action' => 'delete', $advice['id'], $organization['Organization']['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete invoice no : %s?', $advice['invoice_number'])));
								?>							
							</td>
						</tr>
					<?php $counter++ ?>
					<?php endforeach; ?>
					</table>
					<?php }else{ ?>
				
					<table class="table table-hover">
						<tr>
							<td>
								<br />
								<div class="alert alert-success alert-dismissable">
									<i class="fa fa-info"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									No payment advices are available yet.
								</div>
							</td>
						</tr>
					</table>
					
					<?php } ?>
			</div>
		</div>
	<?php } ?>
<!-- End Payment Advices -->
</section>