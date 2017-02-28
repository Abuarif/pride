<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Organizations');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Organizations'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['Organization']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Organizations: ' . $this->data['Organization']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('Organization');

?>
<div class="organizations row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
			<li class="active">
					<a href="#organization" data-toggle="tab">Organization</a>
			</li>
		</ul>

		<div class="tab-content">
			<div id='organization' class="tab-pane active">
			<br/>
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('name', array(
					'between' => '<br/>',
					'label' => 'Name',
				));
				echo '<br/>'.$this->Form->input('roc', array(
					'between' => '<br/>',
					'label' => 'Roc',
				));
				echo '<br/>'.$this->Form->input('address', array(
					'between' => '<br/>',
					'label' => 'Address',
				));
				echo '<br/>'.$this->Form->input('postcode', array(
					'between' => '<br/>',
					'label' => 'Postcode',
				));
				echo '<br/>'.$this->Form->input('contact_person', array(
					'label' => 'Contact Person',
				));
				echo '<br/>'.$this->Form->input('contact_email', array(
					'label' => 'Contact Email',
				));
				echo '<br/>'.$this->Form->input('contact_number', array(
					'label' => 'Contact Number',
				));
				echo '<br/>'.$this->Form->input('files', array(
					'between' => '<br/>',
					'label' => 'Files',
				));
				echo '<br/>'.$this->Form->input('website', array(
					'between' => '<br/>',
					'label' => 'Website',
				));
				echo '<br/>'.$this->Form->input('updated_by', array(
					'label' => 'Updated By',
				));
				echo '<br/>'.$this->Form->input('created_by', array(
					'label' => 'Created By',
				));
				echo "<br />";
				echo "<div style='margin-left:1px;margin-top:-5px;'><label>Status</label></div>";
				echo $this->Form->input('status', array('div' => array('style' => 'margin-right:200px;margin-top:-33px')));
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
				  <div class="panel-body" align="center">
					<?php
						echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
							//$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply')) .
							$this->Form->button(__d('croogo', 'Save'), array('class' => 'btn btn-primary')) . '&nbsp;&nbsp;' .
							$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('class' => 'btn btn-danger')) .
							$this->Html->endBox();
						?>
				</div>
			</div>
		  </div>
		</div>
	</div>
	
</div>
<?php echo $this->Form->end(); ?>
