<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Security: Unauthorized Access
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-external-link"></i>Home</a></li>
		<li><a href="#">Security</a></li>
		<li class="active">Unauthorized Access</li>
	</ol>
</section>

<section class="content">

	<table class="table table-hover">
		<tr>
			<td>
				<br />
				<div class="alert alert-success alert-warning">
					<i class="fa fa-exclamation-triangle"></i>
					<center>You are not authorized to access that location. <br/><br/><a href="'.$this->request->referer().'">Click here to return to the previous page. </a></center>
				</div>
			</td>
		</tr>
	</table>
</section>