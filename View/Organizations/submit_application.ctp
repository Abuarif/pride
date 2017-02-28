<style type="text/css">
    .popover{
        max-width:800px;
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Application Submission
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li class="active">Application Submission</li>
	</ol>
</section>

<section class="content">
<!-- Organization Details -->
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="tab-content">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Organization Details</h3>
						<div class="box-tools">
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
							//echo $this->Session->read('Auth.User.mobile_number'); 
							echo $organization['User'][0]['mobile_number'];
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
					<div class="box-body table-responsive no-padding"><table class="table table-hover">
						<?php if(!empty ($organization['OrganizationShareholder'])) { ?>
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
									<td style="text-align:center;width:100px;height:30px;">
										<?php echo $this->Number->currency($shareHolder['shareholding'], 'RM'); ?>
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
												No organization shared holder was declared.
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
						<?php if(!empty($organization['OrganizationKeyPersonnel'])) { ?>
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
												No organization key personnel was declared.
											</div>
										</td>
									</tr>
							</table>
						
						<?php } ?>
					</div>
				</div>
			<!-- End List of Key Personnels -->

			<!-- Documentation -->
				<div class="box box-success">
					<div class="box-header">
						<h3 class="box-title">Uploaded Documents</h3>
						<div class="box-tools">
							
						</div>
					</div>
					<div class="box-body table-responsive no-padding">
						<?php if (!empty($organization['OrganizationAttachment'])): ?>
						<table class="table table-hover">
						<tr>
							<th style="text-align:center;width:30px;height:30px;">No</th>
							<th style="text-align:center;width:150px;height:30px;"><?php echo __('Title'); ?></th>
							<th style="text-align:center;width:80px;height:30px;"><?php echo __('Files'); ?></th>
						</tr>
						<?php $counter = 1; ?>
						<?php foreach ($organization['OrganizationAttachment'] as $organizationAttachment): ?>
							<tr>
								<td style="text-align:center;width:30px;height:30px;"><?php echo $counter; ?></td>
								<td style="text-align:center;width:50px;height:30px;"><?php echo $organizationAttachment['name']; ?></td>
								<td style="text-align:center;width:50px;height:30px;">
								<?php	echo $this->Html->link('Click here', "/attachments/".$organizationAttachment['files'], array('target' => '_blank'));			?>
								</td>
							</tr>
						<?php $counter++ ?>
						<?php endforeach; ?>
						</table>
						<?php endif; ?>
					</div>
				</div>
			<!-- End Documentation -->

			<!-- ../Temporary Closed../Registered User
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Registered User</h3>
					<div class="box-tools"></div>
				</div>
				<div class="box-body table-responsive no-padding">
					<?php if (!empty($organization['User'])): ?>
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
				<?php endif; ?>
				</div>
			</div>	
			../Temporary Closed/..End Registered Users -->
		</div>
	</div>
	
	<?php echo $this->Form->create('OrganizationApproval'); ?>
	<div class="panel-footer">
		<div class="span12" align="center">
			<?php
				echo $this->Form->input('id', array(
					'value' => $this->Session->read('Auth.User.organization_id'),
				));
				echo $this->Form->button(__d('croogo', 'Submit'), array('class' => 'btn btn-primary'))
				.'&nbsp;&nbsp;'.
				$this->Html->link(__d('croogo', 'Cancel'), array('plugin' => 'members', 'controller' => 'members', 'action' => 'index'), array('class' => 'btn btn-danger')) ;
			?>
		</div>
	</div>
	<?php echo $this->Form->end(); ?>
</section>