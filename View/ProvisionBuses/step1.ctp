<?php
	echo $this->Html->css(array(
            'checkout',
            //'bootstrap.min',
        ));
?>

<div class="checkout-wrap">
	<ul class="checkout-bar">
		<li class="visited first active">
			Service Depot
		</li>
		<li class="next">
			Route
		</li>
		<li class="">
			Bus & Visual
		</li>
	</ul>
</div>
<br/><br/><br/><br/><br/><br/>


<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Provision Buses - Step 1');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Provision Buses - Step 1'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['ProvisionBus']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Provision Buses: ' . $this->data['ProvisionBus']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}
$this->Html->script('prototype', array('inline' => false));

echo $this->Form->create('ProvisionBus');

?>


<div class="provisionBuses row-fluid">
<div class="container"> 
	<div class="span8">
			<!--
			<div class="progress">
			  <div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
				<span class="sr-only">Step 1</span>
			  </div>
			</div>
			
			-->
		<div>
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->hidden('campaign_order_id', array(
					'value' => $this->request->data['ProvisionBus']['campaign_order_id'],
				));
				echo $this->Form->hidden('order_number', array(
					'value' => $this->request->data['ProvisionBus']['order_number'],
				));
				echo $this->Form->input('depot_id', array(
					'id'	=> 'Depots',
					'label' => 'Your Choosen Service Depot',
					'empty' => '-- Pick a Depot / Service Area --' ,
				));
				
			?>
			</div>
			
		</div>

	</div>
	<br/><br/>
	<div class="span8">
		<div class="panel-group" id="accordion">
		  <div class="panel panel-default">
			<div class="panel-heading">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
				  <div class="box-title" style="color:#000;font-size:14px">
					<i class="icon-list" style="text-decoration:none"></i>
						Action
				 </div>
				</a>
			  </h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse in">
			  <div class="panel-body"z align="center">
						<?php
							echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
								$this->Form->button(__d('croogo', '&nbsp;&nbsp;&nbsp;Next&nbsp;&nbsp;&nbsp;'), array('class' => 'btn btn-primary')) . '&nbsp;&nbsp;'.
								$this->Html->link(__d('croogo', 'Cancel'), array('controller' => 'campaign_orders',  'action' => 'view', $this->request->data['CampaignOrder']['id']), array('class' => 'btn btn-danger')) .
								$this->Html->endBox();
						?>
				</div>
			</div>
		  </div>
		</div>
		</div>  
	</div>

<?php echo $this->Form->end(); ?>

