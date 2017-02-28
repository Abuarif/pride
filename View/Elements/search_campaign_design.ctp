<?php echo $this->Form->create('CampaignDesign'); ?>


<div class="input-group">
<?php
	echo $this->Form->input('name', array(
				'label' => false,
				'placeholder' => __d('croogo', 'Find the campaign or campaign design name here...'),
						'class' => 'form-control',
			));
?>
	<span class="input-group-btn">
		<?php echo $this->Form->button(__d('croogo', '<i class="fa fa-search"></i>'), array('class'=>'btn btn-flat')); ?>
	</span>
</div>

<?php echo $this->Form->end(); ?>
