<script language='Javascript'>
	
	var boxSizeArray = [2,2];
	
</script>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Configure Provision Order
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Provision Bus</a></li>
		<li class="active">Provision Board</li>
	</ol>
</section>


<section class="content">
	<!-- Custom location sessionFlash -->
		<div style="margin-left:-14px;">
			<?php echo $this->Layout->sessionFlash(); ?>
		</div>
	<!--./location sessionFlash -->
	
	<?php if (!empty($buses) && !empty($visuals)) { ?>
	
	<?php
	
		echo $this->Form->create('ProvisionBus');
		
		echo $this->Form->input('id', array(
			'value' => $this->request->pass[0],
		));
	?>
	
	
	<!------------------------------------------------------------------------------------->
	<div id="dhtmlgoodies_dragDropContainer">
		<div class="row">
			<div class="col-md-4">
				<div class="box box-info">
					<div class="box-header">
						<i class="fa fa-th"></i>
						<h3 class="box-title">Available Buses (<?php echo count($buses);?>) </h3>
					</div><!-- /.box-header -->
					<div id="dhtmlgoodies_listOfItems" style="padding-bottom:15px;">
						<div id="destruct" class="box-body">
							<ul id="allBuses" style="width:350px;margin-left:-31px;">
								<?php  foreach($buses as $bus) { ?>
									<li id="b-<?php echo $bus['bus']['id']; ?>" class="alert alert-warning alert-dismissable" style="list-style:none;margin:10px auto;">
										<?php 
											echo 
											'<div style="padding:10px;margin-top:-10px;">'.
											'<h4>'.$bus['bus']['registration_number'].'</h4>'.
											'<i class="fa fa-caret-right"></i>  Depot : '.$bus['depot']['name'].
											'<br/>'.
											'<i class="fa fa-caret-right"></i>  Route No : '.$bus['route']['route_number'].
											'<br/>'.
											'<i class="fa fa-caret-right"></i>  Bus Model : '.$bus['bus']['brand'].
											'</div>';
										?>
									</li>
								<?php } ?>
							</ul>
						</div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div><!-- /.col -->

			<div class="col-md-4">
				<div class="box box-danger">
					<div class="box-header">
						<i class="fa fa-th"></i>
						<h3 class="box-title">Approved Visuals (<?php  echo count($visuals); ?>)</h3>
					</div><!-- /.box-header -->
					<div id="dhtmlgoodies_listOfItems" style="padding-bottom:15px;">
						<?php if(count($visuals) > 4) {?>
						<div id="instruct" class="box-body">
						<?php }else{ ?>
						<div class="box-body" style="height:550px;cursor:move;">
						<?php } ?>
							<ul id="allVisuals" style="width:350px;margin-left:-31px;">
								<?php  foreach($visuals as $visual) { ?>
									<li id="v-<?php echo $visual['campaign_designs']['id']; ?>" class="alert alert-warning alert-dismissable" style="list-style:none;margin:10px auto;">
										<?php 
											echo 
											'<div style="padding:10px;margin-top:-10px;">'.
											'<h4>'.$visual['campaign_designs']['name'].'</h4>'.
											'<i class="fa fa-caret-right"></i>  Tag Code : '.$visual['campaign_designs']['tag_code'].
											'<br/>'.
											'<i class="fa fa-caret-right"></i>  Visual : '.$this->Html->image('../attachments/'.$visual['campaign_designs']['files'], array('style' => 'width:60px;height:40px')).
											'</div>';
										?>
									</li>
								<?php } ?>
							</ul>
						</div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div><!-- /.col -->
			
			<div class="col-md-4">
				<div class="box box-success">
					<div class="box-header">
						<i class="fa fa-th"></i>
						<h3 class="box-title">Matching Tray</h3>
					</div><!-- /.box-header -->
					<div id="dhtmlgoodies_mainContainer" style="padding-bottom:15px;">
						<div id="construct" class="box-body">
							<ul id="slot-<?php echo $this->request->pass[0]; ?>" style="width:350px;margin-left:-22px;">
							</ul>							
							
							<br/><br/><br/><br/><br/><br/><br/><br/><br/>
							
							<div align="center" style="bottom:0;position:static;">								
								<?php 
									echo $this->Form->input('slot', array('label' => false, 'style' => 'border:none;color:#fff')); 
								?>
								
								<!-- <input type="button" onclick="saveDragDropNodes()" value="Confirm Order" class="btn btn-warning"> 
								
								&nbsp;&nbsp; -->	
								
							</div>
							<div align="center">
								<table width="60%" border="0" cellspacing="0" cellpadding="0">
								  <tr>
									<td>&nbsp;&nbsp;</td>
									<td>&nbsp;&nbsp;</td>
									<td>&nbsp;&nbsp;</td>
									<td>&nbsp;&nbsp;</td>
									<td>&nbsp;&nbsp;</td>
									<td>&nbsp;&nbsp;</td>
									<td>&nbsp;&nbsp;</td>
									<td style="text-align:right;width:80px;">
										<input type="submit" onClick="confirm_order()" value="Submit" class="btn btn-primary" id="submit">
									</td>
									<td>&nbsp;&nbsp;</td>
									<td style="text-align:right">
										<input type="button" class="btn btn-warning" value="Reset" onClick="window.location.reload()">
									</td>
									<td>&nbsp;&nbsp;</td>
									<td style="text-align:left;">
										<?php
											echo 
											
											$this->Html->link(__d('croogo', 'Cancel'), array('controller' => 'campaign_order_details', 'action' => 'view', $this->request->pass[2]), array('class' => 'btn btn-danger'));
										?>
									</td>
								  </tr>
								</table>
							</div>	
							
							<?php								
								echo $this->Form->end();
							?>
						</div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div><!-- /.col -->
		</div>
	</div>
	
	<ul id="dragContent"></ul>
	<div id="dragDropIndicator"><!-- <img src="<?php //echo $this->webroot.'theme/FlatTheme/images/insert.gif'; ?>"> --></div>
	<div id="saveContent">
	
	<?php } else if (empty($buses)){ ?>
		Your have not selected any Point of Interest. Please do so 
		<?php echo $this->Html->link('here!', array('plugin' => 'pride', 'controller' => 'route_details')); ?>
	<?php } else { ?>
		You have no approved visuals. Please submit it for approval. Click <?php echo $this->Html->link('here!', array('plugin' => 'pride', 'controller' => 'campaign_designs', 'action' => 'add', $this->request->pass[2])); ?>
	<?php } ?>
	
</section>

<script language="Javascript">

	function confirm_order() {
		var r = confirm("Are you sure on the selection?");
		if (r == true) {
			saveDragDropNodes();
			x = "Thank you!";
		} 
		
	
	} 
	
</script>