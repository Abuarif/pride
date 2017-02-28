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
  $checker = false;
	foreach ($mapVersions as $map) {
    if ($map['Coordinate']['status']) {
      $checker = true;
      continue;
    }
  }

	if (!$checker) {
    echo '<div class="alert alert-warning alert-dismissable">
                                        <i class="fa fa-warning"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Sorry.</b> Map for this route currently not available.
                                        <br><a href="#" onclick="window.history.back();return false;">Return to previous page</a>
                                    </div>';
  } else {
    echo $this->element('Pride.view_googlemap'); 
  }

	
?>

</section>