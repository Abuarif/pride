<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Create New Resources Reservation
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">My Reservations</a></li>
		<li class="active">Create New Resources</li>
	</ol>
</section>

<section class="content">
	<!-- Custom location sessionFlash -->
		<div style="margin-left:-14px;">
			<?php echo $this->Layout->sessionFlash(); ?>
		</div>
	<!--./location sessionFlash -->
	
<?php echo $this->Form->create('Reservation'); ?>
	<?php 
		echo $this->Form->input('id');
		$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
		echo $this->Form->hidden('organization_id', array(
			'value' => CakeSession::read('Auth.User.Organization.id'),
		));
		echo $this->Form->hidden('user_id', array(
			'value' => CakeSession::read('Auth.User.id'),
		));
	?>
	<div class="panel panel-default">
	  <div class="panel-body">
		<div class="tab-content">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<?php 
					if ($this->Session->read('Auth.User.Organization.alias') != Configure::read('AMS.role_pride_advertiser')) { // if organization not advertiser. 
						$orgType = $this->requestAction('/pride/organization_types/get_organization_type/'.$this->Session->read('Auth.User.Organization.organization_type_id'));
						$label = $orgType['OrganizationType']['name'];
					
					}
				?>
			  <tr>
				<td style="height:40px;width:10%;color:black"><?php echo $label; ?> Name</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 
						echo $this->Session->read('Auth.User.Organization.name');
					?>
				</td>
			  </tr>
			  
			</table>  
		</div>
	  </div>
	  <div class="panel-footer">
		<div class="span12" align="center">
			<?php
				echo 
				$this->Form->button(__d('croogo', 'Confirm'), array('class' => 'btn btn-primary')) . '&nbsp;&nbsp;' .
				$this->Html->link(__d('croogo', 'Cancel'), array('plugin' => 'members', 'controller' => 'members', 'action' => 'advertiser_dashboard'), array('class' => 'btn btn-danger'));
			?>
		</div>
	  </div>
	</div>
<?php echo $this->Form->end(); ?>
</section>

