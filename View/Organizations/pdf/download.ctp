<!-- Organization Details -->
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Organization Details 123</h3>
			<div class="box-tools">
			</div>
		</div>
		<div class="box-body table-responsive no-padding">			
			<table class="table table-hover">
				<tr>
					<th style="width:130px;">Name</th>
					<td style="width:30px;">:</td>
					<td><?php echo h($organization['Organization']['name']); ?></td>
				</tr>
				<tr>
					<th>ROC</th>
					<td>:</td>
					<td><?php echo h($organization['Organization']['roc']); ?></td>
				</tr>
				<tr>
					<th>Address</th>
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
					<th>Contact Person</th>
					<td>:</td>
					<td><?php echo h($organization['Organization']['contact_person']); ?></td>
				</tr>
				<tr>
					<th>Telephone No</th>
					<td>:</td>
					<td><?php echo h($organization['Organization']['contact_number']); ?></td>
				</tr>
				<tr>
					<th>Fax No</th>
					<td>:</td>
					<td><?php echo h($organization['Organization']['fax_number']); ?></td>
				</tr>
				<tr>
					<th>Corporate E-mail</th>
					<td>:</td>
					<td><?php echo h($organization['Organization']['contact_email']); ?></td>
				</tr>
			</table>
		</div>	
	</div>
<!-- End Organization Details -->

<!-- Related Attachments -->
	<div class="box box-danger">
		<div class="box-header">
			<h3 class="box-title">Related Attachments</h3>
			<div class="box-tools"></div>
		</div>
		<div class="box-body table-responsive no-padding">
			<?php if (!empty($organization['OrganizationAttachment'])) {?>
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
					<?php	echo $this->Html->link('Click here', "/attachments/".$organizationAttachment['files'], array('target' => '_blank')); ?>
					</td>
				</tr>
			<?php $counter++ ?>
			<?php endforeach; ?>
			</table>
			
			<?php }else{ ?>
			
			<table class="table table-hover">
					<tr style="background:#F1F0F0;">
						<th style="text-align:center;width:30px;height:30px;">No</th>
						<th style="text-align:center;width:50px;height:30px;">Title</th>
						<th style="text-align:center;width:50px;height:30px;">Files</th>
						
					</tr>
					<tr>
						<td style="text-align:center;width:30px;height:30px;">&nbsp;</td>
						<td style="text-align:center;width:50px;height:30px;">&nbsp;</td>
						<td style="text-align:center;width:50px;height:30px;">&nbsp;</td>
						
					</tr>
			</table>
			<?php } ?>
		</div>
	</div>	
<!-- End Related Attachments -->

<!-- Related Users -->
	<div class="box box-success">
		<div class="box-header">
			<h3 class="box-title">Related Users</h3>
			<div class="box-tools"></div>
		</div>
		<div class="box-body table-responsive no-padding">
			<?php if (!empty($organization['OrganizationAttachment'])): ?>
			<table class="table table-hover">
				<tr>
					<th style="text-align:center;width:30px;height:30px;">No</th>
					<th style="text-align:center;width:50px;height:30px;"><?php echo __('Name'); ?></th>
					<th style="text-align:center;width:50px;height:30px;"><?php echo __('Username'); ?></th>
					<th style="text-align:center;width:50px;height:30px;"><?php echo __('Email'); ?></th>
					<th style="text-align:center;width:50px;height:30px;"><?php echo __('Image'); ?></th>
				</tr>
				<?php 
					$page = $this->params['paging']['User']['page'];
					$limit = $this->params['paging']['User']['limit'];
					$counter = ($page * $limit) - $limit + 1; 
				?>
				<?php foreach ($organization['User'] as $user): ?>
					<tr>
						<td style="text-align:center;width:30px;height:30px;vertical-align:middle;"><?php echo $counter; ?></td>
						<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php echo $user['name']; ?></td>
						<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php echo $user['username']; ?></td>
						<td style="text-align:center;width:50px;height:30px;vertical-align:middle;"><?php echo $user['email']; ?></td>
						<td style="text-align:center;width:50px;height:30px;vertical-align:middle;">
							<?php if($user['image'] != '') { ?>
								<?php	echo $this->Html->image("../../profiles/".$user['image'], array('height'=> '50', 'width'=>'50'),array('style' => 'float:right')); ?>
							<?php } else {?>
								<?php	echo $this->Html->image("../../uploads/empty.jpg", array('height'=> '50', 'width'=>'50'),array('style' => 'float:right')); ?>
							<?php } ?>
						</td>
					</tr>
				<?php $counter++ ?>
				<?php endforeach; ?>
				</table>
			<?php endif; ?>
		</div>
	</div>
<!-- End Related Users -->

<!-- Approval -->
	<div class="box box-info">
		<div class="box-header">
			<h3 class="box-title">Approvals</h3>
			<div class="box-tools">
			</div>
		</div>
		<div class="box-body table-responsive no-padding">			
			<?php if (!empty($organization['OrganizationApproval'])): ?>
				<table class="table table-hover">
					<?php foreach ($organization['OrganizationApproval'] as $organizationApproval): ?>
					<?php if ($organizationApproval['role_id'] == $this->Session->read('Auth.User.Role.id')) { ?>
					<tr>
						<th style="width:130px;">Action</th>
						<td style="width:30px;">:</td>
						<td>
							<?php 
								echo 
								'<i class="fa fa-user" style="color:red;"></i>' .
								'&nbsp;&nbsp;'.
								$this->Html->link(__($organizationApproval['name']), 
								array('controller' => 'organization_approvals', 'action' => 'edit', $organizationApproval['id'])
								); 
							?>
						</td>
					</tr>
					<tr>
						<th>Comments</th>
						<td>:</td>
						<td>
							<?php
								echo $organization['OrganizationApproval'][0]['comments'];
							?>
						</td>
					</tr>
					<?php } ?>
					<?php endforeach; ?>
				</table>
			<?php endif; ?>
		</div>	
	</div>		
<!-- End Approval -->