<?php echo $this->Form->create('Bus'); ?>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="tab-content">
				<div class="box-body">
					<div class="input-group">
						<div class="input-group-btn">
							<?php echo $this->Form->button(__d('croogo', 'Search'), array('class'=>'btn btn-danger')); ?>
						</div>
						<?php
							echo 
							$this->Form->input('search_bus', array('label' => false, 'placeholder' => __d('croogo', 'Key-in the bus model, registration number or route number here...'), 'class' => 'form-control'));
						?>	
					</div>
				</div>
			</div>
		</div>
	</div>
<?php echo $this->Form->end(); ?>
