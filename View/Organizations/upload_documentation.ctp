<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Upload Documentation
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li class="active">Upload Documentation</li>
	</ol>
</section>

<section class="content">
	<!-- Custom location sessionFlash -->
		<div style="margin-left:-14px;">
			<?php echo $this->Layout->sessionFlash(); ?>
		</div>
	<!--./location sessionFlash -->
	
	<?php if (empty($organization['OrganizationAttachment'])){ ?>
		<div class="alert alert-info alert-dismissable">
			<i class="fa fa-info"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			No uploaded documents are available.
		</div>
	<?php } ?>
	
	 <?php if ($this->Session->read('Auth.User.Organization.isSubmitted')) { ?>
	 
					<!--Content Uploaded Documentation -->
						<div class="box box-primary">
							<div class="box-body table-responsive no-padding">
								<!-- list document references -->								
								
								<table class="table table-hover">
								<tr>
									<th style="text-align:center;width:30px;height:30px;">No</th>
									<th style="text-align:center;width:150px;height:30px;"><?php echo __('Title'); ?></th>
									<th style="text-align:center;width:30px;height:30px;"><?php echo __('Requirement'); ?></th>
									<th style="text-align:center;width:30px;height:30px;"><?php echo __('Status'); ?></th>
									<th class="actions" style="text-align:center;width:30px;height:30px;">Action</th>
								</tr>
								<?php 
									$page = $this->params['paging']['DocumentReference']['page'];
									$limit = $this->params['paging']['DocumentReference']['limit'];
									$counter = ($page * $limit) - $limit + 1; 
								?>
								<?php foreach ($documentReferences as $documentReference): ?>
								
									<?php
										$orgId = $this->Session->read('Auth.User.organization_id');
										$myDoc = $this->requestAction('/pride/organization_attachments/getFilename/'.$orgId.'/'.$documentReference['DocumentReference']['id']);
									?>
									
									<tr>
										<td style="text-align:center;width:30px;height:30px;"><?php echo $counter; ?></td>
										<td style="text-align:center;width:50px;height:30px;"><?php echo $documentReference['DocumentReference']['name']; ?></td>
										
										<td style="text-align:center;width:50px;height:30px;"><?php if ($documentReference['DocumentReference']['doc_type'] == 1) { ?> 
										<a href="<?php echo $this->webroot.'pride/organization_attachments/add_doc/'.$documentReference['DocumentReference']['id'] ?>"><span class="label label-danger">Mandatory</span></a>
										<?php } else { ?>
										<a href="<?php echo $this->webroot.'pride/organization_attachments/add_doc/'.$documentReference['DocumentReference']['id'] ?>"><span class="label label-warning">Optional</span></a>
										<?php } ?>
										</td>
										
										<td style="text-align:center;width:30px;height:30px;">
											
											<?php if (!empty($myDoc)) { ?>
												
												<?php	echo $this->Html->link('<span class="label label-success">Uploaded</span>', "/attachments/".$myDoc[0]['OrganizationAttachment']['files'], array('target' => '_blank',  'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View uploaded file', 'escape' => false));			?>
											<?php } ?>
											
										</td>
										<td style="text-align:center;width:30px;height:30px;">
											<?php			
												echo $this->Html->link('', array('controller' => 'organization_attachments', 'action' => 'add_doc', $documentReference['DocumentReference']['id']), array('class'=>'fa fa-upload', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Upload', 'escape' => false, ));			
											?>
											
											&nbsp;&nbsp;
											
											<?php if (!empty($myDoc)) {
													echo $this->Form->postLink('', array('controller' => 'organization_attachments', 'action' => 'delete', $myDoc[0]['OrganizationAttachment']['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete file name %s?', $myDoc[0]['OrganizationAttachment']['name'])));	
												}
											?>
										</td>
									</tr>
								<?php $counter++ ?>
								<?php endforeach; ?>
								</table>
								
								<!-- end list document references -->
								
							</div>
						</div>
					<!-- End Content Uploaded Documentation -->
	 
	 <?php }else{ ?>
	
	<?php if (!empty($organization['OrganizationAttachment'])){ ?>
	<!-- Invisible Frame -->
		<div class="panel panel-default">
			  <div class="panel-body">
				<div class="tab-content">				
	<?php } ?>
					<!--Content Uploaded Documentation -->
						<div class="box box-primary">
							<div class="box-header">
								<h3 class="box-title">&nbsp;</h3>
								<div class="box-tools">
									<div class="no-margin pull-right">
										<?php
											echo $this->Html->link($this->Form->button('<i class="fa fa-file"></i>&nbsp;&nbsp;Add New Attachment', array('class'=>'btn btn-warning', 'style'=>'color:#fff;margin-top:-1.5px;')), array('plugin' => 'pride', 'controller' => 'organization_attachments','action' => 'add'), array('escape'=>false));
										?>
									</div>
								</div>
							</div>
							<div class="box-body table-responsive no-padding">
								<!-- list document references -->								
								
								<table class="table table-hover">
								<tr>
									<th style="text-align:center;width:30px;height:30px;">No</th>
									<th style="text-align:center;width:150px;height:30px;"><?php echo __('Title'); ?></th>
									<th style="text-align:center;width:30px;height:30px;"><?php echo __('Requirement'); ?></th>
									<th style="text-align:center;width:30px;height:30px;"><?php echo __('Status'); ?></th>
									<th class="actions" style="text-align:center;width:30px;height:30px;">Action</th>
								</tr>
								<?php 
									$page = $this->params['paging']['DocumentReference']['page'];
									$limit = $this->params['paging']['DocumentReference']['limit'];
									$counter = ($page * $limit) - $limit + 1; 
								?>
								<?php foreach ($documentReferences as $documentReference): ?>
								
									<?php
										$orgId = $this->Session->read('Auth.User.organization_id');
										$myDoc = $this->requestAction('/pride/organization_attachments/getFilename/'.$orgId.'/'.$documentReference['DocumentReference']['id']);
									?>
									
									<tr>
										<td style="text-align:center;width:30px;height:30px;"><?php echo $counter; ?></td>
										<td style="text-align:center;width:50px;height:30px;"><?php echo $documentReference['DocumentReference']['name']; ?></td>
										
										<td style="text-align:center;width:50px;height:30px;"><?php if ($documentReference['DocumentReference']['doc_type'] == 1) { ?> 
										<a href="<?php echo $this->webroot.'pride/organization_attachments/add_doc/'.$documentReference['DocumentReference']['id'] ?>"><span class="label label-danger">Mandatory</span></a>
										<?php } else { ?>
										<a href="<?php echo $this->webroot.'pride/organization_attachments/add_doc/'.$documentReference['DocumentReference']['id'] ?>"><span class="label label-warning">Optional</span></a>
										<?php } ?>
										</td>
										
										<td style="text-align:center;width:30px;height:30px;">
											
											<?php if (!empty($myDoc)) { ?>
												
												<?php	echo $this->Html->link('<span class="label label-success">Uploaded</span>', "/attachments/".$myDoc[0]['OrganizationAttachment']['files'], array('target' => '_blank',  'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View uploaded file', 'escape' => false));			?>
											<?php } ?>
											
										</td>
										<td style="text-align:center;width:30px;height:30px;">
											<?php			
												echo $this->Html->link('', array('controller' => 'organization_attachments', 'action' => 'add_doc', $documentReference['DocumentReference']['id']), array('class'=>'fa fa-upload', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Upload', 'escape' => false, ));			
											?>
											
											&nbsp;&nbsp;
											
											<?php if (!empty($myDoc)) {
													echo $this->Form->postLink('', array('controller' => 'organization_attachments', 'action' => 'delete', $myDoc[0]['OrganizationAttachment']['id']), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete file name %s?', $myDoc[0]['OrganizationAttachment']['name'])));	
												}
											?>
										</td>
									</tr>
								<?php $counter++ ?>
								<?php endforeach; ?>
								</table>
								
								<!-- end list document references -->
								
							</div>
						</div>
					<!-- End Content Uploaded Documentation -->
				<?php 
					if (!empty($organization['OrganizationAttachment']))
					{ 
						if ($this->requestAction('/pride/organization_attachments/count_attachment/'.$orgId) == $this->requestAction('/pride/document_references/total_mandatory') ) 
							{
				?>
				</div>
			  </div>
			 
			  <div class="panel-footer">
				<div class="span12" align="center">
					<?php
						echo
							$this->Html->link(__d('croogo', 'Submit Application'), array('plugin' => 'pride', 'controller' => 'organizations', 'action' => 'submit_application', $organization['Organization']['id']), array('class' => 'btn btn-primary'));
					?>
					</div>
			  </div>
			  
			</div>
			<!-- End Invisible Frame -->
			<?php 
					}
				}
			?>
	<?php } ?>
</section>