<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Total Mandatory Attachment.. 
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li class="active">Total Mandatory Attachment</li>
	</ol>
</section>

<section class="content">
	<!-- Custom location sessionFlash -->
		<div style="margin-left:-14px;">
			<?php echo $this->Layout->sessionFlash(); ?>
		</div>
	<!--./location sessionFlash -->
	
	Total Attachment: <?php print_r( $total_attachments ); ?>
	
</section>