<?php
	echo $this->Html->css(array(
            'checkout',
            //'bootstrap.min',
        ));
?>

<div class="checkout-wrap">
	<ul class="checkout-bar">
		<li class="visited first">
			<?php echo $this->Html->link(__d('croogo', 'Service Depot'), array('controller' => 'provision_buses',  'action' => 'step1', $this->request->pass['0'])); ?>
		</li>
		<li class="previous visited">
			<?php echo $this->Html->link(__d('croogo', 'Route'), array('controller' => 'provision_buses',  'action' => 'step2', $this->request->pass['0'], $this->request->pass['1'])); ?>
		</li>
		<li class="active">
			Bus & Visual
		</li>
		
	</ul>
</div>

<br/><br/><br/><br/><br/><br/>



<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Provision Buses - Step 3');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Provision Buses'), array('action' => 'index'));

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
	<div class="span12">
		
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->hidden('campaign_order_id', array(
					'value' => $this->request->data['ProvisionBus']['campaign_order_id'],
				));
				echo $this->Form->hidden('order_number', array(
					'value' => $this->request->data['ProvisionBus']['order_number'],
				));
				echo $this->Form->hidden('depot_id', array(
					'value' => $this->request->pass['1'],
				));
				echo $this->Form->hidden('route_id', array(
					'value' => $this->request->pass['2'],
				));
				echo $this->Form->input('bus_id', array(
					'label' => 'Bus Registration Number',
					'empty' => '-- Pick a Bus --' ,
				));
				echo '<br/>'.$this->Form->input('campaign_design_id', array(
					'label' => 'Approved Design Pairing',
					'empty' => '-- Pick a Design --',
                                        'options' => $campaignDesigns,
				));
				
			?>
			
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
						$this->Html->link(__d('croogo', 'Back'), array('controller' => 'provision_buses',  'action' => 'step2', $this->request->pass['0'], $this->request->pass['1']), array('class' => 'btn btn-primary')) . '&nbsp;&nbsp;'.
						$this->Form->button(__d('croogo', 'Confirm'), array('class' => 'btn btn-primary')) .'&nbsp;&nbsp;'.
						$this->Html->link(__d('croogo', 'Cancel'), '/my_order/'.$this->request->data['ProvisionBus']['campaign_order_id'], array('class' => 'btn btn-danger')) .
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
