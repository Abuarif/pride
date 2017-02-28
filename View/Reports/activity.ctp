
	<h1>Bus Operation Dashboard</h1> 
	<br/>
	<table width="100%">
		<tr>
			<td width="50%">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">G E N E R A L  &nbsp;&nbsp; I N F O</h3>
					</div>
					<div class="panel-body">
						<br/>
						<table class="table" width="100%">
							<thead>
							<tr>
								<th style="text-align:left">
									D E P O T
								</th>
							<?php foreach($routeStats as $routeStat) { ?>
								<th style="text-align:center"><?php echo $routeStat['depot']['name']; ?>
								</th> 
							<?php } ?>
							</tr>
							</thead>
							<tr>
								<td style="text-align:left">
									R O U T E
								</td>
							<?php foreach($routeStats as $routeStat) { ?>
								<td style="text-align:center">
									<span class="badge btn-primary"><?php echo $routeStat[0]['total_route']; ?></span>
								</td> 
							<?php } ?>
							</tr>
						</table>
						<br/>
						<table class="table">
							<thead>
								<tr>
									<th style="text-align:left"> D E P O T </th>
									<th style="text-align:center"> F L E E T </th>
									<th style="text-align:center"> B O O K E D </th>
									<th style="text-align:center"> R E S E R V E D </th>
									<th style="text-align:center"> G R O U N D E D </th>
								</tr>
							</thead>
							<?php foreach($busStats as $busStat) { ?>
							<tr>
								<td style="text-align:left">
									<?php echo $busStat['depot']['name']; ?>&nbsp;&nbsp;
								</td>
								<td style="text-align:center">
									<span class="badge btn-primary"><?php echo $busStat[0]['total_bus']; ?></span>
								</td> 
								<td style="text-align:center">
									<span class="badge btn-success">0</span>
								</td> 
								<td style="text-align:center">
									<span class="badge btn-warning">0</span>
								</td> 
								<td style="text-align:center">
									<span class="badge btn-danger">0</span>
								</td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</td>
		</tr>
	</table>

	 <?php  echo $this->element('campaign_progress'); ?>
	
	