<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Route Details');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Route Details'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['RouteDetail']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Route Details: ' . $this->data['RouteDetail']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('RouteDetail');

?>
<div class="routeDetails row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Route Detail'), '#route-detail');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='route-detail' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('depot_present', array(
					'label' => 'Depot',
				));
				echo $this->Form->input('route_number', array(
					'label' => 'Route Number',
				));
				echo $this->Form->input('origin', array(
					'label' => 'Origin',
				));
				echo $this->Form->input('destination', array(
					'label' => 'Destination',
				));
				echo $this->Form->input('route_way_1', array(
					'label' => 'Route Way 1',
				));
				echo $this->Form->input('route_way_2', array(
					'label' => 'Route Way 2',
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
