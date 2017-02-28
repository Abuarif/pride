<style type="text/css">

.active.progress .progress-bar, .active.progress-bar {
    -webkit-animation: progress-bar-stripes 2s linear infinite;
    -o-animation: progress-bar-stripes 2s linear infinite;
    animation: progress-bar-stripes 2s linear infinite;
}


.progress {
    height: 20px;
    margin-bottom: 20px;
    overflow: hidden;
    background-color: #f5f5f5;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
    box-shadow: inset 0px 1px 2px rgba(0,0,0,0.1);
}


.progress-striped .progress-bar, .progress-bar-striped {
    background-image: -webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);
    background-image: -o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);
    background-image: linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);
    -webkit-background-size: 40px 40px;
    background-size: 40px 40px;
}


.progress-bar {
    float: left;
    width: 0px;
    height: 100%;
    font-size: 12px;
    line-height: 20px;
    color: #fff;
    text-align: center;
    background-color: #428bca;
    -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
    box-shadow: inset 0px -1px 0px rgba(0,0,0,0.15);
    -webkit-transition: width .6s ease;
    -o-transition: width .6s ease;
    transition: width .6s ease;
}

</style>


<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Provision Buses - Replacement');
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
	<div class="span8">
		<ul class="nav nav-tabs">
			<li class="active">
				  <a href="#provisionbus" data-toggle="tab">Provision Bus - Replacement </a>
			</li>
		</ul>

		<div class="tab-content">
			<br/><br/>
			<div class="progress">
			  <div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
				<span class="sr-only">Step 1</span>
			  </div>
			</div>
		
			<div id='provisionbus' class="tab-pane active">
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
					'label' => 'Depot / Service Area',
					'empty' => '-- Pick a Depot / Service Area --' ,
				));
				
			?>
			</div>
			<?php echo $this->Croogo->adminTabs(); ?>
		</div>

	</div>

	<div class="span4">
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

<?php

echo  $this->Js->get('#Depots')->event(
	'change', $this->Js->request(
		array('controller'=>'provision_buses','action'=>'ajax_routes'),
		array('update' => '#Routes', 'dataExpression' => true, 'data'
				=> '$("#Depots").serialize()')
	)
);


?>
