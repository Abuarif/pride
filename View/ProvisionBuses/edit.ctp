<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Provision Buses');
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
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Provision Bus Test'), '#provision-bus');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='provision-bus' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('campaign_order_id', array(
					'label' => 'Campaign Order Id',
				));
				echo $this->Form->input('order_number', array(
					'label' => 'Order Number',
				));
				echo $this->Form->input('depot_id', array(
					'id'	=> 'Depots',
					'label' => 'Depot Id',
					'empty' => '-- Pick a Depot / Service Area --' ,
				));
				echo $this->Form->input('route_id', array(
					'id'	=> 'Routes',
					'label' => 'Route Id',
					'empty' => '-- Pick a Route --' ,
				));
				echo $this->Form->input('bus_id', array(
					'id'	=> 'Bus.id',
					'label' => 'Bus Id',
					'empty' => '-- Pick a Bus --' ,
				));
				echo $this->Form->input('campaign_design_id', array(
					'label' => 'Campaign Design',
					'empty' => '-- Pick a Design --' ,
				));
				echo $this->Form->input('comment', array(
					'label' => 'Comment',
				));
				echo $this->Form->input('approval_id', array(
					'label' => 'Approval Id',
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

<?php

echo  $this->Js->get('#Depots')->event(
	'change', $this->Js->request(
		array('controller'=>'provision_buses','action'=>'ajax_routes'),
		array('update' => '#Routes', 'dataExpression' => true, 'data'
				=> '$("#Depots").serialize()')
	)
);


?>
