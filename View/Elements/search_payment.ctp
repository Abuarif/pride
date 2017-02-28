<?php echo $this->Form->create('PaymentAdvice'); ?>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="tab-content">
				<div class="box box-solid box-primary">
					<div class="box-header">
						<h3 class="box-title">Search Payment Information</h3>
					</div>
					<div class="box-body">
						<div class="input-group">
							<?php 
								if (!empty($this->request->params['named']['searchString'])) $searchString = $this->request->params['named']['searchString']; else $searchString = '';
								
								echo 
								'<span class="input-group-addon"><i class="fa fa-money"></i></span>'.
								$this->Form->input('searchString', array('label' => false, 'placeholder' => __d('croogo', 'Find Payment Information'), 'class' => 'form-control', 'value' => $searchString)); 
							?> 
						</div>
						<!-- /input-group -->
					</div><!-- /.box-body -->
				</div>
			</div>
		</div>
		<div class="panel-footer">
			<div class="span12" align="center">
				<?php 
					echo 
					$this->Form->button(__d('croogo', 'Search'), array('class'=>'btn btn-primary'))
					.'&nbsp;&nbsp;'.
					$this->Form->button(__d('croogo', 'Reset'), array('type'=>'reset', 'class' => 'btn btn-info')); 
				?>
			</div>
		</div>
	</div>
<?php echo $this->Form->end(); ?>
