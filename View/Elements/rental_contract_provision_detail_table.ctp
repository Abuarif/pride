	<table>
		<tr>
			<td colspan="4">
			<?php 
				// get Job Task Details
				$busDetail = $this->requestAction('/pride/provision_buses/getProvisionBus/'.$campaignOrderDetail['ProvisionBus']['id']);
				
				$depot = $this->requestAction('/pride/depots/get_depot/'.$busDetail['ProvisionBus']['depot_id']);
				
				$route = $this->requestAction('/pride/route_details/get_route_details/'.$busDetail['ProvisionBus']['route_id']);
				
				$bus = $this->requestAction('/pride/buses/get_bus/'.$busDetail['ProvisionBus']['bus_id']);
				
				if (!empty($depot)) {
			?>
			&nbsp; 
				<table class="table table-hover">
					<tr>
						<th style="width:150px;">Depot</th>
						<td style="width:30px;">:</td>
						<td>
							<?php 
								echo $this->Html->link($depot['Depot']['name'], array('controller' => 'depots', 'action' => 'view', $depot['Depot']['id'])); 
							?>
						</td>
					</tr>
					<tr>
						<th>Route</th>
						<td>:</td>
						<td>
							<?php 
								echo $this->Html->link($route['RouteDetail']['route_number'], array('controller' => 'route_details', 'action' => 'view', $route['RouteDetail']['id'])); 
							?>
						</td>
					</tr>
					<tr>
						<th>Bus Registration No</th>
						<td>:</td>
						<td>
							<?php 
								echo $this->Html->link($bus['Bus']['registration_number'], array('controller' => 'buses', 'action' => 'view', $bus['Bus']['id'])); 
							?>
						</td>
					</tr>
				</table>
				<br/>
			</td>
		</tr>
	<?php } ?>
</table>