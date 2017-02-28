<?php echo $this->Form->create('RouteDetail'); ?>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="tab-content">
				<div class="box box-solid box-primary">
					<div class="box-header">
						<h3 class="box-title">Point of Interest (POI) Locator</h3>
					</div>
					<div class="box-body">
						<?php 
							 if (!empty($this->request->params['named']['q1'])) $q1 = $this->request->params['named']['q1']; else $q1 = '';
							 if (!empty($this->request->params['named']['q2'])) $q2 = $this->request->params['named']['q2']; else $q2 = '';
							 if (!empty($this->request->params['named']['q3'])) $q3 = $this->request->params['named']['q3']; else $q3 = '';
							 if (!empty($this->request->params['named']['q4'])) $q4 = $this->request->params['named']['q4']; else $q4 = '';
						?>
						<div class="input-group">
							<?php 
								echo 
								'<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>'.
								$this->Form->input('searchString', array('label' => false, 'placeholder' => __d('croogo', 'Find Point of Interest'), 'class' => 'form-control', 'style' => 'height:35px;resize:none;')); 
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
