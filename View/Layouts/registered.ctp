<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registered | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

		<?php
		
			echo $this->Html->css(array(
				'/css/bootstrap-lte.min',
				'/css/font-awesome-lte.min',
				'/css/perfect-scrollbar.min',
				'/css/ionicons.min',
				'/css/morris/morris.css',
				'/css/jvectormap/jquery-jvectormap-1.2.2',
				'/css/datepicker/datepicker3',
				'/css/daterangepicker/daterangepicker-bs3',
				'/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min',
				'/css/AdminLTE',
				//'/css/dragable2',
			));
		?>
		
		
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        
			<?php echo $this->element('pride_header'); ?>
		
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
						<?php if($this->Session->read('Auth.User.image') != '') { ?>
							<div class="pull-left image">
								<img src="<?php echo $this->webroot.'profiles/'.$this->Session->read('Auth.User.image'); ?>" class="img-circle" alt="User Image" />
							</div>
						<?php } else {?>
							<div class="pull-left image">
								<img src="<?php echo $this->webroot.'uploads/empty.jpg'; ?>" class="img-circle" alt="User Image" />
							 </div>
						<?php } ?>
                        <div class="pull-left info">
                            <p><?php echo $this->Session->read('Auth.User.username'); ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <!-- <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form> -->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
						
						<?php echo $this->element('pride_menu'); ?>
						
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <?php if (($title_for_layout == 'MemberIndex') || ($title_for_layout == 'AMSIndex')) {?>
				<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <!-- <small>Control panel</small> -->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
				
                <!-- Main content -->
                <section class="content">
				<?php } ?>
				
                    <!-- Small boxes (Stat box) -->
                    <!-- <div class="row">
                        <ul id="progressbar">
							<li class="active"><b>Step 1 : </b>Membership<br />Registration / Sign-Up</li>
							<li <?php if(true) { ?>class="active"<?php } ?> ><b>Step 2 : </b>Advertiser<br />Application Submission</li>
							<li><b>Step 3 : </b>Profile<br />Verification by PRIDE</li>
							<li><b>Step 4 : </b>Registration<br />Fee Payment</li>
							<li><b>Step 5 : </b>Acceptance<br />of Registration / Done</li>
						</ul>
                    </div> --><!-- /.row -->
					
                    <!-- Main row -->
                    <!-- <section class="content"> -->
						<?php //if($title_for_layout == 'MemberIndex') { ?>
								<?php echo $this->Layout->sessionFlash(); ?>
						<?php //} ?>
						
						<?php echo $this->fetch('content'); ?>
						<?php echo $this->fetch('body_content'); ?>
					<!-- </section> -->
                <!-- </section> -->
            </aside><!-- /.right-side -->		
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
				
		<?php
			echo $this->Html->script(array(
				'/js/jquery.min',
				'/js/jquery-ui-1.10.3.min',
				'/js/bootstrap-lte',
				'/js/perfect-scrollbar.min',
				'/js/perfect-scrollbar-speed',
				'/js/tooltip',
				'/js/raphael-min',
				'/js/plugins/morris/morris.min',
				'/js/plugins/sparkline/jquery.sparkline.min',
				'/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min',
				'/js/plugins/jvectormap/jquery-jvectormap-world-mill-en',
				'/js/plugins/jqueryKnob/jquery.knob',
				'/js/plugins/daterangepicker/daterangepicker',
				'/js/plugins/datepicker/bootstrap-datepicker',
				'/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min',
				'/js/plugins/iCheck/icheck.min',
				'/js/AdminLTE/app',
				'/js/dragable',
				'/js/custom',
			));
		?>
		
    </body>
</html>
