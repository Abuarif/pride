<!-- Content Header (Page header) -->
<section class="content-header">
 <h1>
  List Provision Buses
 </h1>
 <ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
  <li><a href="#">System Settings</a></li>
  <li class="active">List Provision Buses</li>
 </ol>
</section>

<section class="content">

<?php 
	
	
  if (!empty($this->request->named['do']) && $this->request->named['do'] == 'create') {
    echo $this->element('Pride.googlemap'); 
  } else if (count($routeDetail['Coordinates'])>0){
  	echo $this->element('Pride.view_googlemap'); 
  }

	
?>

<?php if ($this->Session->read('Auth.User.Role.alias') != Configure::read('AMS.role_pride_advertiser') ) { ?>
      <br>
      <div class="col-md-8">
        <div class="box box-primary">
            <table class="table table-hover">
              <tbody><tr>
                    <th>#</th>
                    <th>Created Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
				
				<?php 
					$counter = 1;
					// $published = '<span class="label label-success">Approved</span>';
					// $pending = '<span class="label label-warning">Pending</span>';
					
					foreach($mapVersions as $map) { 
				?>
                <tr <?php if((!empty($this->request->pass[2])) && $this->request->pass[2] == strtotime($map['Coordinate']['created']) || (empty($this->request->pass[2]) && $map['Coordinate']['status'])) echo 'class="warning"';?>>
                    <td><?php echo $counter; ?></td>
                    <td><?php echo $this->Time->niceShort($map['Coordinate']['created']); ?></td>
                    <td>
					<?php 
						echo ($map['Coordinate']['status'] ? '<span class="label label-success">'.$this->Html->link('Published', array('plugin' => 'pride', 'controller' => 'route_details', 'action' => 'create_route', $this->request->pass[0], $this->request->pass[1], strtotime($map['Coordinate']['created'])), array('style' => 'color:white')).'</span>' :  '<span class="label label-warning">'.$this->Html->link('Draft', array('plugin' => 'pride', 'controller' => 'route_details', 'action' => 'create_route', $this->request->pass[0], $this->request->pass[1], strtotime($map['Coordinate']['created'])), array('style' => 'color:white')).'</span>' );
					?>
					</td>
					<td>
					<?php 
						echo $this->Html->link('', array('controller' => 'coordinates', 'action' => 'remove', $this->request->pass[0], $this->request->pass[1], strtotime($map['Coordinate']['created'])), array('class'=>'fa fa-trash-o', 'style'=>'color:#000;', 'data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $this->Time->niceShort($map['Coordinate']['created'])))); 
					?>
					</td>
				</tr>
				
				<?php 
					$counter ++;
					} 
				?>
              </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box box-primary">
          <div class="box-header">
            <i class="fa fa-gear"></i> 
            <h4>Options</h4>
          </div>
          <div class="box-body clearfix">
          
          <?php 
			if (!empty($this->request->pass[2])) {
			
				echo '<button class="btn btn-success btn-block">'.$this->Html->link('Publish Map', array('controller' => 'coordinates', 'action' => 'publish', $this->request->pass[0], $this->request->pass[1], $this->request->pass[2]), array( 'style'=>'color:#fff', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Publish Map', 'escape' => false)). '</button>';
			}
			
            if (count($routeDetail['Coordinates'])>0) {
			
				echo '<button class="btn btn-info btn-block">'.$this->Html->link('Create Map', array('controller' => 'route_details', 'action' => 'create_route', $this->request->pass[0], $this->request->pass[1], 'do' => 'create'), array('style'=>'color:#fff', 'data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Create Map', 'escape' => false)). '</button>';
				
          ?>
            
            <?php } ?>
          </div>
        </div>
      </div>
		<?php } ?>

</section>