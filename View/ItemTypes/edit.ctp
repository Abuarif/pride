<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Item Types');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Item Types'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['ItemType']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Item Types: ' . $this->data['ItemType']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('ItemType');

?>
<div class="itemTypes row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			//echo $this->Croogo->adminTab(__d('croogo', 'Item Type'), '#item-type');
			//echo $this->Croogo->adminTabs();
		?>
                <li class="active">
			  <a href="#item-type" data-toggle="tab">Item Type</a>
		</li>
		</ul>

		<div class="tab-content">
			<div id='item-type' class="tab-pane active">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('name', array(
					'label' => 'Name',
				));
				echo $this->Form->input('updated_by', array(
					'label' => 'Updated By',
				));
				echo $this->Form->input('created_by', array(
					'label' => 'Created By',
				));
                                echo $this->Form->input('status', array('div' => array('style' => 'margin-right:250px;margin-top:10px')));
				echo "<div style='margin-left:1px;margin-top:-25px;'><label>Status</label></div>";
				echo "<br />";
			?>
			</div>
			<?php echo $this->Croogo->adminTabs(); ?>
		</div>

	</div>

	<div class="span4">
	<?php
		echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
			//$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply')) .
			$this->Form->button(__d('croogo', 'Save'), array('class' => 'btn btn-primary')) . '&nbsp;&nbsp;' .
			$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('class' => 'btn btn-danger')) .
			$this->Html->endBox();
		?>
	</div>

</div>
<?php echo $this->Form->end(); ?>
