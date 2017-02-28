<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Add New Campaign
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">My Campaign</a></li>
		<li class="active">Add New Campaign</li>
	</ol>
</section>

<section class="content">
<?php echo $this->Form->create('Campaign'); ?>
	<?php 
		echo $this->Form->input('id');
		$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
		echo $this->Form->hidden('organization_id', array(
			'label' => 'Organization Id',
			'value' => CakeSession::read('Auth.User.Organization.id'),
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
				<td style="height:40px;width:20%;color:black"><?php echo $label; ?> Name</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 
						echo $this->Session->read('Auth.User.Organization.name');
					?>
				</td>
			  </tr>
			  <?php if ($this->Session->read('Auth.User.Organization.alias') != Configure::read('AMS.role_pride_advertiser')) { // if organization not advertiser. ?>
			  <tr>
				<td style="height:40px;width:20%;color:black">Advertiser Name</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 
						echo $this->Form->input('id');
						$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
						echo $this->Form->hidden('organization_id', array(
							'label' => 'Organization Id',
							'value' => CakeSession::read('Auth.User.Organization.id'),
						));
						echo $this->Form->input('advertiser_name', array( 
							'type'=>'text',
							'style' => 'width:370px'
						));
					?>
				</td>
			  </tr>
			  <?php } ?>
			  <tr>
				<td style="height:40px;width:11%;color:black">Campaign Name</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="width:1000px;height:40px;">
					<?php 
						echo $this->Form->input('name', array( 
							'type'=>'text',
							'style' => 'width:370px'
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">Start Date</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->input('start_date',array(
						   'id' => 'CampaignStartDate', 
						   'type'=>'text'
						));
					?>
				</td>
			  </tr>
			  <tr>
				<td style="height:40px;color:black">End Date</td>
				<td style="width:30px;">:</td>
				<td colspan="3" style="height:40px;">
					<?php
						echo $this->Form->input('end_date',array(
						   'id' => 'CampaignEndDate', 
						   'type'=>'text'
						));
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
				$this->Form->button(__d('croogo', 'Save'), array('class' => 'btn btn-primary')) . '&nbsp;&nbsp;' .
				$this->Form->button(__d('croogo', 'Reset'), array('type'=>'reset', 'class' => 'btn btn-info')).'&nbsp;&nbsp;'.
				$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('class' => 'btn btn-danger'));
			?>
		</div>
	  </div>
	</div>
<?php echo $this->Form->end(); ?>
</section>


<!-- -------------------------------- -->



<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Campaign Order Details');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Campaign Order Details'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['CampaignOrderDetail']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Campaign Order Details: ' . $this->data['CampaignOrderDetail']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('CampaignOrderDetail');

?>
<div class="campaignOrderDetails row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Campaign Order Detail'), '#campaign-order-detail');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='campaign-order-detail' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('campaign_id', array(
					'label' => 'Campaign Id',
				));
				echo $this->Form->input('job_id', array(
					'label' => 'Job Id',
				));
				echo $this->Form->input('isSubmitted', array(
					'label' => 'IsSubmitted',
				));
				echo $this->Form->input('status', array(
					'label' => 'Status',
				));
				echo $this->Form->input('updated_by', array(
					'label' => 'Updated By',
				));
				echo $this->Form->input('created_by', array(
					'label' => 'Created By',
				));
			?>
			</div>
			<?php echo $this->Croogo->adminTabs(); ?>
		</div>

	</div>

	<div class="span4">
	<?php
		echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
			$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply')) .
			$this->Form->button(__d('croogo', 'Save'), array('class' => 'btn btn-primary')) .
			$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('class' => 'btn btn-danger')) .
			$this->Html->endBox();
		?>
	</div>

</div>
<?php echo $this->Form->end(); ?>
