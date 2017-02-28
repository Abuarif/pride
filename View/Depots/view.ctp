<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Depot
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">List Depots</a></li>
		<li class="active">Depot</li>
	</ol>
</section>


<section class="content">
	<!-- Depot Details -->
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Depot Details</h3>
			<div class="box-tools">
			</div>
		</div>
		<div class="box-body table-responsive no-padding">
			<table class="table table-hover">
				<tr>
					<th style="width:10%">Depot</th>
					<td style="width:30px">:</td>
					<td style="width:90%"><?php echo h($depot['Depot']['name']); ?></td>
				</tr>
				<tr>
					<th>Depot Number</th>
					<td>:</td>
					<td><?php echo h($depot['Depot']['depot_number']); ?></td>
				</tr>
			</table>
		</div>
	</div>
<!-- End Depot Details -->

	<?php if (!empty($depot['Route'])) { ?> 
		<script>
			(function(){
				$('.here','#connections').load('<?php echo $this->Html->url('/pride/routes')?>');
					$('.here','#connections').on('submit','.formUserSearch', function(e){
						e.preventDefault();
						$('.here','#connections').load(this.action+"?"+$(this).serialize());
						
						return false;
					});
			})();
		</script>	
	<?php } ?>
</section>