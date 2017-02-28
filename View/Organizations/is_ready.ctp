<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Documentation is ready.. 
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li class="active">Upload Documentation</li>
	</ol>
</section>

<section class="content">
	<!-- Custom location sessionFlash -->
		<div style="margin-left:-14px;">
			<?php echo $this->Layout->sessionFlash(); ?>
		</div>
	<!--./location sessionFlash -->
	
	<?php print_r( $totalMandatory ); ?>
	<br/>
	<?php print_r( $totalDocuments ); ?>
</section>